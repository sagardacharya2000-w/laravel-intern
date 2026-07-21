<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class KhaltiService
{
    protected string $secretKey;
    protected string $baseUrl;

    public function __construct()
    {
        $this->secretKey = config('services.khalti.secret_key');
        $this->baseUrl = rtrim(config('services.khalti.base_url'), '/');
    }

    public function initiate(int $amountInPaisa, string $purchaseOrderId, string $purchaseOrderName, array $customerInfo): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'key ' . $this->secretKey,
            'Content-Type' => 'application/json',
        ])->post("{$this->baseUrl}/epayment/initiate/", [
            'return_url' => config('services.khalti.return_url'),
            'website_url' => config('services.khalti.website_url'),
            'amount' => $amountInPaisa,
            'purchase_order_id' => $purchaseOrderId,
            'purchase_order_name' => $purchaseOrderName,
            'customer_info' => $customerInfo,
        ]);

        if ($response->failed()) {
            throw new RuntimeException('Khalti initiate failed: ' . $response->body());
        }

        return $response->json();
    }

    public function lookup(string $pidx): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'key ' . $this->secretKey,
            'Content-Type' => 'application/json',
        ])->post("{$this->baseUrl}/epayment/lookup/", [
            'pidx' => $pidx,
        ]);

        if ($response->failed()) {
            throw new RuntimeException('Khalti lookup failed: ' . $response->body());
        }

        return $response->json();
    }
}
