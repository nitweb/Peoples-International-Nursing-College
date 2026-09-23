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
     * Step 1: Get bKash ID Token.
     *
     * Token is cached for 55 minutes to avoid requesting
     * a new token for every payment.
     */
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

        $body = $response->json() ?? [];

        if (
            ! $response->successful() ||
            empty($body['id_token'])
        ) {
            Log::error('bKash token grant failed', [
                'status' => $response->status(),
                'response' => $body,
            ]);

            return null;
        }

        Cache::put(
            'bkash_id_token',
            $body['id_token'],
            now()->addMinutes(55)
        );

        return $body['id_token'];
    }

    /**
     * Common headers for authenticated bKash API requests.
     */
    protected function headers(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'authorization' => $this->getToken(),
            'x-app-key' => $this->appKey,
        ];
    }

    /**
     * Step 2: Create bKash payment.
     *
     * Returns the bKash API response.
     * Successful response normally contains "bkashURL".
     */
    public function createPayment(
        string $invoiceNo,
        float $amount,
        string $callbackUrl
    ): array {
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

        /*
         * bKash can return HTTP 200 even when the payment
         * creation fails at the application level.
         *
         * 0000 = successful response.
         */
        $isApplicationError =
            isset($body['statusCode']) &&
            $body['statusCode'] !== '0000';

        if (! $response->successful() || $isApplicationError) {
            Log::error('bKash create payment failed', [
                'status' => $response->status(),
                'response' => $body,
            ]);
        }

        return $body;
    }

    /**
     * Step 3: Execute bKash payment.
     *
     * This should be called after the customer completes
     * the payment on the bKash checkout page.
     */
    public function executePayment(string $paymentId): array
    {
        $response = Http::withHeaders($this->headers())
            ->post("{$this->baseUrl}/tokenized/checkout/execute", [
                'paymentID' => $paymentId,
            ]);

        $body = $response->json() ?? [];

        $isApplicationError =
            isset($body['statusCode']) &&
            $body['statusCode'] !== '0000';

        if (! $response->successful() || $isApplicationError) {
            Log::error('bKash execute payment failed', [
                'status' => $response->status(),
                'response' => $body,
            ]);
        }

        return $body;
    }
}
