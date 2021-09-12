<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Models\Currency;
use App\Models\PaymentPlatform;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/payments/pay', [PaymentController::class, 'pay'])->middleware(['auth'])->name('pay');
Route::post('/payments/approval', [PaymentController::class, 'appropal'])->name('appropal');
Route::post('/payments/cancelled', [PaymentController::class, 'cancelled'])->name('cancelled');

require __DIR__.'/auth.php';


