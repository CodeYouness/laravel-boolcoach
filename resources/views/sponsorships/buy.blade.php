@extends('layouts.users')
@section('page-title')
Acquista una sponsorship
@endsection

@section('main-content')
<div class="container">
    <div class="row d-flex justify-content-center my-5">
        <div class="col-12 text-center">
            <h1 class="text-white">Acquista una Sponsorship</h1>
            <p class="text-white fs-3">Gli utenti con una sponsorship saranno mostrati nei "Coach in evidenza" e avranno più visibilità</p>
        </div>
    </div>
    <form id="sponsorship-form" method="POST">
        @csrf
        <div class="row d-flex justify-content-around">
            <!-- Card Basic -->
            <div class="card py-5" style="width: 20rem;">
                <div class="card-body text-center">
                    <h3 class="card-title fs-1">BASIC</h3>
                    <h4 class="card-text"><strong>24</strong> ore di sponsorizzazione per il tuo profilo!</h4>
                    <h2>&euro; 2,99</h2>
                    <!-- Custom Radio button per Basic -->
                    <div class="custom-radio">
                        <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="basic" value="2.99">
                        <label class="form-check-label" for="basic">Seleziona Basic</label>
                    </div>
                </div>
            </div>

            <!-- Card Standard -->
            <div class="card py-5" style="width: 20rem;">
                <div class="card-body text-center">
                    <h3 class="card-title fs-1">STANDARD</h3>
                    <h4 class="card-text"><strong>72</strong> ore di sponsorizzazione per il tuo profilo!</h4>
                    <h2>&euro; 5,99</h2>
                    <!-- Custom Radio button per Standard -->
                    <div class="custom-radio">
                        <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="standard" value="5.99">
                        <label class="form-check-label" for="standard">Seleziona Standard</label>
                    </div>
                </div>
            </div>

            <!-- Card Premium -->
            <div class="card py-5" style="width: 20rem;">
                <div class="card-body text-center">
                    <h3 class="card-title fs-1">PREMIUM</h3>
                    <h4 class="card-text"><strong>144</strong> ore di sponsorizzazione per il tuo profilo!</h4>
                    <h2>&euro; 9,99</h2>
                    <!-- Custom Radio button per Premium -->
                    <div class="custom-radio">
                        <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="premium" value="9.99">
                        <label class="form-check-label" for="premium">Seleziona Premium</label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Drop-in container per Braintree -->
    <div id="dropin-container" class="my-4"></div>

    <!-- Bottone per acquistare la sponsorship -->
    <div class="text-center">
        <button id="buy-sponsorship-btn" class="btn btn-success">Acquista Sponsorship</button>
    </div>
</div>
@endsection

@section('custom-script')
@vite(['resources/js/buy-sponsorship.js'])
<script src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let form = document.getElementById('sponsorship-form');
        let selectedAmount = null;
        let buyButton = document.getElementById('buy-sponsorship-btn');

        // Gestisci selezione della sponsorship
        document.querySelectorAll('.sponsorship-checkbox').forEach(radio => {
            radio.addEventListener('change', function() {
                selectedAmount = this.value;
            });
        });

        // Inizializza il Braintree Drop-in UI
        braintree.dropin.create({
            authorization: '{{ $clientToken }}', // Assicurati di passare il token dal server
            container: '#dropin-container'
        }, function(err, instance) {
            if (err) {
                console.error('Errore nell\'inizializzazione del Drop-in:', err);
                return;
            }

            // Gestione dell'evento submit per l'acquisto
            buyButton.addEventListener('click', function(event) {
                event.preventDefault();

                if (!selectedAmount) {
                    alert('Seleziona un piano di sponsorship.');
                    return;
                }

                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.error('Errore durante la richiesta del metodo di pagamento:', err);
                        return;
                    }

                    // Invia i dati al server tramite POST usando Axios
                    axios.post('/checkout', {
                        amount: selectedAmount,
                        paymentMethodNonce: payload.nonce
                    })
                    .then(response => {
                        console.log('Pagamento completato:', response.data);
                        // Esegui un redirect o mostra un messaggio di successo
                    })
                    .catch(error => {
                        console.error('Errore nel pagamento:', error);
                    });
                });
            });
        });
    });
</script>
@endsection
