@extends('layouts.app')

@section('title', Auth::user()->name)

@section('content')
<div class="container spacing">
    <h1 class="text-center mb-4">
        Benvenuto {{ Auth::user()->name }}
    </h1>
    <div class="row justify-content-center">
        <div class="col">
            <div class="glass-card">
                <div class="card-header mt-3">
                    <h2 class="text-center my-3">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h2>
                </div>

                @if (Auth::user()->restaurant)
                {{-- Se lo User ha un ristorante mostra questo --}}
                    <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <div class="row justify-content-center">
                                {{-- Finire di compilare gli href --}}
                                <div class="col-6 col-sm-6 col-md-3 text-center my-5">
                                    <a href="{{route('admin.dishes.index')}}" class="effect">
                                        <img class="img-fluid w-50" src="{{asset('img/menu.png')}}" alt="menu">
                                        <h3 class="mt-3">Menù</h3>
                                    </a>
                                </div>
                                <div class="col-6 col-sm-6 col-md-3 text-center my-5">
                                    <a href="{{route('admin.restaurants.show', Auth::user()->restaurant)}}" class="effect">
                                        <img class="img-fluid w-50" src="{{asset('img/restaurant.png')}}" alt="ristorante">
                                        <h3 class="mt-3">Ristorante</h3>
                                    </a>
                                </div>

                                <div class="col-6 col-sm-6 col-md-3 text-center my-5">
                                    <a href="{{route('admin.restaurants.orders', Auth::user()->restaurant)}}" class="effect">
                                        <img class="img-fluid w-50" src="{{asset('img/receipt.png')}}" alt="ordine">
                                        <h3 class="mt-3">Ordini</h3>
                                    </a>
                                </div>
                            </div>
                    </div>
                    
                @else
                {{-- Se lo User non ha un ristorante mostra questo --}}
                    <div class="card-body mt-4">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-6 offset-3 text-center">
                                <a href="{{route('admin.restaurants.create')}}" class="effect">
                                    <img class="img-fluid w-50 mb-4" src="{{asset('img/restaurant.png')}}" alt="ristorante">
                                    <h3 class="mb-5">Crea il tuo ristorante</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
