@extends('layouts.app')

@section('title', 'Riepilogo Ordini')

@section('content')
        <section id="show-orders">
            <h1 class="text-center my-5">Riepilogo ordini di {{$restaurant_name}}</h1>
            <div class="tbl-header">
                <table class="text-center">
                  <thead>
                    <tr>
                      <th class="col-order">N.Ordine</th>
                      <th class="d-none d-lg-table-cell">Data Ordine</th>
                      <th class="d-none d-lg-table-cell">Nome</th>
                      <th class="d-none d-lg-table-cell">Cognome</th>
                      <th class="d-none d-xl-table-cell col-email">Email</th>
                      <th>Indirizzo</th>
                      <th>Cell</th>
                      <th>Totale</th>
                      <th></th>
                    </tr>
                  </thead>
                </table>
            </div>
          
            <div class="tbl-content">
                <table>
                  <tbody>
                    @forelse ($orders as $order)
                      <tr>
                        {{-- N.Ordine --}}
                        <td class="text-center col-order">{{$order->id}}</td>
                        {{--Data Ordine--}}
                        <td class="text-center d-none d-lg-table-cell">{{$order->created_at}}</td>
                        {{--Nome--}}
                        <td class="text-center d-none d-lg-table-cell">{{$order->name}}</td>
                        {{--Cognome--}}
                        <td class="text-center d-none d-lg-table-cell">{{$order->lastname}}</td>
                        {{--Email--}}
                        <td class="text-center d-none d-xl-table-cell col-email">{{$order->email}}</td>
                        {{--Indirizzo--}}
                        <td class="text-center">{{$order->address}}</td>
                        {{--Numero Telefonico--}}
                        <td class="text-center">{{$order->phone}}</td>
                        {{--Prezzo Totale--}}
                        <td class="text-center"><strong>{{$order->total}}€</strong></td>
                        <td class="text-center">
                             {{--# COLLEGAMENTO A SHOW --}}
                             <a href="{{ route('admin.orders.show', $order->id)}}" class="rounded px-2 py-1 data-btn blue fw-semibold">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                      </tr>
                    @empty
                      <h1 class="py-5 text-center">Non ci sono ordini da mostrare</h1>
                    @endforelse
                    <tr>
                        {{-- Totale Oridini --}}
                        <td colspan="5" class="text-center pb-4 fs-4 d-lg-none">
                            <div class="ciccio mb-4 mx-auto border-top rounded border-secondary-subtle w-50"></div>
                            Totale ordine: 
                            <strong>{{number_format($total_orders, 2)}} €</strong>
                        </td>
                        <td colspan="8" class="text-center pb-4 fs-4 d-none d-lg-table-cell d-xl-none">
                            <div class="ciccio mb-4 mx-auto border-top rounded border-secondary-subtle w-50"></div>
                            Totale ordine: 
                            <strong>{{number_format($total_orders, 2)}} €</strong>
                        </td>
                        <td colspan="9" class="text-center pb-4 fs-4 d-none d-xl-table-cell">
                            <div class="ciccio mb-4 mx-auto border-top rounded border-secondary-subtle w-50"></div>
                            Totale ordine: 
                            <strong>{{number_format($total_orders, 2)}} €</strong>
                        </td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </section>    
@endsection