@extends('layouts.app')

@section('title', 'Modifica Profilo')

@section('content')

<div class="container spacing">
    <h2 class="fs-4 text-black my-4">
        {{ __('Profilo') }}
    </h2>
    <div class="glass-card p-4 mb-4 shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="glass-card p-4 mb-4 shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="delete-glass-card p-4 mb-4 shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
