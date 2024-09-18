<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return view('users.index');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::patch('users/{user}/updateIsAvailable', [UserController::class, 'updateIsAvailable'])->name('updateIsAvailable');
    Route::resource('users', UserController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('statistics', StatisticController::class);
    Route::resource('sponsorships', SponsorshipController::class);
    route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/checkout', [PaymentController::class, 'processPayment'])->name('payment.checkout');
});