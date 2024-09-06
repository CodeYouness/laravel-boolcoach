@extends('layouts.users')
@section('page-title')
    Edit {{ $user->name }}
@endsection
@section('main-content')
    <div class="container-fuild">
        <div class="row justify-content-center">
            <h1 class="text-center">Edit {{ $user->name }}</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.update', $user) }}" method="POST" class="col-6">
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

{{--                 <div class="form-group">
                    <label for="type_id">Type:</label>
                    <select class="form-select" aria-label="Default select example" name="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

    {{--                <div class="form-group">
                    <label class="d-block" for="technology">Tech:</label>
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        @foreach ($technologies as $technology)
                        <input name="technologies[]" type="checkbox" class="btn-check" id="selected-check-{{ $technology->id }}" value="{{ $technology->id }}">
                        <label class="btn btn-outline-primary" for="selected-check-{{ $technology->id }}">{{ $technology->name }}</label>

                        @endforeach


                    </div>
                </div> --}}

                <div class="form-group">
                    <label for="img_url">URL Immagine:</label>
                    <input class="form-control" type="img_url" id="img_url" name="img_url"
                        value="{{ old('url', $user->img_url) }}">
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
