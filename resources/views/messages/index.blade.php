@extends('layouts.users')
@section('page-title')
    Reviews
@endsection
@section('main-content')
    <div class="container m-4">
        @foreach ($messages as $message)
        <div class="card mb-3 me-4">
            <div class="row g-0">
            <div class="col-md-4 my-auto">
                <div class="row">
                    <div class="col-4 mx-auto">
                        <h5>Username:</h5>
                        <h5>Email:</h5>
                    </div>
                    <div class="col-6">
                        <h6>{{ $message->username }}</h6>
                        <h6>{{ $message->email }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">Message:</h3>
                    <p class="card-text">{{ $message->content }}</p>
                    <p class="card-text"><small class="text-black">Sent at {{ $message->created_at->format('H:i') }} of {{ $message->created_at->format('d/m/y') }}</small></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
