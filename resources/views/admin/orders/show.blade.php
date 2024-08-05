@extends('layouts.app')

@section('title', 'Ordine')

@section('content')
    <section id="order-show">
        <h1 class="my-5">{{$restaurant_name}}</h1>
        <div class="col-10 mx-auto mb-6">
            <div class="data-card">
                <!-- Titolo -->
                <div class="d-flex align-items-center justify-content-center cart-title gap-2">
                    <h3 class="mb-0 py-4">Riepilogo ordine</h3>
                </div>

                <!-- Riepilogo ordine -->
                <div class="cart-content">
                    @foreach ($dishes as $dish)
                        <div class="row align-items-center my-3">
                            {{-- Contenuto ordine --}}
                            <div class="col-2 text-end">

                                <!-- Quantità -->
                                <p class="fs-5 mb-0"><strong>??</strong></p>
                            </div>
                            <div class="col">

                                <!-- Nome del prodotto -->
                                <p class="fs-5 text-center mb-0 lh-1 fw-medium">{{ $dish->name }}</p>
                            </div>
                            <div class="col-2">

                                <!-- Prezzo -->
                                <p class="fs-5 mb-0"><strong>{{$dish->price}} €</strong></p>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- prezzo lg -->
                <div class="d-flex align-items-center justify-content-around btn-container py-3">
                    <p class="fs-5 fw-medium">Prezzo Totale: ?? € </p>
                </div>

            </div>
        </div>
    </section>
@endsection