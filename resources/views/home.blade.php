@extends('layouts.users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Welcome back</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-unstyled mb-0">
                        <li class="mb-3">
                            <a href="{{route('reviews.index')}}" class="text-decoration-none text-black">Check reviews</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{route('sponsorships.index')}}" class="text-decoration-none text-black">Check sponsorships</a>
                        </li>
                        <li>
                            <a href="{{route('messages.index')}}" class="text-decoration-none text-black">Check messages</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
