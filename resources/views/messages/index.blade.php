@extends('layouts.users')
@section('page-title')
    Reviews
@endsection
@section('main-content')
    <div class="container">
        <table class="table table-striped table-hover text-center">
            <thead class="table-info">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td></td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container">
        @foreach ($messages as $message)
        <div class="card mb-3">
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
