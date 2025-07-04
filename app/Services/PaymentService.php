<?php

namespace App\Services;

use App\Helpers\TransactionHelper;
use App\Models\Pricing;
use App\Repository\PricingRepositoryInterface;
use App\Repository\TransactionRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    protected $midtransService;
    protected $pricingRepository;
    protected $transactionRepository;

    public function __construct(
        MidtransService $midtransService,
        PricingRepositoryInterface $pricingRepository,
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->midtransService = $midtransService;
        $this->pricingRepository = $pricingRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function createPayment(int $pricingId)
    {
        $user = Auth::user();
        // $pricing = Pricing::findOrFail($pricingId);
        $pricing = $this->pricingRepository->findById($pricingId);

        $tax = 0.12;
        $totalTax = $pricing->price * $tax;
        $grandTotal = $pricing->price + $totalTax;

        $params = [
            'transaction_details' => [
                'order_id' => TransactionHelper::generateUniqueTrxId(),
                'gross_amount' => (int) $grandTotal,
            ],
            'costumer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => '081234567890',
            ],
            'item_details' => [
                [
                    'id' => $pricing->id,
                    'price' => (int) $pricing->price,
                    'quantity' => 1,
                    'name' => $pricing->name,
                ],
                [
                    'id' => 'tax',
                    'price' => (int) $totalTax,
                    'quantity' => 1,
                    'name' => 'PPN 12%',
                ],
            ],
            'custom_field1' => $user->id,
            'custom_field2' => $pricingId,
        ];

        return $this->midtransService->createSnapToken($params);
    }

    public function handlePaymentNotification()
    {
        $notification = $this->midtransService->handleNotification();

        if (in_array($notification['transaction_status'], ['capture', 'settlement'])) {
            $pricing = Pricing::findOrFail($notification['custom_field2']);
            // $user = User::findOrFail($notification['custom_field1']);
            $this->createTransaction($notification, $pricing);
        }
        return $notification['transaction_status'];
    }

    protected function createTransaction(array $notification, Pricing $pricing)
    {
        $startedAt = now();
        $endedAt = $startedAt->copy()->addMonths($pricing->duration);

        $transactionData = [
            'user_id' => $notification['custom_field1'],
            'pricing_id' => $notification['custom_field2'],
            'sub_total_amount' => $pricing->price,
            'total_tax_amount' => $pricing->price * 0.12,
            'grand_total_amount' => $notification['gross_amount'],
            'payment_type' => 'Midtrans',
            'is_paid' => true,
            'booking_trx_id' => $notification['order_id'],
            'started_at' => $startedAt,
            'ended_at' => $endedAt,
        ];

        $this->transactionRepository->create($transactionData);
        Log::info('Transaction created successfully', $notification['order_id']);
    }
}