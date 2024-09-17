@extends('layouts.users')
@section('page-title')
    BoolCoach
@endsection
@section('main-content')
    <div id="dashboard-wrapper" class="container py-4">
        <div class="row justify-content-center">
            <div class="col-10 col-lg-12">
                <div class="row justify-content-around">
                    <section class="games col-12 col-lg-7 card p-3 mb-3">
                        {{-- <h1 class="text-white">Giochi</h1> --}}
                        @forelse (auth()->user()->games as $game)
                            <button class="btn bg-transparent mx-2 mb-2 border-0">
                                <img  src="{{$game->img}}" alt="{{$game->name}}">
                            </button>
                        @empty
                            <span>Non hai ancora settato alcun gioco</span>
                        @endforelse
                    </section>
                    <section class="col-12 col-lg-4 card px-3 py-4 mb-3 order-lg-1 align-self-start">
                        <p class="fs-4 ">Lingua: <span>{{auth()->user()->language}}</span></p>
                        <p class="fs-4 ">Prezzo/ora: <span>&euro; {{auth()->user()->price}}</span></p>
                        <p class="fs-4">Sei:  {{(auth()->user()->is_available == true) ? 'disponibile' : 'non disponibile'}}</p>
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
                    <section class="col-12 col-lg-4 card p-3 align-self-start">
                        <h4>Recensioni</h4>
                        @forelse ($lastReviews as $review)
                            <p>{{$review->username}}</p>
                            <p class="mb-3">{{$review->description}}</p>
                        @empty
                            <p class="text-secondary mb-0">Non ci sono recensioni</p>
                        @endforelse
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
