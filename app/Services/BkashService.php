<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BkashService
{
    protected string $baseUrl;
    protected string $appKey;
    protected string $appSecret;
    protected string $username;
    protected string $password;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('bkash.base_url'), '/');
        $this->appKey = (string) config('bkash.app_key');
        $this->appSecret = (string) config('bkash.app_secret');
        $this->username = (string) config('bkash.username');
        $this->password = (string) config('bkash.password');
    }

    /**
     * Get a valid id_token, from cache if possible (bKash tokens are valid ~1 hour).
     */
    public function getToken(): ?string
    {
        return Cache::remember('bkash_id_token', now()->addMinutes(55), function () {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'username' => $this->username,
                'password' => $this->password,
            ])->post("{$this->baseUrl}/tokenized/checkout/token/grant", [
                'app_key' => $this->appKey,
                'app_secret' => $this->appSecret,
            ]);

            $body = $response->json();

            if (! $response->successful() || empty($body['id_token'])) {
                Log::error('bKash grant token failed', [
                    'status' => $response->status(),
                    'raw_body' => $response->body(),
                    'url' => "{$this->baseUrl}/tokenized/checkout/token/grant",
                ]);
                Cache::forget('bkash_id_token');

                return null;
            }

            return $body['id_token'];
        });
    }

    protected function authHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'authorization' => $this->getToken(),
            'x-app-key' => $this->appKey,
        ];
    }

    /**
     * Create a payment. Returns the full bKash response array (includes 'bkashURL' to redirect the donor to).
     */
    public function createPayment(string $invoiceNo, float $amount, string $callbackUrl): array
    {
        $response = Http::withHeaders($this->authHeaders())
            ->post("{$this->baseUrl}/tokenized/checkout/create", [
                'mode' => '0011',
                'payerReference' => $invoiceNo,
                'callbackURL' => $callbackUrl,
                'amount' => number_format($amount, 2, '.', ''),
                'currency' => config('bkash.currency', 'BDT'),
                'intent' => 'sale',
                'merchantInvoiceNumber' => $invoiceNo,
            ]);

        $body = $response->json() ?? [];

        if (! $response->successful()) {
            Log::error('bKash create payment failed', ['response' => $body]);
        }

        return $body;
    }

    /**
     * Execute a payment after the donor completes it on bKash's page.
     */
    public function executePayment(string $paymentId): array
    {
        $response = Http::withHeaders($this->authHeaders())
            ->post("{$this->baseUrl}/tokenized/checkout/execute", [
                'paymentID' => $paymentId,
            ]);

        $body = $response->json() ?? [];

        if (! $response->successful()) {
            Log::error('bKash execute payment failed', ['response' => $body]);
        }

        return $body;
    }

    /**
     * Query a payment's current status (useful if execute callback is missed / for reconciliation).
     */
    public function queryPayment(string $paymentId): array
    {
        $response = Http::withHeaders($this->authHeaders())
            ->get("{$this->baseUrl}/tokenized/checkout/payment/status/{$paymentId}");

        return $response->json() ?? [];
    }
}
