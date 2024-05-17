@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mt-4">
    <div class="glass-card spacing px-4 py-4">
        <div class="row">
            <div class="col-12">
                <div class="text-center text-m text-lg-start">
                    <div class="card-body">
                        @if($errors)
                        <!--Alert-->
                        <div id="error-bag" class="alert alert-danger d-none" role="alert">
                            <ul id="error-list">    
                            </ul>
                          </div>    
                        @endif
                        <form method="POST" action="{{ route('register') }}" id="registration-form" novalidate>
                            @csrf
                            <h2 class="mb-5">Registrazione</h2>
                            <div class="mb-4 row">

                                {{-- Nome del ristorante--}}
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <label for="restaurant_name" class="mb-2 ms-3">
                                        Nome ristorante
                                        <span class="text-danger"><strong><sup>*</sup></strong></span>
                                    </label>
                                    <input placeholder="Nome del ristorante" id="restaurant_name" type="text" class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{old('restaurant_name')}}" required autocomplete="restaurant_name" autofocus>
                                    <span class="invalid-message invalid-feedback ms-3"></span>
                                    @error('restaurant_name')
                                        <span class="invalid-feedback mx-3" role="alert">
                                            <strong>{{ $message }}</strong> 
                                        </span>
                                    @enderror
                                </div>
                                
                                {{-- Nome del ristoratore --}}
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <label for="name" class="mb-2 ms-3">
                                        Nome ristoratore
                                        <span class="text-danger"><strong><sup>*</sup></strong></span>
                                    </label>
                                    <input placeholder="Nome del ristoratore" id="name" type="text" class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" pattern="[A-Za-z]+" autofocus>
                                    <span class="invalid-message invalid-feedback ms-3"></span>
                                    @error('name')
                                        <span class="invalid-feedback mx-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Cognome --}}
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <label for="lastname" class="mb-2 ms-3">
                                        Cognome Ristoratore
                                        <span class="text-danger"><strong><sup>*</sup></strong></span>
                                    </label>
                                    <input placeholder="Cognome ristoratore" id="lastname" type="text" class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('lastname') is-invalid @enderror"
                                    name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                    <span class="invalid-message invalid-feedback ms-3"></span>
    
                                    @error('lastname')
                                        <span class="invalid-feedback mx-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <label for="email" class="mb-2 ms-3">
                                        Email
                                        <span class="text-danger"><strong><sup>*</sup></strong></span>
                                    </label>
                                    <input placeholder="es: name@example.com" id="email" type="email" class="form-inputs form-control bg-transparent border-dark-light rounded-pill 
                                    @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                    minlength="6">
                                    <span class="invalid-message invalid-feedback ms-3"></span>
    
                                    @error('email')
                                        <span class="invalid-feedback mx-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <label for="password" class="mb-2 ms-3">
                                        {{ __('Password') }}
                                        <span class="text-danger"><strong><sup>*</sup></strong></span>
                                    </label>
                                    <input placeholder="Inserisci la password" id="password" type="password" class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <span class="invalid-message invalid-feedback ms-3"></span>
    
                                    @error('password')
                                        <span class="invalid-feedback mx-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- Conferma Password --}}
                                
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <label for="password-confirm" class="mb-2 ms-3">
                                        Conferma Password
                                        <span class="text-danger"><strong><sup>*</sup></strong></span>
                                    </label>
                                    <input placeholder="Conferma la password" id="password-confirm" type="password" class="form-inputs form-control bg-transparent border-dark-light rounded-pill" name="password_confirmation" required autocomplete="new-password">
                                    <span class="invalid-message invalid-feedback ms-3"></span>
                                    @error('address')   
                                        <div class="invalid-feedback mx-3">
                                            <strong>{{$message}}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{-- Input Indirizzo --}}
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <label for="address" class="mb-2 ms-3">
                                        Indirizzo
                                        <span class="text-danger"><strong><sup>*</sup></strong></span>
                                    </label>
                                    <input placeholder="es: Via Pippo de Ciccios 7" name="address" value="{{old('address')}}" type="text" class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('address') is-invalid @elseif(old('address', '')) is-valid @enderror" id="address">
                                    <span class="invalid-message invalid-feedback ms-3"></span>
                                        @error('address')   
                                            <div class="invalid-feedback mx-3">
                                                <strong>{{$message}}</strong>
                                            </div>
                                        @enderror
                                </div>

                                {{-- Input Numero di telefono --}}
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                    <label for="phone" class="mb-2 ms-3">Numero di telefono</label>
                                    <input placeholder="es: +39 3123456789" name="phone" value="{{old('phone', '')}}" type="text" class="form-control bg-transparent border-dark-light rounded-pill @error('phone') is-invalid @elseif(old('phone', '')) is-valid @enderror" id="phone">
                                        @error('phone')   
                                            <div class="invalid-feedback mx-3">
                                                <strong>{{$message}}</strong>
                                            </div>
                                        @enderror
                                </div>

                                {{-- Input P.IVA (VAT) --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 mb-4">
                                    <label for="vat" class="mb-2 ms-3">
                                        P.IVA
                                        <span class="text-danger"><strong><sup>*</sup></strong></span>
                                    </label>
                                    <input placeholder="es: IT12345678901" name="vat" value="{{old('vat')}}" type="text"
                                    class="form-inputs form-control bg-transparent border-dark-light rounded-pill
                                     @error('vat') is-invalid @elseif(old('vat', '')) is-valid @enderror" id="vat" minlength="11">
                                     <span class="invalid-message invalid-feedback ms-3"></span>
                                        @error('vat')   
                                            <div class="invalid-feedback mx-3">
                                                <strong>{{$message}}</strong>
                                            </div>
                                        @enderror
                                </div>

                                <div class="col-12 text-center">
                                    <p class="mb-3 text-center">Categorie<span class="text-danger ms-2"><strong><sup>*</sup></strong></span> </p>
                                    {{-- Foreach delle categorie --}}
                                    @foreach ($categories as $category)
                                        <div class="form-check form-check-inline me-2">
                                            <label class="form-check-label" for="category-{{$category->id}}">{{$category->label}}</label>
                                            <input class="form-check-input" type="checkbox" id="category-{{$category->id}}" value="{{$category->id}}" name="categories[]" @if (in_array($category->id, old('categories', $prev_categories ?? []))) checked @endif>
                                        </div>
                                    @endforeach
                                    <div id="text-checkbox" class="text-danger d-none mt-4"></div>
                                </div>
                            </div>
                            <p class="asterisk mb-3 text-center me-3">I campi contrassegnati con <span class="text-danger"><strong><sup>*</sup></strong></span> sono obbligatori</p>
                        
                            {{-- Bottoni --}}
                            <div class="mb-4 row mb-0">
                                <div class="col-md-12 text-center">
                                    
                                    {{-- Bottone registrazione --}}
                                    <button type="submit" class="btn-outline-index text-white fw-semibold green ms-1 px-3 py-2 rounded-pill align-items-center text-white fw-semibold me-2">
                                        <i class="fa-solid fa-floppy-disk me-2"></i>Registrati
                                    </button>
                                    
                                    {{-- Bottone reset --}}
                                    <button type="reset" class="btn-outline-index text-white fw-semibold yellow ms-1 px-3 py-2 rounded-pill align-items-center text-white fw-semibold me-3">
                                        <i class="fa-solid fa-arrows-rotate me-2"></i>Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        const vats = @json($vats);
        const emails = @json($emails);
    </script>

    @vite('resources/js/validation_register_form.js')
@endsection