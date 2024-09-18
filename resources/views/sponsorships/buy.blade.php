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
    <form action="#" method="POST">
        <div class="row d-flex justify-content-around">
            <!-- Card Basic -->
            <div class="card py-5" style="width: 20rem;">
                <div class="card-body text-center">
                    <h3 class="card-title fs-1">BASIC</h3>
                    <h4 class="card-text"><strong>24</strong> ore di sponsorizzazione per il tuo profilo!</h4>
                    <h2>&euro; 2,99</h2>
                    <!-- Custom Radio button per Basic -->
                    <div class="custom-radio">
                        <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="basic" value="basic">
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
                        <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="standard" value="standard">
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
                        <input class="sponsorship-checkbox form-check-input" type="radio" name="sponsorship" id="premium" value="premium">
                        <label class="form-check-label" for="premium">Seleziona Premium</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-success" id="buy-sponsorship-btn">Acquista Sponsorship</button>
        </div>
    </form>
</div>
@endsection

@section('custom-script')
@vite(['resources/js/buy-sponsorship.js'])
@endsection
