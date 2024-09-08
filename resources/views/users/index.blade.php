@extends('layouts.users')
@section('page-title')
    BoolCoach
@endsection
@section('main-content')
    <div id="dashboard-wrapper" class="container py-4">
        <div class="row mb-3">
            <div class="col-12">
                <div class="row justify-content-around">
                    <section class="col-12 col-md-7 card p-3">
                        <h1 class="text-white">GAMES</h1>
                    </section>
                    <section class="col-12 col-md-4 card p-3">
                        <h1 class="text-white">INFO</h1>
                    </section>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-around">
                    <div class="col-12 col-md-7">
                        <div class="row">
                            <section class="col-12 card p-3 mb-3">
                                <h1>STATISTICS</h1>
                            </section>
                            <section class="col-12 card p-3">
                                <h1>SPONSORSHIPS</h1>
                            </section>
                        </div>
                    </div>
                    <section class="col-12 col-md-4 card p-3">
                        <h1>REVIEWS</h1>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
