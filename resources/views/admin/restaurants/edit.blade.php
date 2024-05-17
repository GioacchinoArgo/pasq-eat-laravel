@extends('layouts.app')

@section('title', 'Modifica'.' '.$restaurant->restaurant_name)

@section('content')
        <section class="spacing" id="edit-form">
            <h1 class="text-center my-3">Modifica il tuo ristorante</h1>

           {{-- Form  --}}
           @include('admin.restaurants.form.form') 
        </section>    
@endsection