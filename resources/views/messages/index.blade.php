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
                        <td>{{ $message->username }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->content }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
