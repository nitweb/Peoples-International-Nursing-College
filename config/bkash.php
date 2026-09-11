<?php

return [
    // Sandbox base URL. Switch to production URL (https://tokenized.pay.bka.sh/v1.2.0-beta) when going live.
    'base_url' => env('BKASH_BASE_URL', 'https://tokenized.sandbox.bka.sh/v1.2.0-beta'),

    'app_key' => env('BKASH_APP_KEY'),
    'app_secret' => env('BKASH_APP_SECRET'),
    'username' => env('BKASH_USERNAME'),
    'password' => env('BKASH_PASSWORD'),

    // "sandbox" or "live" — purely informational, used for showing a test-mode badge on the donate page
    'mode' => env('BKASH_MODE', 'sandbox'),

    'currency' => 'BDT',
];
