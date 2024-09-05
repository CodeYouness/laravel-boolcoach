@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome back</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-unstyled">
                        <li>
                            <a href="{{route('reviews.index')}}" class="text-decoration-none text-black">Check reviews</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none text-black">Check sponsorships</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
