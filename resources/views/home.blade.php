@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section id="home">
        <div class="row">
            <div class="welcome col">
                <h1>Benvenuti su PasqEat</h1>
                <p class="w-75">Registrati, crea il tuo ristorante e personalizza il tuo menù.</p>
                <a href="{{route('register')}}" class="btn border-light-subtle">Registrati</a>
            </div>
            <div class="jumbotron d-none d-lg-flex mt-5 col-12">
                <figure>
                    <img src="{{asset('img/immagine-1.jpg')}}" alt="Immagine" class="img-fluid">
                </figure>
            </div>
        </div>
    </section>

@endsection