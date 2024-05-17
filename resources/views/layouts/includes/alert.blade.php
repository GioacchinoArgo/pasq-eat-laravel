{{--Alert Flash Message--}}
@session('message')
    <div class="alert w-50 m-auto alert-{{session('type','info')}} alert-dismissible fade show my-3" role="alert">
    {{$value}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endsession

{{-- Alert per gli errori --}}
@if($errors->any())
    <div class="alert w-50 m-auto alert-danger alert-dismissible fade show mt-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif