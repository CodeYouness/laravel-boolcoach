@extends('layouts.users')
@section('page-title')
    Reviews
@endsection
@section('main-content')

    <div class="container m-4">
        <div class="row d-flex flex-center my-4">
            <div class="col-6">
                <h1 class="h2 text-white mb-4">Your reviews</h1>
                <div class="reviews-container">
                    @foreach ($reviews as $index=>$review)
                    <div class="card mb-5">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Review no. {{$index+1}}</h4>
                            <h5 class="card-title">left by: <em>{{$review->username}}</em></h5>
                            <h6 class="card-title mb-2 text-black">on {{$review->created_at->toFormattedDayDateString()}}</h6>
                            <p class="card-text">{{$review->description}}</p>
                            <a href="#" class="card-link">Contact user</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <h1 class="h2 text-white mb-4">Your votes</h1>
                <ul class="list-unstyled d-flex flex-wrap">
                @foreach ($userVotes as $vote)
                        <li class="mb-3 w-25 mx-2">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{$vote->lable}}</h5>
                                    <p class="card-text">{{$vote->created_at->toFormattedDayDateString()}}</p>
                                    <div class="rating-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= $vote->value ? 'text-warning' : '' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </li>
                @endforeach
                </ul>
            </div>
            </div>
        </div>
    </div>
@endsection
