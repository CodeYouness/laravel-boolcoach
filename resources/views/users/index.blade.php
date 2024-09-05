@extends('layouts.users')
@section('page-title')
    BoolCoach
@endsection
@section('main-content')
    <table class="table table-dark table-striped table-hover text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Nickname</th>
                <th>Language</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name, $user->surname }}</td>
                    <td>{{ $user->nickname }}</td>
                    <td>{{ $user->language }}</td>
                    <td>{{ $user->price }}</td>
                    @if (auth()->id() === $user->id)
                        <td><a href="{{ route('users.show', $user) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('users.destroy', $user) }}" class="btn btn-danger">Delete</a>
                        </td>
                        @else <td>No action available</td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
