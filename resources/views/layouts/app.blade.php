<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pasq Eat | @yield('title')</title>

    <style>
        body {
            visibility: hidden;
        }
    </style>

    {{-- Icon --}}
    <link rel="icon" href="{{ asset('images/pasq-eat.jpg') }}" type="image/jpg" >

    {{-- CDN font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        @include('layouts.navbar')

        <main>

            <div class="container">

                {{--Alert--}}
                @include('layouts.includes.alert')
                @yield('content')
                
            </div>

        </main>

    </div>
    
    {{--Toast--}}
    @include('layouts.includes.toast')
    
    {{-- Modal --}}
    @include('layouts.includes.modal')

    {{--Scripts--}}
    @yield('scripts')

</body>

</html>
