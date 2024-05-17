<section class="space-y-6">
    <header>
        <h2 class="ms-3 text-lg font-medium text-gray-900">
            {{ __('Elimina Account') }}
        </h2>

        <p class="ms-3 mt-1 text-sm text-gray-600">
            {{ __('Una volta che il tuo account sarà eliminato, tutte le risorse e i dati ad esso associati verranno cancellati in modo permanente. Prima di procedere con l\'eliminazione del tuo account, ti invitiamo a scaricare tutti i dati o le informazioni che desideri conservare.') }}
        </p>
    </header>

    <!-- Modal trigger button -->
    <button type="button" class="btn-outline-delete red ms-1 px-3 py-1 rounded-pill" data-bs-toggle="modal" data-bs-target="#delete-account">
        {{__('Cancella account')}}
    </button>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="delete-account" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="delete-account" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div id="glass-modal" class="modal-content p-4">
                <div class="d-flex justify-content-between align-items-center ms-3">
                    <h5 class="modal-title" id="delete-account">Elimina Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-lg font-medium text-gray-900 mb-3">
                        {{ __('Sei sicuro/a di volere eliminare il tuo account?') }}
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        {{ __('Dopo l\'eliminazione dell\'account, tutte le sue risorse e dati saranno cancellati in modo permanente. Ti preghiamo di inserire la password per confermare definitivamente l\'eliminazione dell\'account.') }}
                    </p>
                </div>
                <div class="d-flex justify-content-between align-items-center ms-3">
                    <button type="button" class="btn-outline-index text-white fw-semibold gray ms-1 px-3 py-2 rounded-pill d-flex align-items-center fw-semibold" data-bs-dismiss="modal">Torna indietro</button>

                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')


                        <div class="input-group">

                            <input id="password" name="password" type="password" class="form-control me-2 bg-transparent border-dark-light rounded-pill" placeholder="{{ __('Password') }}" />

                            @error('password')
                            <span class="invalid-feedback mt-2" role="alert">
                                <strong>{{ $errors->userDeletion->get('password')}}</strong>
                            </span>
                            @enderror



                            <button type="submit" class="btn-outline-index text-white fw-semibold red ms-1 px-3 py-2 rounded-pill">
                                {{ __('Elimina Account') }}
                            </button>
                            <!--  -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>
