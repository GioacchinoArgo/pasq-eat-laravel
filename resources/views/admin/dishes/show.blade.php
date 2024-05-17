@extends('layouts.app')

@section('title', $dish->name)

@section('content')
<section class="p-3 my-5">
    <div class="glass-card spacing w-75 px-4 pb-4 card-color">    
        <div class="card-header pt-3 pb-4">
            <div class="col">
                <h1 class="card-title text-center">{{$dish->name}}</h1>
            </div>
        </div>
        <div class="card-body row position-relative d-flex align-items-center"> 
            
            {{-- IMMAGINE --}}
            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-12">
                <picture class="show-picture text-center">
                    @if ($dish->image)
                        <img src="{{asset('storage/' . $dish->image)}}" alt="foto-{{$dish->slug}}" class="img-fluid rounded">
                    @else
                        <img src="{{asset('/images/default-dish.png')}}" alt="" class="img-fluid rounded">
                    @endif
                </picture>
            </div>

            {{-- INFO PIATTO --}}
            <div class="col-sm-12 col-md-6 col-lg-9 col-xl-9 col-12 d-flex"> 
                <div class="info-dishes">
                    <div class="mb-3 mt-3">
                        L'articolo è
                        <span class="{{$dish->availability ? 'available' : 'text-disabled'}}">
                            <strong>
                                {{$dish->availability ? 'disponibile' : 'impostato come bozza'}}
                            </strong>
                        </span>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="mb-3">
                            @if ($dish->course)
                                <span class="tag bg-course px-2 py-1 text-center">{{$dish->course}}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            @if ($dish->diet)
                            <span class="tag bg-yellow px-2 py-1 text-center">{{$dish->diet}}</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        Ingredienti:
                        <span>{{$dish->ingredients}}</span>
                    </div>
                    <div>
                        Prezzo: € <span>{{$dish->price}}</span>
                    </div>
                </div>
                {{-- BOTTONI di CRUD --}}
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-12 justify-content-center">
                <div class="button-group">
                    <div class="gap-2 mt-4 d-flex align-items-center justify-content-between justify-content-md-between">
                        {{--# TORNA INDIETRO --}}
                        <a href="{{route('admin.dishes.index')}}" class="btn-outline-index text-white fw-semibold gray ms-1 px-3 py-2 rounded-pill d-flex align-items-center text-white fw-semibold">
                            <i class="fa-solid fa-left-long"></i>
                            <span class="d-none ms-2 d-lg-block">Torna indietro</span>
                        </a>
                        <div class="d-flex gap-2 justify-content-md-end">
                            {{--# EDIT --}}
                            <a href="{{ route('admin.dishes.edit', $dish->id)}}" class="btn-outline-index text-white fw-semibold yellow ms-1 px-3 py-2 rounded-pill d-flex align-items-center edit">
                                <i class="fas fa-pencil"></i>
                                <span class="d-none ms-2 d-lg-block">Modifica</span>
                            </a>
                            {{--# DESTROY --}}
                            <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" id="delete-form">
                                @csrf
                                @method('DELETE')
                                <button class="btn-outline-index text-white fw-semibold red ms-1 px-3 py-2 rounded-pill d-flex align-items-center text-center">
                                    <i class="far fa-trash-can"></i>
                                    <span class="d-none ms-2 d-lg-block">Elimina</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection