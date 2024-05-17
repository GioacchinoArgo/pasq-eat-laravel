<nav class="navbar navbar-expand-md shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" 
            href="
                @guest ()
                
                    {{ url('/') }}
                @elseif (Auth::user())

                    {{route('dashboard')}}
                @endif
                "
        >
            
            <picture class="logo-container">
                <img class="rounded-circle" src="{{ asset('images/pasq-eat.jpg') }}" alt="Deliveboo" id="logo">
            </picture>
            
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse align-items-baseline" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav d-inline-block d-md-flex me-md-auto">

                {{-- Se l'utente non è loggato vede la Home --}}
                @guest()
                <li class="nav-item">
                    <a class="nav-link on-hover ms-1 ps-2 pe-2 p-sm-2 p-md-2" href="{{url('/') }}">{{ __('Home') }}</a>
                </li>
                @endguest

                @guest()

                @elseif (Auth::user()->restaurant)
                <li class="nav-item">
                    <a class="nav-link on-hover p-2 ps-sm-2 ps-md-2" href="{{route('admin.restaurants.show', Auth::user()->restaurant)}}">Ristorante</a>
                </li>
                @endguest
                @guest()

                @elseif (Auth::user()->restaurant)
                <li class="nav-item">
                    <a class="nav-link on-hover p-2 ps-sm-2 ps-md-2 d-inline d-md-block" href="{{route('admin.dishes.index')}}">Menu</a>
                </li>
                @endguest

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="glass-dropdown list-unstyled d-flex gap-3 mb-0">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link on-hover p-sm-2 p-md-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @else
                <li class="active">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle on-hover px-2 py-2 px-sm-2 py-sm-2" href="#" role="button" tabindex="0">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="glass-dropdown-content" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                        <a class="dropdown-item my-2" href="{{ url('profile') }}">{{__('Profile')}}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>