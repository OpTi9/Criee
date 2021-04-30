<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>criee</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/fish.png') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/fish.png') }}" width="30" height="30" alt="">
             Criée de la Cornouaille
        </a>
        <div class="container collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="col-6 navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                </li>

                <li class="nav-item active offset-1">
                    <a class="nav-link active" aria-current="page" href="{{route('post.create')}}">Ajouter un lot</a>
                </li>
                @auth
                <li class="nav-item active offset-1">
                    <a class="nav-link active" aria-current="page" href="{{ route('cart.show', ['id'=> Auth::id()]) }}">Panier</a>
                </li>
                @endauth
            </ul>
            <form class="d-flex" action="{{ route('post.index') }}">
                <input class="form-control me-2" name="search" type="search" placeholder="..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Rechercher</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

<div class="container">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif


    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>

<footer class="text-muted py-3 bg-light fixed-bottom">
    <div class="container">
        <p class="mb-1">© Ezhaev Azamat - Reinbold Nicolas 2021</p>
    </div>
</footer>
</html>
