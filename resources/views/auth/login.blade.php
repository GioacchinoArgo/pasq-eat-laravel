@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-4">
    <div class="glass-card spacing px-4 py-4">
        <div class="row">
            <div class="col">
                <h1 class="text-center pb-4">{{ __('Accedi') }}</h1>
                <form novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4 row">
                        <label for="email" class="col-12 col-sm-3 col-md-3 col-lg-3  col-form-label text-md-right text-center">{{ __('E-Mail') }}</label>

                        <div class="col-12 col-sm-8 col-md-7 col-lg-8">
                            <input id="email" type="email" class="form-control bg-transparent border-dark-light rounded-pill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="ms-2 invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">   
                        <label for="password" class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label text-center">{{ __('Password') }}</label>
                        <div class="col-12 col-sm-8 col-md-7 col-lg-8">
                            <input id="password" type="password" class="form-control bg-transparent border-dark-light rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label " for="remember">
                                    {{ __('Ricordami') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <button type="submit" class="data-btn green">
                                {{ __('Accedi') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Password Dimenticata?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
