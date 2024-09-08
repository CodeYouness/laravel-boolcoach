@extends('layouts.users')
@section('page-title')
    users {{ $user->name }}
@endsection
@section('main-content')
    <div id="profile-wrapper" class="container-fluid px-4 py-5">
        <div class="row justify-content-around">
            <div class="col-7 text-white align-self-start ms-3">
                <div class="row">
                    <div class="col-12 card p-3 mb-5">
                        <h1>Info</h1>
                    </div>
                    <div class="col-12 card p-3">
                        <h1>Your Games</h1>
                    </div>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-start">
                <div class="row">
                    <div class="col-12 profile-img card rounded-circle mb-5">
                    </div>
                    <div class="col-12 card p-3">
                        <h1>Available</h1>
                    </div>
                </div>
            </div>
            {{-- <article class="card w-50 p-0" style="width: 18rem;">

                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->nickname }}</p>
                    <img src="{{ asset('storage/' . $user->img_url) }}" alt="">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID Number: {{ $user->id }}</li>
                    <li class="list-group-item">{{ $user->name }}</li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Back to index</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger " value="Delete">
                    </form>
                </div>
            </article> --}}
        </div>
    </div>
@endsection
