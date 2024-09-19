@extends('layouts.users')

@section('main-content')
<div id="dropin-container"></div>

<form id="payment-form" action="{{ route('checkout.process') }}" method="POST">
    @csrf
    @method('POST')
    <input type="hidden" id="nonce" name="payment_method_nonce">
    <input type="hidden" name="amount" value="{{ $amount }}"> <!-- Utilizza l'importo passato -->
    <button id="submit-button">Paga</button>
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
</script>
@endsection

@section('custom-script')
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
                    console.log('Metodo di pagamento richiesto:', payload);

                    var paymentNonce = document.createElement('input');
                    paymentNonce.setAttribute('type', 'hidden');
                    paymentNonce.setAttribute('name', 'payment_method_nonce');
                    paymentNonce.setAttribute('value', payload.nonce);
                    formEl.appendChild(paymentNonce);

                    formEl.submit();
                });
            });
        });
    </script>
@endsection
