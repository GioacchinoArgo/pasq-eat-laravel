@extends('layouts.app')

@section('title', 'Ordine')

@section('content')
    <section id="order-show" class="spacing">
        <h1 class="my-5">Riepilogo ordine - {{$restaurant_name}}</h1>

        {{-- Tabella --}}
        <div class="tbl-header">
            <table class="text-center">
                <thead>
                    <tr>
                        <th>Quantità</th>
                        <th>Piatto</th>
                        <th>Prezzo Totale</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="tbl-content">
            <table>
                <tbody>

                    @foreach ($dishes as $dish)
                        <tr>
                            <td class="text-center td-spacing">{{$dish->pivot->quantity}}</td>
                            <td class="text-center td-spacing">{{$dish->name}}</td>
                            <td class="text-center td-spacing"><strong>{{$dish->pivot->total_price}} €</strong></td>
                        </tr>
                    @endforeach
                    
                    <tr>
                        <td colspan="3" class="text-center pt-0 pb-4 fs-4">
                            <div class="ciccio mb-4 mx-auto border-top rounded border-secondary w-50"></div>
                            Totale ordini: 
                            <strong>{{number_format($total_order, 2)}} €</strong></td>
                    </tr>

                </tbody>
            </table>
        </div>

         {{--# TORNA INDIETRO --}}
         <div class="d-flex mt-4">
             <a href="{{route('admin.orders.index')}}" class="data-btn gray ms-1 px-3 py-2 rounded-pill d-flex align-items-center fw-semibold">
                <i class="fa-solid fa-left-long"></i>
                <span class="d-none ms-2 d-lg-block">Torna indietro</span>
            </a>
         </div>

        
    </section>
@endsection