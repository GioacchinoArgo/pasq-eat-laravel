@extends('layouts.app')

@section('title', $restaurant->restaurant_name)

@section('content')
    <section id="restaurant-show">
        <div class="data-card spacing p-4">
            <div class="card-header mt-2">
                <h1 class="text-center mb-4">{{$restaurant->restaurant_name}}</h1>
            </div>
            <div class="card-body">
                <div class="row justify-content-around mb-md-4 gap-4 gap-md-0">

                    {{-- Colonna dell'immagine --}}
                    <div class="col-10 col-md-5 col-lg-4 d-flex align-items-center">
                        <img src="{{asset('storage/'. $restaurant->image)}}" alt="{{$restaurant->restaurant_name}}" class="img-fluid rounded">
                    </div>

                    {{-- Colonna delle informazioni --}}
                    <div class="col-10 col-md-4 col-lg-4 d-flex align-items-center justify-content-md-center">
                        <div>
                            <p><i class="fa-solid fa-map-pin me-2"></i>{{$restaurant->address}}</p>
                            <p><i class="fa-solid fa-location-dot me-2"></i>{{$restaurant->city}}</p>
                            <p><strong>P.IVA: </strong>{{$restaurant->vat}}</p>
                            <p><strong>Categorie: </strong>
                                @foreach ($restaurant->categories as $index => $category)                              
                                    {{$category->label}}@if($index < count($restaurant->categories) - 1), @else. @endif
                                @endforeach
                            </p>
                        </div>
                    </div>

                    {{-- Colonna del menù --}}
                    <div class="col-md-3 col-lg-4 text-center d-none d-md-block">
                        <a href="{{route('admin.dishes.index')}}" class="effect">
                            <img class="img-fluid w-50" src="{{asset('img/menu.png')}}" alt="menu">
                            <h3 class="mt-4">Vedi il tuo menu</h3>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Bottoni --}}
            <div class="card-footer">
                <div class="row justify-content-around">

                    <div class="d-flex justify-content-between align-items-center col-10 col-md-12">
                        <a href="{{route('dashboard')}}" class="btn-outline-index text-white fw-semibold gray px-3 py-2 rounded-pill"><i class="fa-solid fa-left-long me-2"></i>Torna indietro</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection