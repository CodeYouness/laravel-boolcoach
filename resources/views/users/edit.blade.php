@extends('layouts.users')
@section('page-title')
    Edit {{ $user->name }}
@endsection
@section('main-content')
    <div class="container-fuild">
        <div class="row justify-content-center">
            <h1 class="text-center text-white">Edit {{ $user->name }}</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.update', $user) }}" method="POST" class="col-6" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name"
                        value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="surname">Surname:</label>
                    <input class="form-control" type="text" id="surname" name="surname"
                        value="{{ old('surname', $user->surname) }}" required>
                </div>

                <div class="form-group">
                    <label for="nickname">Nickname:</label>
                    <input class="form-control" type="text" id="nickname" name="nickname"
                        value="{{ old('nickname', $user->nickname) }}" required>
                </div>

                <div class="form-group">
                    <label for="language">Language:</label>
                    <input class="form-control" type="text" id="language" name="language"
                        value="{{ old('language', $user->language) }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input class="form-control" type="number" id="price" name="price"
                        value="{{ old('price', $user->price) }}" required>
                </div>
{{--
                <div class="form-group">
                    <label for="img_url">URL Immagine:</label>
                    <input class="form-control" type="img_url" id="img_url" name="img_url" value="{{ old('url', $user->img_url) }}">
                </div> --}}

                <div class="form-group">
                    <label for="img_url" class="color-white">URL Immagine DA FILE:</label>
                    <input class="form-control" type="file" id="img_url" name="img_url" value="{{ old('url', $user->img_url) }}">
                </div>

                <div class="form-group mb-3">
                    <label for="summary">Summary:</label>
                    <textarea class="form-control" tech="text-area" id="summary" name="summary" rows="10">{{ old('summary', $user->summary) }}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Edit {{ $user->name }}</button>
                </div>
            </form>

        </div>
    </div>
@endsection
