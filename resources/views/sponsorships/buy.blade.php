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
    <form id="sponsorship-form" method="GET" action="{{ route('checkout') }}">
        @csrf
        <div class="row d-flex justify-content-around">
            <!-- Card Basic -->
            <div class="card py-5" style="width: 20rem;">
                <div class="card-body text-center">
                    <h3 class="card-title fs-1">BASIC</h3>
                    <h4 class="card-text"><strong>24</strong> ore di sponsorizzazione per il tuo profilo!</h4>
                    <h2>&euro; 2,99</h2>
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
                    <div class="custom-radio">
                        <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="premium" value="9.99">
                        <label class="form-check-label" for="premium">Seleziona Premium</label>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="amount" id="amount">
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Vai al Checkout</button>
        </div>
    </form>


    <!-- Drop-in container per Braintree -->
    <div id="dropin-container" class="my-4"></div>

</div>
@endsection

@section('custom-script')
@vite(['resources/js/buy-sponsorship.js'])

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.sponsorship-checkbox');
        const amountField = document.getElementById('amount');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (checkbox.checked) {
                    amountField.value = checkbox.value;
                }
            });
        });
    });
</script>
@endsection
