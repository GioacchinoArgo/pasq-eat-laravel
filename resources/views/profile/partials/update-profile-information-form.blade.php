<section>
    <div>
        
    </div>
    <header>
        <h2 class="ms-3 text-black">
            {{ __('Informazioni del profilo') }}
        </h2>

        <p class="ms-3 mt-1 text-black">
            {{ __("Aggiorna le informazioni del profilo del tuo account e l'indirizzo email.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="text-black mb-2 ms-3 fw-semibold">{{__('Nome')}}</label>
            <input class="form-control bg-transparent border-dark-light rounded-pill px-3" type="text" name="name" id="name" autocomplete="name" value="{{old('name', $user->name)}}" required autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->get('name')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="text-black mb-2 ms-3 fw-semibold">
                {{__('Email') }}
            </label>

            <input id="email" name="email" type="email" class="form-control bg-transparent border-dark-light rounded-pill px-3" value="{{ old('email', $user->email)}}" required autocomplete="username" />

            @error('email')
            <span class="alert alert-danger mt-2" role="alert">
                <strong>{{ $errors->get('email')}}</strong>
            </span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-black">
                    {{ __('Il tuo indirizzo email non è verificato.') }}

                    <button form="send-verification" class="btn btn-outline-dark">
                        {{ __('Clicca qui per inviare nuovamente l\'email di verifica.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-success">
                    {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button class="btn-outline blue ms-1 px-3 py-1 rounded-pill" type="submit">{{ __('Salva') }}</button>

            @if (session('status') === 'profile-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('profile-status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='profile-status' class="fs-5 text-muted mb-0">{{ __('Salvato.') }}</p>
            @endif
        </div>
    </form>
</section>
