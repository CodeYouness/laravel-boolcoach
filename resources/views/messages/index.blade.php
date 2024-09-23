@extends('layouts.users')
@section('page-title')
    Messaggi
@endsection
@section('main-content')
    <div class="container-fluid p-4 overflow-auto h100">
        @if (count($messages) > 0)
        @foreach ($messages as $message)
            <div class="card mb-3 py-3">
                <div class="col-12 mb-3 pt-3 px-4 pt-md-0">
                    <div class="row flex-column">
                        <div class="col-12 mb-3">
                            <h5 class="mb-2 fw-bold">Mittente:</h5>
                            <h6 class="mb-0 ">{{ $message->username }}</h6>
                        </div>
                        <div class="col-12">
                            <h5 class="mb-2 fw-bold">Email:</h5>
                            <h6 class="mb-0">{{ $message->email }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 px-4">
                    <div>
                        <h4 class="card-title fw-bold">Messaggio:</h4>
                        <p class="card-text">{{ $message->content }}</p>
                        <p class="card-text"><small class="text-secondary">Inviato alle
                                {{ $message->created_at->format('H:i') }} del
                                {{ $message->created_at->format('d/m/y') }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach

        @else <span class="text-white">Non ci sono messaggi</span>
        @endif

    </div>
@endsection
