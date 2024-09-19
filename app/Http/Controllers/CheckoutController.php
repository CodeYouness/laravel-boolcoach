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
        $userHasSponsorship = null;
        $user = Auth()->user();
        $sponsorships = $user->sponsorships;

        // dd($sponsorships);
        foreach ($sponsorships as $sponsorship) {
            if($sponsorship->pivot_end_date > today()){
                $userHasSponsorship = false;
            }else{
                // dd('HAHA NON PUOI AVERE SPONSORSHIPS');
                $userHasSponsorship = true;
            }
        };

        if($userHasSponsorship){
            return view('sponsorships.index', compact('user'))->with('message', 'Non puoi acquistare una Sponsorship se ne hai una attiva!');
        }else {
            $braintreeService = new BraintreeService();
            $clientToken = $braintreeService->clientToken();
            $amount = $request->query('amount');
            $sponsorshipId = $request->query('sponsorship_id');

            $selectedSponsorship = Sponsorship::findOrFail($sponsorshipId);
            $sponsorshipDuration = $selectedSponsorship->time;

            return view('checkout', compact('clientToken', 'amount', 'selectedSponsorship', 'sponsorshipDuration'));
        }
    }

    public function processPayment(Request $request)
    {
        $braintreeService = new BraintreeService();
        $result = $braintreeService->processPayment($request->amount, $request->payment_method_nonce);


        if ($result->success) {

            $user = auth()->user();
            $sponsorship = Sponsorship::findOrFail($request->input('sponsorship_id'));
            $startDate = Carbon::now();
            $endDate = $startDate->copy()->addHours($sponsorship->time);

            $user->sponsorships()->attach($sponsorship->id, [
                'start_date' => $startDate,
                'end_date' => $endDate
            ]);

            return redirect()->route('users.index')->with('message', 'Adesso sei un utente sponsorizzato!');
        } else {
            return back()->withErrors('Payment failed.');
        }
    }
}
