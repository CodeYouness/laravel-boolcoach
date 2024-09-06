@extends('layouts.users')
@section('page-title')
    users {{ $user->name }}
@endsection
@section('main-content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <article class="card w-50 p-0" style="width: 18rem;">

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
            </article>
        </div>
    </div>
@endsection
