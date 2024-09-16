@extends('layouts.users')
@section('page-title')
    BoolCoach
@endsection
@section('main-content')
    <div id="dashboard-wrapper" class="container py-4">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-12">
                <div class="row justify-content-around">
                    <section class="col-12 col-lg-7 card p-3 mb-3">
                        <h1 class="text-white">Giochi</h1>
                    </section>
                    <section class="col-12 col-lg-4 card p-3 mb-3 order-lg-1">
                        <h1 class="text-white">Info</h1>
                    </section>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-lg-12">
                <div class="row justify-content-around">
                    <div class="col-12 col-lg-7">
                        <div class="row">
                            <section class="col-12 card p-3 mb-3">
                                <h1>Statistiche</h1>
                            </section>
                            <section class="col-12 card p-3 mb-3">
                                <h1>Sponsorizzazioni</h1>
                            </section>
                        </div>
                    </div>
                    <section class="col-12 col-lg-4 card p-3">
                        <h1>Recensioni</h1>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
