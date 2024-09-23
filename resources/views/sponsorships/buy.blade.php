@extends('layouts.users')
@section('page-title')
Acquista una sponsorizzazione
@endsection

@section('main-content')
<form id="sponsorship-form" method="GET" action="{{ route('checkout') }}">
    @csrf

    <div class="row justify-content-around mt-5 w-100">
        <!-- Card Basic -->
        <div class="card py-5" style="width: 20rem;">
            <div class="card-body text-center">
                <h3 class="card-title fs-1">BASIC</h3>
                <h4 class="card-text"><strong>24</strong> ore di sponsorizzazione per il tuo profilo!</h4>
                <h2>&euro; 2,99</h2>
                <!-- Radio button per Basic -->
                <div class="custom-radio">
                    <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="basic" value="1" data-amount="2.99">
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
                <!-- Radio button per Standard -->
                <div class="custom-radio">
                    <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="standard" value="2" data-amount="5.99">
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
                <!-- Radio button per Premium -->
                <div class="custom-radio">
                    <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="premium" value="3" data-amount="9.99">
                    <label class="form-check-label" for="premium">Seleziona Premium</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Campi nascosti -->
    <input type="hidden" name="sponsorship_id" id="sponsorship-id">
    <input type="hidden" name="amount" id="sponsorship-amount">

    <!-- Bottone per inviare il form -->
    <div class="text-center mt-4">
        <button id="buy-sponsorship-btn" class="btn btn-success">Vai al Checkout</button>
    </div>
</form>
@endsection

@section('custom-script')
@vite(['resources/js/buy-sponsorship.js'])

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sponsorshipRadios = document.querySelectorAll('.sponsorship-checkbox');
    const sponsorshipIdInput = document.getElementById('sponsorship-id');
    const amountInput = document.getElementById('sponsorship-amount');

    sponsorshipRadios.forEach(function (radio) {
        radio.addEventListener('change', function () {

            sponsorshipIdInput.value = this.value;
            amountInput.value = this.getAttribute('data-amount');
        });
    });
});

</script>
@endsection
