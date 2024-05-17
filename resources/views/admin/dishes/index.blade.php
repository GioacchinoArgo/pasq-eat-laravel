
@extends('layouts.app')

@section('title', 'Menu')

@section('content')    
<div class="mb-2">
  <div class="mb-3 d-flex justify-content-between align-items-center spacing">
    <!--Filtro per Portata del Piatto-->
    <form class="filter-courses d-flex align-items-center justify-content-center" action="{{ route('admin.dishes.index') }}" method="GET">
      <div class="input-group d-flex flex-column flex-lg-row gap-2">
        <div class="col-12 col-sm-12 col-md-12 col-lg-5 mb-1">
          <select role="button" id="coruse-filter" class="form-select text-white fw-bold bg-transparent rounded-pill" name="course">
            <option class="fw-semibold" value="">Tutte le portate</option>
            @foreach ($courses as $course)
            <option class="fw-semibold" value="{{ $course }}"  {{ request('course') == $course ? 'selected' : '' }}>
              {{ $course }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="col-12 flex-lg-row col-sm-12 col-md-12 col-lg-4 gap-2">
          <!--Filtro in base a disponibilità del piatto-->
          <select id="availability-filter" role="button" class="form-select pe-5 text-white fw-bold bg-transparent rounded-pill" name="availability"> 
            <option value="">Tutti</option>
            <option value="available" @if($availability==='available')selected @endif>Disponibile</option>
            <option value="not-available" @if($availability==='not-available')selected @endif>Non Disponibile</option>
          </select>
        </div>
        <div class="col-2 text-center">
          <button class="btn-outline-index text-white my-1 fw-semibold rounded-pill px-2 py-1 gray" type="submit">Filtra</button>
        </div>
      </div>
    </form>
    
    <h1 class="text-white me-4">Menu</h1>
    <div class="d-flex justify-content-end gap-2 p-2">
      <!-- Cestino -->
      <a href="{{route('admin.dishes.trash')}}" class="btn-outline-index red text-white fw-semibold ms-1 px-3 py-1 rounded-pill">
          <i class="far fa-trash-can"></i>
          <span class="d-none d-xl-inline">Vedi Cestino</span>
      </a>
      <!-- Crea nuovo dish -->
      <a href="{{route('admin.dishes.create')}}" class="btn-outline-index text-white fw-semibold green ms-1 px-3 py-1 rounded-pill">
        <i class="fa-solid fa-plus"></i>
        <span class="d-none d-xl-inline">Aggiungi piatto</span>
      </a>
    </div>
  </div>
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
            {{-- Immagine --}}
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
                <a href="{{ route('admin.dishes.show', $dish->id)}}" class="rounded px-2 py-1 btn-outline-index blue text-white fw-semibold">
                  <i class="far fa-eye"></i>
                </a>
                
                {{--# COLLEGAMENTO A  EDIT --}}
                <a href="{{ route('admin.dishes.edit', $dish->id)}}" class="rounded px-2 py-1 btn-outline-index yellow text-white fw-semibold">
                  <i class="fas fa-pencil"></i>
                </a>
                
                {{--# COLLEGAMENTO A  DESTROY --}}
                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" 
                  method="POST" class="delete-form" data-dish="{{$dish->id}}" data-bs-toggle="modal" data-bs-target="#modal">
                  @csrf
                  @method('DELETE')
                  <button class="rounded px-2 py-1 btn-outline-index red text-white fw-semibold"><i class="far fa-trash-can"></i></button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <h1 class="py-5 text-white">Non ci sono piatti da mostrare</h1>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
      
@section('scripts')
<script>
  const dishes = @json($dishes);
</script>
  @vite('resources/js/delete_confirmation.js')
@endsection



















