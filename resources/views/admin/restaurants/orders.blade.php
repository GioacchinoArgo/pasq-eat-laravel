@extends('layouts.app')

@section('title', 'Riepilogo Ordini')

@section('content')
        <section id="show-orders">
            <h1 class="text-center text-white my-5">Riepilogo ordini di {{$restaurant_name}}</h1>
            <table class="text-center">

                <thead  class="tbl-header">
                    <tr>
                        <th class="small-column">N.Ordine</th>
                        <th>Data Ordine</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th class="large-column d-none d-lg-table-cell">Email</th>
                        <th>Indirizzo</th>
                        <th class="d-none d-lg-table-cell">Numero di Telefono</th>
                        <th><strong>Totale ordine<br>€</strong></th>
                    </tr>
                </thead>

                <tbody class="tbl-content">
                    @forelse ($orders as $order)
                    <tr>
                        <td class="small-column">{{$order->id}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->lastname}}</td>
                        <td class="large-column d-none d-lg-table-cell">{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td class="d-none d-lg-table-cell">{{$order->phone}}</td>
                        <td><strong>{{$order->total}}</strong></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-4">Non sono ancora stati effettuati ordini</td>   
                    </tr>
                    @endforelse
                    <tr id="total-orders">
                        <td></td>
                        <td></td>
                        <td class="d-none d-lg-table-cell"></td>
                        <td class="d-none d-lg-table-cell"></td>
                        <td></td>
                        <td colspan="2" class="text-end">Totale ordini €</td>
                        <td>{{number_format($total_orders, 2)}}</td>
                    </tr>
                </tbody>

            </table>
                
            
            


        </section>    
@endsection