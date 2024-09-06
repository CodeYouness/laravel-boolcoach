@extends('layouts.users')
@section('page-title')
    BoolCoach
@endsection
@section('main-content')
    <div id="dashboard-wrapper" class="container py-4">
        <div class="row mb-3">
            <div class="col-12">
                <div class="row justify-content-around">
                    <section class="col-12 col-md-7 card p-3">
                        <h1 class="text-white">GAMES</h1>
                    </section>
                    <section class="col-12 col-md-4 card p-3">
                        <h1 class="text-white">INFO</h1>
                    </section>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-around">
                    <div class="col-12 col-md-7">
                        <div class="row">
                            <section class="col-12 card p-3 mb-3">
                                <h1>STATISTICS</h1>
                            </section>
                            <section class="col-12 card p-3">
                                <h1>SPONSORSHIPS</h1>
                            </section>
                        </div>
                    </div>
                    <section class="col-12 col-md-4 card p-3">
                        <h1>REVIEWS</h1>
                    </section>
                </div>
            </div>
        </div>
    </div>
    {{-- <table class="table table-dark table-striped table-hover text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Nickname</th>
                <th>Game</th>
                <th>Language</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ auth()->user()->id }}</td>
                <td>{{ auth()->user()->name }} {{ auth()->user()->surname }}</td>
                <td>{{ auth()->user()->nickname }}</td>
                <td>
                    @forelse (auth()->user()->games as $game)
                        <button class="badge bg-primary rounded-pill border-0">{{ $game->name }}</button>
                    @empty
                        No Games setted
                    @endforelse
                </td>
                <td>{{ auth()->user()->language }}</td>
                <td>{{ auth()->user()->price }}</td>
                <td>
                    <a href="{{ route('users.show', auth()->user()) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('users.edit', auth()->user()) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('users.destroy', auth()->user()) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>

            @foreach ($users as $user)
                @if (auth()->id() === $user->id)
                @else
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name, $user->surname }}</td>
                        <td>{{ $user->nickname }}</td>
                        <td>
                            @forelse ($user->games as $game)
                                <button class="badge bg-primary rounded-pill border-0">{{ $game->name }}</button>
                            @empty
                                No Games setted
                            @endforelse
                        </td>
                        <td>{{ $user->language }}</td>
                        <td>{{ $user->price }}</td>
                        @if (auth()->id() === $user->id)
                            <td><a href="{{ route('users.show', $user) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('users.destroy', $user) }}" class="btn btn-danger">Delete</a>
                            </td>
                        @else
                            <td>No action available</td>
                        @endif
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table> --}}
    <div class="container-fluid d-flex">


    </div>
@endsection
