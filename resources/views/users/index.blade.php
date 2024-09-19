@extends('layouts.users')
@section('page-title')
    BoolCoach
@endsection
@section('main-content')
    <div id="dashboard-wrapper" class="container py-4">
        {{-- @dd(count($sponsorship)) --}}
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
                        <p class="fs-4 ">Prezzo/ora: <span>&euro; {{auth()->user()->price}}</span></p>
                        <p class="fs-4">Sei:  {{(auth()->user()->is_available == true) ? 'disponibile' : 'non disponibile'}}</p>
                        @auth
                            <p class="fs-4"><span class="fs-3">{{count($todayReviews)}}</span> recensioni ricevute oggi</p>
                        @endauth
                        @auth
                            <p class="fs-4"><span class="fs-3">{{count($todayMessages)}}</span> messaggi ricevuti oggi</p>
                        @endauth
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
                                @if (count($sponsorship) != 0)
                                    <h4 class="mb-1">Hai una sponsorizzazione attiva</p>
                                    <p class="fs-5">Fine della sponsorizzazione: {{$endDate[0]}}</p>
                                @else
                                    <h5 class="text-secondary mb-0">Non hai sponsorizzazione attive</h5>
                                @endif
                            </section>
                        </div>
                    </div>
                    <section class="col-12 col-lg-4 card p-3 align-self-start">
                        <h4>Ultime recensioni</h4>
                        @forelse ($lastReviews as $review)
                            <div class="px-3 py-2 my-2">
                                <p class="mb-1">Mittente: {{$review->username}}</p>
                                <p class="mb-0 ms-1">"{{$review->description}}"</p>
                            </div>
                        @empty
                            <p class="text-secondary mb-0">Non ci sono recensioni</p>
                        </section>
                        @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
