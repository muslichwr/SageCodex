<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Services\PaymentService;
use App\Services\PricingService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{
    protected $transactionService;
    protected $paymentService;
    protected $pricingService;

    public function __construct(
        TransactionService $transactionService,
        PaymentService $paymentService,
        PricingService $pricingService
    ) {
        $this->transactionService = $transactionService;
        $this->paymentService = $paymentService;
        $this->pricingService = $pricingService;
    }
    
    public function index()
    {
        return view('front.index');
    }

    public function pricing()
    {
        $pricing_packages = $this->pricingService->getAllPackage();
        $user = Auth::user();

        return view('front.pricing', compact('pricing_packages', 'user'));
    }

    public function checkout(Pricing $pricing)
    {
        $checkoutData = $this->transactionService->prepareCheckout($pricing);

        if ($checkoutData['alreadySubscribed']) {
            return redirect()->route('front.pricing')->with('error', 'You already subscribed to this plan.');
        }

        return view('front.checkout', $checkoutData);
    }

    public function paymentStoreMidtrans()
    {
        try {
            $pricingId = session()->get('pricing_id');

            if (!$pricingId) {
                return response()->json(['error' => 'No pricing data found in the session.'], 400);
            }

            $snapToken = $this->paymentService->createPayment($pricingId);

            if (!$snapToken) {
                return response()->json(['error' => 'Failed to create Midtrans transaction.'], 500);
            }

            return response()->json(['snap_token' => $snapToken], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Payment failed: ' . $e->getMessage()], 500);
        }
    }

    public function paymentMidtransNotification(Request $request)
    {
        try {

        $transactionStatus = $this->paymentService->handlePaymentNotification();

        if (!$transactionStatus) {
            return response()->json(['error' => 'Invalid transaction data.'], 400);
        }

            return response()->json(['status' => $transactionStatus]);
        } catch (\Exception $e) {
            Log::error('Failed to handle payment notification:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to process payment notification.'], 500);
        }
    }

    public function checkout_success()
    {
        $pricing = $this->transactionService->getRecentPricing();

        if (!$pricing) {
            return redirect()->route('front.pricing')->with('error', 'No recent subscription found.');
        }

        return view('front.checkout_success', compact('pricing'));
    }
}
