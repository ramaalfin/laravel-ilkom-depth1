<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Universitas ILKOOM</title>

    <!-- Fonts -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav id="main-navbar" class="navbar navbar-expand-md navbar-light bg-white py-3">
        <div class="container pb-3">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="d-none">ILKOOM</span>
                <img src="{{ asset('img/ilkoom_logo.png') }}" alt="logo" class="main-logo d-none d-xl-inline">
                <img src="{{ asset('img/ilkoom_logo.png') }}" alt="" class="small-logo d-inline d-xl-none">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{ route('jurusans.index') }}" class="nav-link px-4">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dosens.index') }}" class="nav-link px-4">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mahasiswas.index') }}" class="nav-link px-4">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('matakuliahs.index') }}" class="nav-link px-4">Mata Kuliah</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/pencarian') }}" class="nav-link px-4">Search</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

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

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>

    <footer id="main-footer" class="text-white bg-dark py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center text-md-start">
                    <a href="{{ asset('img/ilkoom_logo.png') }}" class="mb-3 img-fluid"></a>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi soluta excepturi eaque cum totam quo quidem aperiam optio expedita impedit?</p>
                </div>
                <div class="col-md-3">
                    <h5>Information</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('jurusans.index') }}" class="text-white">Jurusan</a></li>
                        <li><a href="{{ route('dosens.index') }}" class="text-white">Dosen</a></li>
                        <li><a href="{{ route('mahasiswas.index') }}" class="text-white">Mahasiswa</a></li>
                        <li><a href="{{ route('matakuliahs.index') }}" class="text-white">Mata Kuliah</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Our Services</h5>
                    <ul class="list-unstyled">
                        @guest
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="text-white">Register</a></li>
                            @endif
                        @endguest
                        <li><a href="#" class="text-white">Help/Contact Us</a></li>
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-3 text-center text-md-start">
                    <h5>Hubungi Kami</h5>
                    <div class="text-nowrap"><i class="fas fa-envelope fa-fw mr-3"></i>info@ilkom.ac.id</div>
                    <div class="text-nowrap"><i class="fas fa-phone fa-fw mr-3"></i>(021) 123456</div>
                    <div class="text-nowrap"><i class="fas fa-globe fa-fw mr-3"></i>www.ilkom.ac.id</div>
                </div>
            </div>
            <div class="row mt-3 mt-md-0">
                <div class="col-md-3 me-md-auto text-center text-md-start">
                    <small>&copy; ILKOOM {{ date('Y') }}</small>
                </div>
                <div id="footer-icon" class="col-md-3 text center text-md-start">
                    <div class="">
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                        <a href="#" class="text-white text-decoration-none me-2">
                            <i class="fab fa-github fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('sweetalert::alert')
</body>
</html>
