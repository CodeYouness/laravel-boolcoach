<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\sponsorship;
use App\Services\BraintreeService;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckoutForm(Request $request)
    {
        $braintreeService = new BraintreeService();
        $clientToken = $braintreeService->clientToken();
        $amount = $request->query('amount');
        $sponsorshipId = $request->query('sponsorship_id');

        $selectedSponsorship = Sponsorship::findOrFail($sponsorshipId);
        $sponsorshipDuration = $selectedSponsorship->time;

        return view('checkout', compact('clientToken', 'amount', 'selectedSponsorship', 'sponsorshipDuration'));
    }

    public function processPayment(Request $request)
    {
        $braintreeService = new BraintreeService();
        $result = $braintreeService->processPayment($request->amount, $request->payment_method_nonce);


        if ($result->success) {

            // dd($request);
            //! AGGIORNARE LA TABELLA PIVOT
            $user = auth()->user();

            // dd($user->sponsorships());
            $sponsorship = Sponsorship::findOrFail($request->input('sponsorship_id'));

            $startDate = Carbon::now();
            $endDate = $startDate->copy()->addHours($sponsorship->time);

            try {
                $user->sponsorships()->attach($sponsorship->id, [
                    'start_date' => $startDate,
                    'end_date' => $endDate
                ]);
            } catch (\Exception $e) {
                dd('Errore nell\'aggiunta della sponsorship:', $e->getMessage());
            }

            return redirect()->route('users.index');
        } else {
            return back()->withErrors('Payment failed.');
        }
    }
}
