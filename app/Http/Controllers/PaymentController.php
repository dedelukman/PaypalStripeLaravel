<?php

namespace App\Http\Controllers;

use App\Services\PaypalService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request){


        $request->validate([
            'value' => ['required', 'numeric', 'min:5'],
            'currency' => ['required', 'exists:currencies,iso'],
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ]);

        $paymentPlatform = resolve(PaypalService::class);

        return $paymentPlatform->handlePayment($request);

        return $request->all();
    }

    public function approval(){
        $paymentPlatform = resolve(PaypalService::class);
        return $paymentPlatform->handleApproval();
    }

    public function cancelled(){
        return redirect()
        ->route('dashboard')
        ->withErrors('You cancelled the payment');
    }



}
