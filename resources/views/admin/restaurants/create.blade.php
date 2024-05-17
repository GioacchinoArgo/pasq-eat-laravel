@extends('layouts.app')

@section('title', 'Crea Ristorante')

@section('content')
        <section id="create-form">
            <h1 class="text-center my-3">Crea il tuo ristorante</h1>

            {{-- Form  --}}
            @include('admin.restaurants.form.form')
        </section>    
@endsection