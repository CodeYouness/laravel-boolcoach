@extends('layouts.users')
@section('page-title')
    Messages
@endsection
@section('main-content')
    <div class="container-fluid p-4 overflow-auto h100">
        @foreach ($messages as $message)
        <div class="card mb-3 py-3">
            <div class="row g-0">
            <div class="col-12 col-md-4 my-md-auto mb-3 pt-3 pt-md-0">
                <div class="row flex-column">
                    <div class="col-12 d-flex align-items-baseline mb-3 px-4">
                        <h5 class="mb-0 ms-4 w-50 fw-bold">Nome utente:</h5>
                        <h6 class="mb-0">{{ $message->username }}</h6>
                    </div>
                    <div class="col-12 d-flex align-items-baseline px-4">
                        <h5 class="mb-0 ms-4 w-50 fw-bold">Email:</h5>
                        <h6 class="mb-0">{{ $message->email }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card-body px-4">
                    <h4 class="card-title fw-bold">Messaggio:</h4>
                    <p class="card-text">{{ $message->content }}</p>
                    <p class="card-text"><small class="text-secondary">Inviato alle {{ $message->created_at->format('H:i') }} del {{ $message->created_at->format('d/m/y') }}</small></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
