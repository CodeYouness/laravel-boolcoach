@extends('layouts.users')
@section('page-title')
    Reviews
@endsection
@section('main-content')
    <div class="container">
        <table class="table table-striped table-hover text-center">
            <thead class="table-info">
                <tr>
                    <th>Username</th>
                    <th>Piano</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>

                        @if($user->sponsorships->isNotEmpty())
                            <ul>
                                @foreach($user->sponsorships as $sponsorship)
                                    <li>{{ $sponsorship->name }}</li>
                                    <li>{{ $sponsorship->pivot->start_date }}</li>
                                    <li>{{ $sponsorship->pivot->end_date }}</li>
                                @endforeach
                            </ul>
                        @else
                            Nessuna sponsorship
                        @endif

                </tr>
            </tbody>
        </table>
    </div>
@endsection
