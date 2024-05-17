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
                        {{-- inserisco i data --}}
                        <div x-data=
                        "{ 
                            isValid: false,
                            regex: /\d/,

                            {{-- Data del Nome del Ristorante --}}
                            restaurantName: '',
                            restaurantNameMessage: '',
                            restaurantNameError: false,
                            isRestaruantNameValid: false,

                            {{-- Data del Nome dell'utente --}}
                            name: '',
                            nameMessage: '',
                            nameError: false,
                            isNameValid: false,

                            {{-- Data del Cognome dell'utente --}}
                            lastname: '',
                            lastnameMessage: '',
                            lastnameError: false,
                            isLastnameValid: false,

                            {{-- Validazione Nome del ristorante --}}
                            restaurantNameValidation() {
                                this.isRestaruantNameValid = true;
                                if (!this.restaurantName) {
                                    this.restaurantNameMessage = 'Il campo è obbligatorio';
                                    this.restaurantNameError = true;
                                } else if (this.restaurantName.length < 5 && this.restaurantName.length >= 1) {
                                    this.restaurantNameMessage = 'Il nome del ristorante deve avere più di 5 caratteri';
                                    this.restaurantNameError = true;
                                } else if (!isNaN(this.restaurantName) && this.restaurantName.length >= 1) {
                                    this.restaurantNameMessage = 'Il nome del ristorante non può avere solo numeri';
                                    this.restaurantNameError = true;
                                } else {
                                    this.restaurantNameError = false;
                                    this.restaurantNameMessage = '';
                                }
                            },

                            {{-- Validazione Nome dell'utente --}}
                            nameValidation() {
                                this.isNameValid = true;
                                if (!this.name) {
                                    this.nameMessage = 'Il campo è obbligatorio';
                                    this.nameError = true;
                                } else if (this.name.length < 2 && this.name.length >= 1) {
                                    this.nameMessage = 'Il nome deve avere più di 2 caratteri';
                                    this.nameError = true;
                                } else if (this.regex.test(this.name) && this.name.length >= 1) {
                                    this.nameMessage = 'Il nome non può contenere numeri';
                                    this.nameError = true;
                                } else {
                                    this.nameError = false;
                                    this.nameMessage = '';
                                }
                            },

                            {{-- Validazione Cognome dell'utente --}}
                            lastnameValidation() {
                                this.isLastnameValid = true;
                                if (!this.lastname) {
                                    this.lastnameMessage = 'Il campo è obbligatorio';
                                    this.lastnameError = true;
                                } else if (this.lastname.length < 2 && this.lastname.length >= 1) {
                                    this.lastnameMessage = 'Il cognome deve avere più di 2 caratteri';
                                    this.lastnameError = true;
                                } else if (this.regex.test(this.lastname) && this.lastname.length >= 1) {
                                    this.lastnameMessage = 'Il cognome non può contenere numeri';
                                    this.lastnameError = true;
                                } else {
                                    this.lastnameError = false;
                                    this.lastnameMessage = '';
                                }
                            }
                            
                        
                        }">
                            <form @submit.prevent="!isValid" method="POST" action="{{ route('register') }}" id="registration-form" novalidate>
                                @csrf
                                <h2 class="mb-5">Registrazione</h2>
                                <div class="mb-4 row">
    
                                    {{-- Nome del ristorante--}}
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                                        <label for="restaurant_name" class="mb-2 ms-3">
                                            Nome ristorante
                                            <span class="text-danger"><strong><sup>*</sup></strong></span>
                                        </label>
                                        <input @blur="restaurantNameValidation" x-model="restaurantName" placeholder="Nome del ristorante" id="restaurant_name" type="text" :class="restaurantNameError ? 'is-invalid' : '' && !restaurantNameError || isRestaruantNameValid ? 'is-valid' : '' " class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{old('restaurant_name')}}" required autocomplete="restaurant_name" autofocus>
                                        <span x-text="restaurantNameMessage" class="invalid-message invalid-feedback ms-3"></span>
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
                                        <input @blur="nameValidation" x-model="name" placeholder="Nome del ristoratore" id="name" type="text" :class="nameError ? 'is-invalid' : '' && !nameError || isNameValid ? 'is-valid' : ''" class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" pattern="[A-Za-z]+" autofocus>
                                        <span x-text="nameMessage" class="invalid-message invalid-feedback ms-3"></span>
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
                                        <input @blur="lastnameValidation" x-model="lastname" placeholder="Cognome ristoratore" id="lastname" type="text" :class="lastnameError ? 'is-invalid' : '' && !lastnameError || isLastnameValid ? 'is-valid' : ''" class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('lastname') is-invalid @enderror"
                                        name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                        <span x-text="lastnameMessage" class="invalid-message invalid-feedback ms-3"></span>
        
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
</div>
@endsection

{{-- @section('scripts')
    <script>
        const vats = @json($vats);
        const emails = @json($emails);
    </script>

    @vite('resources/js/validation_register_form.js')
@endsection --}}