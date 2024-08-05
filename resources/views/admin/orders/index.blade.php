@extends('layouts.app')

@section('title', 'Riepilogo Ordini')

@section('content')
        <section id="show-orders">
            <h1 class="text-center my-5">Riepilogo ordini di {{$restaurant_name}}</h1>

            <div class="tbl-header">
                <table class="text-center">
                    <thead>
                        <tr>
                            <th class="small-column">N.Ordine</th>
                            <th>Data Ordine</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th class="large-column d-none d-lg-table-cell">Email</th>
                            <th>Indirizzo</th>
                            <th class="d-none d-lg-table-cell">N.Telefonico</th>
                            <th>Totale ordine</th>
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
                            <td class="small-column">{{$order->id}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->lastname}}</td>
                            <td class="large-column d-none d-lg-table-cell">{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td class="d-none d-lg-table-cell">{{$order->phone}}</td>
                            <td><strong>{{$order->total}} €</strong></td>
                            {{--# COLLEGAMENTO A SHOW --}}
                            {{-- <td>
                                <a href="{{ route('admin.restaurants.orders.show', $order->restaurant_id, $order->id)}}" class="rounded px-2 py-1 data-btn blue fw-semibold">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="py-4">
                                <h3>Non sono ancora stati effettuati ordini</h3>
                            </td>   
                        </tr>
                        @endforelse
                        <tr>
                            <td colspan="7" class="text-end">Totale ordini</td>
                            <td><strong>{{number_format($total_orders, 2)}} €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

                
            
            


        </section>    
@endsection