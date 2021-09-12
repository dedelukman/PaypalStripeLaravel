<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request){


        $request->validate([
            'value' => ['required', 'numeric', 'min:5'],
            'currency' => ['required', 'exists:currencies,iso'],
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ]);

        return $request->all();
    }

    public function approval(){}
    public function cancelled(){}



}
