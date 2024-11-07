<header class="shadow-sm">
    <nav class="navbar navbar-expand-md pb-0">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center py-0" 
                href="
                    @guest ()
                    
                        {{ url('/register') }}
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
                <ul class="navbar-nav d-none d-md-flex align-items-center me-md-auto gap-2">
        
                        {{-- Menu --}}
                        @guest()
        
                        @elseif (Auth::user()->restaurant)
                        <li class="nav-item py-3">
                            <a class="data-btn badge-btn orange p-2 ps-sm-2 ps-md-2" href="{{route('admin.dishes.index')}}">Menu</a>
                        </li>
                        @endguest
        
                        {{-- Ristorante --}}
                        @guest()
        
                        @elseif (Auth::user()->restaurant)
                        <li class="nav-item py-3">
                            <a class="data-btn badge-btn orange p-2 ps-sm-2 ps-md-2" href="{{route('admin.restaurants.show', Auth::user()->restaurant)}}">Ristorante</a>
                        </li>
                        @endguest
    
                        {{-- Ordini --}}
                        @guest()
        
                        @elseif (Auth::user()->restaurant->orders)
                        <li class="nav-item py-3">
                            <a class="data-btn badge-btn orange p-2 ps-sm-2 ps-md-2" href="{{route('admin.orders.index')}}">Ordini</a>
                        </li>
                        @endguest
    
                        {{-- Grafici --}}
                        @guest()
        
                        @elseif (Auth::user()->restaurant->orders)
                        <li class="nav-item py-3">
                            <a class="data-btn badge-btn orange p-2 ps-sm-2 ps-md-2" href="{{route('admin.orders.graphs')}}">Grafici</a>
                        </li>
                        @endguest
                        
                </ul>
    
                <!-- Right Side Of Navbar -->
                <ul class="data-dropdown list-unstyled d-none d-md-flex gap-3 mb-0">
                        <!-- Authentication Links -->
                        @guest
    
                        {{-- Login --}}
                        <li class="nav-item mb-4 my-md-0">
                            <a class="data-btn orange p-2 p-sm-2 p-md-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
    
                        {{-- Registrati --}}
                        <li class="nav-item my-3 my-md-0">
                            <a class="data-btn orange p-2 ps-2 pe-2 p-sm-2 p-md-2" href="{{url('/register') }}">{{ __('Registrati') }}</a>
                        </li>
    
                        @else
    
                        {{-- Utente --}}
                        <li class="active py-3">
    
                            <a id="navbarDropdown" class="data-btn badge-btn orange dropdown-toggle px-2 py-2 px-sm-2 py-sm-2" href="#" role="button" tabindex="0">
                                {{ Auth::user()->name }}
                            </a>
    
                            {{-- Dropdown --}}
                            <div class="data-dropdown-content" aria-labelledby="navbarDropdown">
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




                <!-- Hamburger menu -->
                <div class="data-container mx-auto d-md-none">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav d-block d-md-none text-center">
                        
                        {{-- Menu --}}
                        @guest()
    
                        @elseif (Auth::user()->restaurant)
                        <li class="nav-item py-3 border-bottom">
                            <a class="w-100 text-decoration-none text-white fs-4" href="{{route('admin.dishes.index')}}">Menu</a>
                        </li>
                        @endguest
    
                        {{-- Ristorante --}}
                        @guest()
    
                        @elseif (Auth::user()->restaurant)
                        <li class="nav-item py-3 border-bottom">
                            <a class="w-100 text-decoration-none text-white fs-4" href="{{route('admin.restaurants.show', Auth::user()->restaurant)}}">Ristorante</a>
                        </li>
                        @endguest
    
                        {{-- Ordini --}}
                        @guest()
    
                        @elseif (Auth::user()->restaurant->orders)
                        <li class="nav-item py-3 border-bottom">
                            <a class="w-100 text-decoration-none text-white fs-4" href="{{route('admin.orders.index')}}">Ordini</a>
                        </li>
                        @endguest
    
                        {{-- Grafici --}}
                        @guest()
    
                        @elseif (Auth::user()->restaurant->orders)
                        <li class="nav-item py-3 border-bottom">
                            <a class="w-100 text-decoration-none text-white fs-4" href="{{route('admin.orders.graphs')}}">Grafici</a>
                        </li>
                        @endguest
                        
                    </ul>
    
                    <!-- Right Side Of Navbar -->
                    <ul class="data-dropdown list-unstyled d-block d-md-none gap-3 mb-0 text-center">
                        <!-- Authentication Links -->
                        @guest
    
                        {{-- Login --}}
                        <li class="nav-item my-md-0 py-3 border-bottom">
                            <a class="w-100 text-decoration-none text-white fs-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
    
                        {{-- Registrati --}}
                        <li class="nav-item my-md-0 py-3">
                            <a class="w-100 text-decoration-none text-white fs-4" href="{{url('/register') }}">{{ __('Registrati') }}</a>
                        </li>
    
                        @else
    
                        {{-- Utente --}}
                        <li class="active py-3">
    
                            <a id="navbarDropdown" class="dropdown-toggle text-decoration-none text-white w-100 fs-4" href="#" role="button" tabindex="0">
                                {{ Auth::user()->name }}
                            </a>
    
                            {{-- Dropdown --}}
                            <div class="data-dropdown-content" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-decoration-none" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item my-2 text-decoration-none" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item text-decoration-none" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        </div>
    </nav>
</header>