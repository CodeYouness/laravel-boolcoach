@extends('layouts.app')
@section('page-title')
Boolcoach
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registration-form">
                        @csrf

                        {{-- ! NAME INPUT --}}
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">{{ __('Name') }} <span title="Campo obbligatorio">*</span></label>

                            <div class="col-md-9">
                                <input id="registration-form-name" type="text" class="form-control @error('name') is-invalid @enderror" minlength="3" maxlength="20" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                            <label for="surname" class="col-md-2 col-form-label text-md-end">{{ __('Surname') }} <span title="Campo obbligatorio">*</span></label>

                            <div class="col-md-9">
                                <input id="registration-form-surname" type="text" class="form-control @error('surname') is-invalid @enderror" minlength="3" maxlength="20" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
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
                            <label for="nickname" class="col-md-2 col-form-label text-md-end">{{ __('Nickname') }} <span title="Campo obbligatorio">*</span></label>

                            <div class="col-md-9">
                                <input id="registration-form-nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" minlength="3" maxlength="20" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus>
                                <span class="error" id="registration-form-nickname-error"></span>

                                @error('nickname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ! PRICE INPUT --}}
                        <div class="row mb-3">
                            <label for="price" class="col-md-2 col-form-label text-md-end">{{ __('Price') }}  <span title="Campo obbligatorio">*</span></label>

                            <div class="col-md-9">
                                <input id="registration-form-price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
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
                            <label for="language" class="col-md-2 col-form-label text-md-end">{{ __('Language') }}  <span title="Campo obbligatorio">*</span></label>

                            <div class="col-md-9">
                                <input id="registration-form-language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}" required autocomplete="language" autofocus>
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
                            <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('Email Address') }} <span title="Campo obbligatorio">*</span></label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ! GAME INPUT --}}
                        <div class="row mb-3 align-items-center">
                            <label for="game" class="col-md-2 col-form-label text-md-end align-item-center">{{ __('Games') }}</label>
                            <div class="form-group col-md-9">
                                <div class="btn-group d-flex" role="group" aria-label="Basic checkbox toggle button group">
                                    @foreach ($games as $game)
                                    <input name="games[]" type="checkbox" class="btn-check" id="selected-check-{{ $game->id }}" value="{{ $game->id }}">
                                    <label class="btn btn-outline-danger p-1 mx-1 rounded" for="selected-check-{{ $game->id }}">{{ $game->name }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- ! PASSWORD INPUT --}}
                        <div class="row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-end">{{ __('Password') }} <span title="Campo obbligatorio">*</span></label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="error" id="password-error"></span>
                            </div>
                        </div>

                        {{-- ! CONFIRM PASSWORD INPUT --}}
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-end">{{ __('Confirm Password') }} <span title="Campo obbligatorio">*</span></label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span class="error" id="password-confirm-error"></span>
                            </div>
                        </div>

                        {{-- ! SUBMIT INPUT --}}
                        <div class="row mb-0">
                            <div class="col-md-9 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registration-form').addEventListener('submit', function(event) {

        //! GESTISCE GLI ERRORI DELLE PASSWORD
        document.getElementById('password-error').textContent = '';
        document.getElementById('password-confirm-error').textContent = '';

        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password-confirm').value;

        if (password !== confirmPassword) {
            console.log('password non coincide')
            event.preventDefault();
            document.getElementById('password-confirm-error').textContent = 'Le password non coincidono.';
            document.getElementById('password').classList.add('is-invalid');
            document.getElementById('password-confirm').classList.add('is-invalid');
        } else {
            document.getElementById('password').classList.remove('is-invalid');
            document.getElementById('password-confirm').classList.remove('is-invalid');
        }
    });
</script>
@endsection
