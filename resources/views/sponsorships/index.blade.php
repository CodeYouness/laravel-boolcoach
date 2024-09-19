@extends('layouts.users')
@section('page-title')
    Sponsorizzazioni
@endsection
@section('main-content')
    <div class="container">
        <div class="row d-flex flex-center m-4 me-4">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h1 class="h2 text-white mb-4">Le tue sponsorizzazioni attive</h1>
                </div>

                @if (session('error'))
                <div class="alert alert-danger">
                    <p class="text-danger fs-3">{{ session('error') }}</p>
                </div>
                @endif

                @if($user->sponsorships->isNotEmpty())
                    @foreach ($user->sponsorships as $sponsorship)
                        <div class="reviews-container">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h3 class="card-title">Piano: {{ $sponsorship->name }}</h3>
                                    <h4 class="card-subtitle mb-2">{{ $sponsorship->price }}€</h4>
                                    <h6 class="card-title mb-2">
                                        Comprato il
                                        {{ \Carbon\Carbon::parse($sponsorship->pivot->start_date)->format('j F Y, \a\t H:i:s') }}
                                    </h6>
                                    <h6 class="card-title mb-2">
                                        Termina il
                                        {{ \Carbon\Carbon::parse($sponsorship->pivot->end_date)->format('j F Y, \a\t H:i:s') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="reviews-container">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Niente da vedere qua...</h4>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col col-sm-5 col-md-3 col-l-4 col-xl-2 mt-4">
                    <a href="{{ route('sponsorship.buy') }}"
                        class="btn btn-success  fs-5 fw-bold d-flex align-items-center justify-content-center">Compra una
                        sponsorizzazione</a>
                </div>
            </div>

        </div>
    </div>
@endsection
