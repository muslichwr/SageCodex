<?php

namespace App\Services;

use App\Models\Pricing;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }

    public function createSnapToken(array $params): string
    {
        try {
            return Snap::getSnapToken($params);
        } catch (\Exception $e) {
            Log::error('Failed to create SNap Token: ' . $e->getMessage());
            throw $e;
        }
    }

    public function handleNotification(): array
    {
        try {
            $notification = new Notification();
            return [
                'order_id' => $notification->order_id,
                'transaction_status' => $notification->transaction_status,
                'gross_amount' => $notification->gross_amount,
                'custom_field1' => $notification->custom_field1,
                'custom_field2' => $notification->custom_field2,
            ];
        } catch (\Exception $e) {
            Log::error('Midtrans notification error: ' . $e->getMessage());
            throw $e;
        }
    }
}