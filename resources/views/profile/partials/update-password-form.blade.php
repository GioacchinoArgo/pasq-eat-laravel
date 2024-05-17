<section>
    <header>
        <h2 class="ms-3 text-lg font-medium text-gray-900">
            {{ __('Aggiorna la password') }}
        </h2>

        <p class="ms-3 mt-1 text-sm text-gray-600">
            {{ __('Assicurati che il tuo account utilizzi una password lunga e casuale per garantire la sicurezza.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label class="text-black mb-2 ms-3 fw-semibold" for="current_password">{{__('Password attuale')}}</label>
            <input class="mt-1 form-control bg-transparent border-dark-light rounded-pill px-3" type="password" name="current_password" id="current_password" autocomplete="current-password">
            @error('current_password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-black mb-2 ms-3 fw-semibold" for="password">{{__('Nuova password')}}</label>
            <input class="mt-1 form-control bg-transparent border-dark-light rounded-pill" type="password" name="password" id="password" autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password')}}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-4">

            <label class="text-black mb-2 ms-3 fw-semibold" for="password_confirmation">{{__('Conferma password')}}</label>
            <input class="mt-2 form-control bg-transparent border-dark-light rounded-pill" type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password">
            @error('password_confirmation')
            <span class="invalid-feedback mt-2" role="alert">
                <strong>{{ $errors->updatePassword->get('password_confirmation')}}</strong>
            </span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn-outline blue ms-1 px-3 py-1 rounded-pill">{{ __('Salva') }}</button>

            @if (session('status') === 'password-updated')
            <script>
                const show = true;
                setTimeout(() => show = false, 2000)
                const el = document.getElementById('status')
                if (show) {
                    el.style.display = 'block';
                }
            </script>
            <p id='status' class=" fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
