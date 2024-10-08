@extends('layouts.users')
@section('page-title')
    Edita {{ $user->nickname }}
@endsection
@section('main-content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edita {{ $user->nickname }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data" id="registration-form">
                            @csrf
                            @method('PUT')

                            {{-- ! NAME INPUT --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Nome') }}</label>

                                <div class="col-md-9">
                                    <input id="registration-form-name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" minlength="3"
                                        maxlength="20" name="name" value="{{ old('name', $user->name) }}" required
                                        autocomplete="name" autofocus>
                                    <span class="error" id="registration-form-name-error"></span>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert" id="">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ! SURNAME INPUT --}}
                            <div class="row mb-3">
                                <label for="surname"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Cognome') }}</label>

                                <div class="col-md-9">
                                    <input id="registration-form-surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" minlength="3"
                                        maxlength="20" name="surname" value="{{ old('surname', $user->surname) }}" required
                                        autocomplete="surname" autofocus>
                                    <span class="error" id="registration-form-surname-error"></span>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ! NICKNAME INPUT --}}
                            <div class="row mb-3">
                                <label for="nickname"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Nickname') }}</label>

                                <div class="col-md-9">
                                    <input id="registration-form-nickname" type="text"
                                        class="form-control @error('nickname') is-invalid @enderror" name="nickname"
                                        minlength="3" maxlength="20" value="{{ old('nickname', $user->nickname) }}"
                                        required autocomplete="nickname" autofocus>
                                    <span class="error" id="registration-form-nickname-error"></span>

                                    @error('nickname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- ! PICTURE --}}
                            <div class="row mb-3 ">
                                <label for="img_url" class="col-md-2 col-form-label text-md-end">Immagine</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="file" id="img_url" name="img_url">
                                </div>
                            </div>

                            {{-- ! PRICE INPUT --}}
                            <div class="row mb-3">
                                <label for="price" class="col-md-2 col-form-label text-md-end">{{ __('Prezzo') }}</label>
                                <div class="col-md-9">
                                    <input id="registration-form-price" type="text"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ old('price', $user->price) }}" required autocomplete="price" autofocus>
                                    <span class="error" id="registration-form-price-error"></span>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ! LANGUAGE INPUT --}}
                            <div class="row mb-3">
                                <label for="language"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Lingua') }}</label>

                                <div class="col-md-9">
                                    <input id="registration-form-language" type="text"
                                        class="form-control @error('language') is-invalid @enderror" name="language"
                                        value="{{ old('language', $user->language) }}" required autocomplete="language"
                                        autofocus>
                                    <span class="error" id="registration-form-language-error"></span>

                                    @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ! EMAIL INPUT --}}
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-2 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-9">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email) }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ! GAME INPUT --}}
                            <div class="row mb-3 align-items-center">
                                <label for="game"
                                    class="col-md-2 col-form-label text-md-end align-item-center">{{ __('Giochi') }}</label>
                                <div class="form-group col-md-9">
                                    <div class="btn-group d-flex" role="group"
                                        aria-label="Basic checkbox toggle button group">
                                        @foreach ($games as $game)
                                            <input name="games[]" type="checkbox" class="btn-check"
                                                id="selected-check-{{ $game->id }}" value="{{ $game->id }}"
                                                @checked($user->games->contains($game->id))
                                                >
                                            <label class="btn btn-outline-danger p-1 mx-1"
                                                for="selected-check-{{ $game->id }}">{{ $game->name }}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{-- ! SUMMARY --}}
                            <div class="row mb-3">
                                <label for="summary" class="col-md-2 col-form-label text-md-end">{{ __('Sommario') }}</label>
                                <div class="col-md-9">
                                    <textarea id="summary" class="form-control text-white @error('summary') is-invalid @enderror" name="summary"
                                            autocomplete="summary" rows="5"
                                            placeholder="Tell us more about yourself">{{ old('summary', $user->summary) }}</textarea>
                                    @error('summary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ! SUBMIT INPUT --}}
                            <div class="row mb-0">
                                <div class="col-md-9 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edita') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
@vite(['resources/js/edit_form_validation.js'])
@endsection
