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

    // Step 1: Get token (id_token). Cache it for 55 minutes so we don't ask again and again.
    public function getToken(): ?string
    {
        $token = Cache::get('bkash_id_token');

        if ($token) {
            return $token;
        }

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
            Log::error('bKash token grant failed', ['response' => $body]);
            return null;
        }

        Cache::put('bkash_id_token', $body['id_token'], now()->addMinutes(55));

        return $body['id_token'];
    }

    protected function headers(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'authorization' => $this->getToken(),
            'x-app-key' => $this->appKey,
        ];
    }

    // Step 2: Create payment. Returns bKash response (has 'bkashURL' to redirect user to).
    public function createPayment(string $invoiceNo, float $amount, string $callbackUrl): array
    {
        $response = Http::withHeaders($this->headers())
            ->post("{$this->baseUrl}/tokenized/checkout/create", [
                'mode' => '0011',
                'payerReference' => $invoiceNo,
                'callbackURL' => $callbackUrl,
                'amount' => number_format($amount, 2, '.', ''),
                'currency' => 'BDT',
                'intent' => 'sale',
                'merchantInvoiceNumber' => $invoiceNo,
            ]);

        $body = $response->json() ?? [];

        if (! $response->successful()) {
            Log::error('bKash create payment failed', ['response' => $body]);
        }

        return $body;
    }

    // Step 3: Execute payment after user completes it on bKash's page.
    public function executePayment(string $paymentId): array
    {
        $response = Http::withHeaders($this->headers())
            ->post("{$this->baseUrl}/tokenized/checkout/execute", [
                'paymentID' => $paymentId,
            ]);

        $body = $response->json() ?? [];

        if (! $response->successful()) {
            Log::error('bKash execute payment failed', ['response' => $body]);
        }

        return $body;
    }
}