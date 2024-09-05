@extends('layouts.users')
@section('page-title')
    BoolCoach
@endsection
@section('main-content')
    <table class="table table-striped table-hover text-center">
        <thead class="table-info">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->created_at }}</td>
                    <td>{{ $review->name }}</td>
                    <td>{{ $review->email }}</td>
                    <td>{{ $review->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
