<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        // إعداد Stripe API Key
        Stripe::setApiKey(config('services.stripe.secret'));

        // إنشاء Payment Intent
        $paymentIntent = PaymentIntent::create([
            'amount' => $request->amount * 100, // المبلغ يجب أن يكون بالسنتات
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }
}
