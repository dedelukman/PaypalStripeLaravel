<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\PaymentPlatform;


class HomeController extends Controller
{

    public function index(){
        $currencies = Currency::all();
        $paymentPlatforms = PaymentPlatform::all();
        return view('dashboard', compact('currencies', 'paymentPlatforms'));

    }
}
