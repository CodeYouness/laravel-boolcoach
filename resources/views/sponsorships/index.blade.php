@extends('layouts.users')
@section('page-title')
    Reviews
@endsection
@section('main-content')
    <div class="container">
        <h3 class="text-center">{{ $user->name }}</h3>
        <table class="table table-striped table-hover text-center">
            <thead class="table-info">
                <tr>
                    <th>Piano</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @foreach($user->sponsorships as $sponsorship)
                                    <td>{{ $sponsorship->name }}</td>
                                    <td>{{ $sponsorship->pivot->start_date }}</td>
                                    <td>{{ $sponsorship->pivot->end_date }}</td>
                                @endforeach

                        @if($user->sponsorships->isNotEmpty())
                            <ul>

                            </ul>
                        @else
                            Nessuna sponsorship
                        @endif

                </tr>
            </tbody>
        </table>
    </div>
@endsection
