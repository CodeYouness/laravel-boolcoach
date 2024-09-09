@extends('layouts.users')
@section('page-title')
    {{ $user->name }}
@endsection
@section('main-content')
    <div id="profile-wrapper" class="container-fluid d-flex flex-column justify-content-between h-100 px-4 pt-5 pb-3">
        <div class="row justify-content-around mb-4">
            <div class="col-12 col-lg-4 order-lg-1 d-flex justify-content-center align-items-start mb-5">
                <div class="row w-100">
                    <div class="col-12 mb-5 d-flex justify-content-center">
                        <div class="profile-img card rounded-circle">
                            <img src="{{ asset('storage/'.$user->img_url) }}" alt="{{ $user->name }} profile avatar" class="rounded-circle">
                        </div>
                    </div>
                    <div class="col-12 card p-3">
                        <h1>@if ($user->is_available)
                            Available
                            @else
                            Not available
                            @endif
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 text-white d-flex justify-content-center align-self-start mb-5">
                <div class="row w-100">
                    <div class="col-12 card p-3 mb-5">
                        <h1 class="fs-2 mb-3">Your info:</h1>
                        <p class="fs-4 mb-1">
                            <span class="me-3" title="Visible only to you">Your real name:</span>
                            {{$user->name}} {{$user->surname}}
                        </p>
                        <p class="fs-4 mb-1">
                            <span class="me-3" title="This is the name the other users will see">Your visible name: </span>
                            {{$user->nickname}}
                        </p>
                        <p class="fs-4 mb-1">
                            <span class="me-3">Price/hour: </span>&euro;
                            {{$user->price}}
                        </p>
                        <p class="fs-4 mb-1">
                            <span class="me-3">Language: </span>
                            {{$user->language}}
                        </p>
                        <p class="fs-4 mb-0">
                            <span class="me-3">Summary: </span>
                            {{$user->summary}}
                        </p>
                    </div>
                    <div class="col-12 card p-3">
                        <h1 class="f2-2 mb-3">Your Games:</h1>
                        <p>
                            @forelse (auth()->user()->games as $game)
                                <button class="fs-4 badge text-bg-light rounded-pill border-0 mx-2 mb-2">{{ $game->name }}</button>
                            @empty
                                <span>No Games setted</span>
                            @endforelse
                        </p>
                    </div>
                </div>
            </div>



            {{-- <ul class="list-group list-group-flush">
                <li class="list-group-item">ID Number: {{ $user->id }}</li>
                <li class="list-group-item">{{ $user->name }}</li>
            </ul> --}}

        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-around align-items-center mb-3">
                <a href="{{ route('users.index') }}" class="btn btn-outline-light btn-lg fw-bold">Back to index</a>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-warning btn-lg fw-bold">Edit</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger btn-lg fw-bold" value="Delete">
                </form>
            </div>
        </div>
    </div>
@endsection
