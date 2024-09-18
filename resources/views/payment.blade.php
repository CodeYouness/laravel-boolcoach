<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento Braintree</title>
    <!-- Includi lo script Braintree -->
    <script src="https://js.braintreegateway.com/web/dropin/1.33.6/js/dropin.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Paga con Braintree</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Selezione dell'importo -->
        <div class="price-options mb-3">
            <h4>Seleziona un importo:</h4>
            <button type="button" class="btn btn-primary" onclick="selectAmount(10)">€10</button>
            <button type="button" class="btn btn-primary" onclick="selectAmount(20)">€20</button>
            <button type="button" class="btn btn-primary" onclick="selectAmount(50)">€50</button>
        </div>

        <!-- Form per il pagamento -->
        <form id="payment-form" action="{{ route('payment.checkout') }}" method="POST">
            @csrf
            <!-- Campo nascosto per l'importo -->
            <input type="hidden" id="amount" name="amount" value="">

            <div id="dropin-container"></div>
            <button type="submit" id="submit-button" disabled>Paga Ora</button>
        </form>
    </div>

    <script>
        // Inizializza Braintree Drop-in
        var form = document.querySelector('#payment-form');
        var clientToken = "{{ $clientToken }}";
        var submitButton = document.querySelector('#submit-button');

        // Funzione per selezionare l'importo
        function selectAmount(amount) {
            document.getElementById('amount').value = amount;
            submitButton.disabled = false; // Abilita il bottone di submit
            console.log('Importo selezionato:', amount);
        }

        // Braintree Drop-in setup
        braintree.dropin.create({
            authorization: clientToken,
            container: '#dropin-container'
        }, function (createErr, instance) {
            if (createErr) {
                console.error(createErr);
                return;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error(err);
                        return;
                    }

                    // Aggiungi il nonce al form e invialo
                    var nonceInput = document.createElement('input');
                    nonceInput.setAttribute('type', 'hidden');
                    nonceInput.setAttribute('name', 'payment_method_nonce');
                    nonceInput.setAttribute('value', payload.nonce);
                    form.appendChild(nonceInput);

                    form.submit();
                });
            });
        });
    </script>
</body>
</html>
