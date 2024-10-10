<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function subscribe(Request $request)
    {
        $paymentPlan = $request->input('paymentPlan');

        $amount = $paymentPlan === 'yearly' ? 1200 : 100;

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $intent = PaymentIntent::create([
            'amount' => $amount,
            'currency' => 'eur',
            'source' => $request->input('stripeToken'),
        ]);

        return redirect()->back()->with('success', 'Payment successful!');
    }
}
