@section('content')

<section class="spacing">
    <div class="data-card p-4 my-5"> 

        <h1 class="text-center py-3">
            @if (Route::is('admin.dishes.create')) Aggiungi nuovo piatto
            @else Modifica {{$dish->name}} @endif 
        </h1>

        {{-- Impostazioni del form --}}
        @if ($dish->exists)

            {{-- Data di Alpine --}}
            <div x-data="alpine_validation_form_dish">
                <form @submit="validateForm" action="{{ route('admin.dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data" id="form-update" novalidate>
                @method('put')
        @else

            {{-- Data di Alpine --}}
            <div x-data="alpine_validation_form_dish">
                <form @submit="validateForm" action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data" id="form-create" novalidate>
        @endif
    
                    {{-- TOKEN csrf --}}
                    @csrf
                    <div class="row align-items-center">

                        {{-- INPUT AVAILABILITY --}}
                        @if (!$dish->deleted_at)
                            
                            <div class="col-12 mb-3">
                                <div class="form-check form-switch d-flex p-0">
                                    <label class="form-check-label mb-2 ms-3" for="availability">Status articolo</label>
                                    <div class="ms-5">
                                        <label class="form-check-label" id="availability-label" for="availability"></label>
                                        <input class="form-check-input" type="checkbox" role="switch" id="availability" 
                                        name="availability"
                                        @if(old('availability', $dish->availability) == 1) checked @endif
                                        >
                                    </div>
                                </div> 
                            </div>

                        @endif
        
                        {{-- INPUT NOME DEL PIATTO --}}
                        <div class="col-12 mb-3">
                            <label class="form-label label ms-3 mt-1" for="name">
                                Nome del piatto 
                                <span class="text-danger"><strong><sup>*</sup></strong></span>
                            </label>
                            <input 
                                type="text"
                                @blur="name.validation()" 
                                x-model="name.value"
                                id="name" 
                                name="name"
                                :class="{ 'is-invalid': name.error, 'is-valid': name.isValid }" 
                                class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('name') is-invalid @elseif(old('name')) is-valid @enderror" 
                                value="{{ old('name', $dish->name) }}" 
                                placeholder="Inserisci titolo..."
                            >
                            <span x-text="name.message" class="invalid-message invalid-feedback ms-3"></span>
                            @error('name')
                                <div class="invalid-feedback ms-3">
                                    {{ $message }}
                                </div>   
                            @else        
                                <div class="valid-feedback ms-3">
                                    Campo corretto
                                </div>      
                            @enderror       
                        </div>
        
        
                        {{-- SELECT DIET --}}
                        <div class="col-6 mb-3 ">
                            <label class="form-label label ms-3 mt-3" for="diet">Dieta</label>
                            <select @blur="diet.validation()" x-model="diet.value" :class="{ 'is-invalid': diet.error, 'is-valid': diet.isValid }" class="form-select bg-transparent border-dark-light rounded-pill" name="diet" id="diet">
                                <option 
                                    value="" {{ old('diet', $dish->diet) ? '' : 'selected' }}>Scegli un'opzione (facoltativo)
                                </option>
                                @foreach ($diet_options as $option)
                                    <option value="{{ $option }}" {{ old('diet', $dish->diet) === $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>     
                        </div>
        
                        {{-- SELECT COURSE --}}
                        <div class="mb-3 col-6">
                            <label class="form-label label ms-3 mt-3" for="course">
                                Portata
                                <span class="text-danger"><strong><sup>*</sup></strong></span>
                            </label>
                            <select @blur="course.validation()" x-model="course.value" :class="{ 'is-invalid': course.error, 'is-valid': course.isValid }" class="form-select bg-transparent border-dark-light rounded-pill"  name="course" id="course" >
        
                                <option 
                                    value="" {{ old('course', $dish->course) ? '' : 'selected' }}>Scegli un'opzione (Obbligatorio)
                                </option>
                                @foreach ($course_options as $option)
                                    <option value="{{ $option }}" {{ old('course', $dish->course) === $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach

                            </select>      
                        </div>

                        {{-- INPUT GROUP INGREDIENTS --}}
                        <div class="col-12">
                            <label class="form-label label ms-3 mt-3" for="ingredients">Ingredienti</label>
                            <input 
                                type="text" 
                                id="ingredients" 
                                name="ingredients" 
                                class="me-2 mb-2 form-control bg-transparent border-dark-light rounded-pill" 
                                value="{{ old('ingredients', $dish->ingredients) }}" 
                                placeholder="Inserisci la lista di ingredienti..."
                            >
                        </div>
        
                        {{-- INPUT GROUP PRICE --}}
                        <div class="mb-3 col-6 col-md-4 col-xl-5">
                            <label class="form-label label ms-3" for="price">
                                Prezzo piatto
                                <span class="text-danger"><strong><sup>*</sup></strong></span>
                            </label>
                            <input @blur="price.validation()" x-model="price.value" type="number" name="price" id="price" step="0.1" min="0" :class="{ 'is-invalid': price.error, 'is-valid': price.isValid }" class="form-inputs form-control bg-transparent border-dark-light rounded-pill @error('price') is-invalid @elseif(old('price')) is-valid @enderror"
                            value="{{ old('price', $dish->price) }}">
                            <span x-text="price.message" class="invalid-message invalid-feedback ms-3"></span>
                            @error('price')
                                <div class="invalid-feedback ms-3">
                                    {{ $message }}
                                </div>        
                            @enderror     
                        </div>
        
                        {{-- INPUT IMMAGINE --}}
                        <div class="col-6 col-md-5 col-xl-5 mb-3">
                            <div class="d-flex flex-column">
                                <label class="form-label label ms-3">Upload Immagine</label>
                                <input type="file" name="image" id="uploadBtn" class="form-control bg-transparent border-dark-light rounded-pill @error('image') is-invalid @elseif(old('image')) is-valid @enderror">
                                <label for="uploadBtn" role="button" id="upload-label" class="btn border-light-subtle rounded-pill">Carica un'immagine</label>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>   
                                @else        
                                    <div class="valid-feedback">
                                        Campo corretto
                                    </div>      
                                @enderror       
                            </div>
                        </div>

                        {{-- CAMPO PREVIEW IMAGE --}}
                        <div class="col-md-3 col-xl-2 align-items-center justify-content-center d-none d-md-flex">
                            <img id="preview" src="{{ old('image', $dish->image)
                            ? asset('storage/' . old('image', $dish->image)) 
                            : 'https://www.altavod.com/assets/images/poster-placeholder.png'}}" 
                            alt="{{ $dish->slug }}" class="img-fluid">
                        </div>

                        <p class="asterisk my-2 text-center">I campi contrassegnati con <span class="text-danger"><strong><sup>*</sup></strong></span> sono obbligatori</p>

                        {{-- Bottoni --}}
                        <div class="col-12 d-flex justify-content-between pt-2">
                            <a href="{{route('admin.dishes.index')}}" class="data-btn d-flex green rounded-pill gray fw-semibold ms-1 px-4 px-sm-3 py-2"><i class="fa-solid fa-left-long me-sm-2"></i><span class="d-none d-sm-inline">Torna indietro</span></a>
                            <div class="d-flex">
                                <button class="data-btn d-flex align-items-center rounded-pill green fw-semibold ms-1 px-4 px-sm-3 py-2" type="submit"><i class="fa-solid fa-floppy-disk me-sm-2"></i><span class="d-none d-sm-inline">Salva</span></button>
                                <button class="data-btn d-flex align-items-center rounded-pill red fw-semibold ms-1 px-4 px-sm-3 py-2" type="reset"><i class="fa-solid fa-arrows-rotate me-sm-2"></i><span class="d-none d-sm-inline">Svuota</span></button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
    </div>
            
</section>    
    
@endsection
    
@section('scripts')
<script>

    // Label di availability dinamico
    const availability = document.getElementById('availability')
    if (availability) {
        availability.addEventListener('change', function() {
            const label = document.getElementById('availability-label');
            const input = document.getElementById('availability');
            
            if (input.checked) {
                label.textContent = 'disponibile';
            } else {
                label.textContent = 'non disponibile';
            }
        });
    }

    // setto la visualizzazione dinamica dell'immagine in pagina
    const imageField = document.getElementById('uploadBtn');
    const previewField = document.getElementById('preview');

    let blobUrl;

    imageField.addEventListener('change', () => {

        // controllo se ho il file
        if (imageField.files && imageField.files[0]){
            
            //prendo il file
            const file = imageField.files[0];

            //preparo l'url
            blobUrl = URL.createObjectURL(file);

            previewField.src = blobUrl;
        }
    })

    window.addEventListener('beforeunload', ()=> {
        if(blobUrl) URL.revokeObjectURL(blobUrl);
    }) 

// Recupero i valori delle select
const dietOptions = @json($diet_options);
const courseOptions = @json($course_options);

// Recupero il singolo piatto
const dish = @json($dish);

</script>
@endsection
