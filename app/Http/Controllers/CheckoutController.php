<?php

namespace App\Http\Controllers;

use App\Models\sponsorship;
use App\Services\BraintreeService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckoutForm(Request $request)
    {
        $braintreeService = new BraintreeService();
        $clientToken = $braintreeService->clientToken();
        $amount = $request->query('amount'); // Ottieni l'importo dalla query string

        return view('checkout', compact('clientToken', 'amount'));
    }

    public function processPayment(Request $request)
    {
        $braintreeService = new BraintreeService();
        $result = $braintreeService->processPayment($request->amount, $request->payment_method_nonce);

        if ($result->success) {
            return redirect()->route('users.index');
        } else {
            return back()->withErrors('Payment failed.');
        }
    }
}
