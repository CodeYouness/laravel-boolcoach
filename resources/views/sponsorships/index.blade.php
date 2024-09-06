@extends('layouts.users')
@section('page-title')
    Reviews
@endsection
@section('main-content')
    <div class="container m-4">
        <div class="row d-flex flex-center my-4 me-4">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h1 class="h2 text-white mb-4">Your sponsorship</h1>
                    <a href="#" class="card-link">Buy sponsorship</a>
                </div>

                @if($user->sponsorships->isNotEmpty())
                    @foreach ($user->sponsorships as $sponsorship)
                        <div class="reviews-container">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Plan: {{$sponsorship->name}}</h4>
                                    <h6 class="card-title mb-2 text-black">
                                        Buyed on {{ \Carbon\Carbon::parse($sponsorship->pivot->start_date)->format('j F Y, \a\t H:i:s') }}
                                    </h6>
                                    <h6 class="card-title mb-2 text-black">
                                        It ends {{ \Carbon\Carbon::parse($sponsorship->pivot->end_date)->format('j F Y, \a\t H:i:s') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="reviews-container">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Nothing to see there...</h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            </div>
        </div>
@endsection
