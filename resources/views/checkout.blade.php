@extends('layouts.users')

@section('page-title')
Acquista una sponsorizzazione
@endsection

@section('main-content')
<div class="sponsorship-info text-white m-4 d-flex justify-content-evenly align-items-center">

    <div class="sub-details-list">
        <h2 class="mb-5">I dettagli del tuo acquisto</h2>
        <p>Sponsorship selezionata: {{$selectedSponsorship->name}}</p>
        <p>Inizio sponsorship: {{ Carbon\Carbon::now()->locale('it_IT')->timezone('Europe/Rome')->isoFormat('dddd D MMMM YYYY') }}</p>
        <p>Fine sponsorship: {{ Carbon\Carbon::now()->copy()->addHours($sponsorshipDuration)->locale('it_IT')->timezone('Europe/Rome')->isoFormat('dddd D MMMM YYYY') }}</p>
        <p>ATTENZIONE: hai 5 minuti di tempo per effettuare il pagamento! Dopodiché sarai reindirizzato</p>
    </div>

    <div class="timer d-flex">
        <div class="countdown-el mins-c">
            <p class="fs-2" id="mins">0</p>
        </div>
        <div class="fs-2">
            <p>:</p>
        </div>
        <div class="countdown-el seconds-c">
            <p class="fs-2" id="seconds">0</p>
        </div>
    </div>
</div>

<div id="dropin-container" class="mx-4"></div>

<form id="payment-form" action="{{ route('checkout.process') }}" method="POST">
    @csrf
    @method('POST')
    <input type="hidden" id="nonce" name="payment_method_nonce">
    <input type="hidden" name="amount" value="{{ $amount }}">
    <input type="hidden" name="sponsorship_id" value="{{ $selectedSponsorship->id }}">
    <button id="submit-button" class="btn btn-success ms-4 w-25">Paga</button>
</form>

<script src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js"></script>
<script>
    const formEl = document.querySelector('#payment-form');
    var clientToken = "{{ $clientToken }}";

    braintree.dropin.create({
        authorization: clientToken,
        container: '#dropin-container'
    }, function (createErr, instance) {
        if (createErr) {
            console.log('Errore nella creazione del Dropin:', createErr);
            return;
        }

        formEl.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Errore nella richiesta del metodo di pagamento:', err);
                    return;
                }

                var paymentNonce = document.createElement('input');
                paymentNonce.setAttribute('type', 'hidden');
                paymentNonce.setAttribute('name', 'payment_method_nonce');
                paymentNonce.setAttribute('value', payload.nonce);
                formEl.appendChild(paymentNonce);

                formEl.submit();
            });
        });
    });

    const minsEl = document.getElementById('mins');
    const secondsEl = document.getElementById('seconds');

    let totalSeconds = 5 * 60; // 5 minuti in secondi

    function countdown() {
        const mins = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;

        minsEl.innerHTML = formatTime(mins);
        secondsEl.innerHTML = formatTime(seconds);

        if (totalSeconds > 0) {
            totalSeconds--;
        } else {
            clearInterval(interval);
            window.alert('Timer scaduto! Sarai reindirizzato')
            window.location.href = 'http://127.0.0.1:8000/sponsorships'
        }
    }

    const interval = setInterval(countdown, 1000);

    countdown();

    function formatTime(time) {
        return time < 10 ? `0${time}` : time;
    }



</script>
@endsection

