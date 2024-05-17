@extends('layouts.app')

@section('title', 'Cestino')

@section('content')
<section id='dishes-trash' class="spacing">
    <div class="mb-2 d-flex justify-content-between align-items-center">
      <a href="{{route('admin.dishes.index')}}" class="btn-outline-index fw-semibold gray text-white ms-1 px-3 py-1 py-md-2 rounded-pill">
        <i class="fa-solid fa-arrow-left"></i>
        <span class="d-none d-md-inline-block">Torna indietro</span>
      </a>
      <h1 class="text-white text-center mb-0">Piatti Eliminati</h1>
    </div>
    {{--Tabella--}}
    <div class="tbl-header">
    <table class="text-center">
      <thead>
        <tr>
          <th class="d-none d-lg-table-cell">Immagine</th>
          <th>Nome</th>
          <th>Online</th>
          <th class="d-none d-lg-table-cell">Portata</th>
          <th class="d-none d-lg-table-cell">Dieta</th>
          <th>Prezzo</th>
          <th>Ultima modifica</th>
          <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table>
      <tbody>
        @forelse ($dishes as $dish)
          <tr>
            <td class="text-center d-flex justify-content-center d-none d-lg-table-cell">
              <div class="index-img mx-auto">
                @if ($dish->image)
                    <img src="{{asset('storage/' . $dish->image)}}" alt="foto-{{$dish->slug}}" class="img-fluid rounded-circle">
                @else
                    <img src="{{asset('/images/default-dish.png')}}" alt="" class="img-fluid rounded-circle">
                @endif
              </div>
            </td>
            {{--Nome--}}
            <td class="text-center">{{$dish->name}}</td>
            {{--Disponibilità--}}
            <td class="text-center">
              @if ($dish->availability == 1)
                <span class="stamp is-available"></span> 
              @else
                <span class="stamp not-available"></span>
              @endif
            </td>
            {{--Portata--}}
            <td class="text-center d-none d-lg-table-cell">
              {{$dish->course}}
            </td>
            {{--Dieta--}}
            <td class="text-center d-none d-lg-table-cell">
              @if($dish->diet)
               {{$dish->diet}}
              @else
                ---
              @endif
            </td>
            {{--Prezzo--}}
            <td class="text-center">{{$dish->price}} €</td>
            <td class="text-center">{{$dish->getFormattedDate('updated_at', 'd/m/Y H:i')}}</td>
            <td>
              <div class="d-flex gap-2 flex-column flex-xl-row align-items-center justify-content-end">
                {{--# COLLEGAMENTO A SHOW --}}
                <a href="{{ route('admin.dishes.show', $dish->id)}}" class="rounded px-2 py-1 btn-outline-index blue">
                  <i class="far fa-eye"></i>
                </a>
                
                {{--# COLLEGAMENTO A  EDIT --}}
                <a href="{{ route('admin.dishes.edit', $dish->id)}}" class="rounded px-2 py-1 btn-outline-index yellow">
                  <i class="fas fa-pencil"></i>
                </a>

                {{--# COLLEGAMENTO A RESTORE --}} 
                <form action="{{route('admin.dishes.restore',$dish->id)}}" method="POST" 
                    class="form-delete" data-dish="{{$dish->title}}">
                    @csrf
                    @method('PATCH')
                    <button  class="rounded px-2 py-1 btn-outline-index green">
                        <i class="fas fa-arrows-rotate"></i>
                    </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <h1 class="text-white py-5">Non ci sono piatti da mostrare</h1>
        @endforelse
      </tbody>
    </table>
  </div> 
</section>
@endsection
