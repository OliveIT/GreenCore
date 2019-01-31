<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('main.css')}}"/>

</head>
<body class="h-100">
    <div id="app" class="cover-container d-flex w-100 h-100 mx-auto flex-column">
        <header class="navbar navbar-expand flex-column flex-md-row bd-navbar">
            <div class="inner">
                <a class="navbar-brand mr-0 mr-md-2" href="{{url('/')}}" aria-label="Bootstrap">
                    <img src="{{asset('assets/images/brand.png')}}"/>
                </a>
                @if (Route::has('login'))
                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="#">Account: {{ Auth::User()->name }}
                        {{ Session::get("switchaccount") ? " | ".Session::get("switchaccount")->address1." - ".Session::get("switchaccount")->address2 : "" }}</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="{{ url('/user/view') }}">Profile</a></li> -->
                    @if(auth()->user()->user_role != "Admin" && auth()->user()->verified == '1')
                    <li class="nav-item"><a class="nav-link" href="{{url('/switch')}}">Switch Account</a></li>
                    @endif
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('logoutUser') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
                @endif
            </div>
        </header>
        @yield('message')

        <div class="container-fluid mt-3 mb-4">
            <div class="row">
                <div class="col-md-2 d-none d-md-block bg-light sidebar">
                    @include('layouts.sidebar')
                </div>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @yield('content')
                </main>
            </div>
        </div>

        <footer class="mastfoot mt-auto p-4">
            <div class="inner text-center">
                <p>Support</p>
                <p>FAQs</p>
                <p class="border-top d-inline">CustServ@GreenCoreElectric.com</p>

                <p class="muted mt-3">&copy; 2018 Green Core Electric.</p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script>
    <script src="//code.jquery.com/jquery.js"></script>
    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    @yield('js')
    <script>
        $('#flash-overlay-modal').modal();
    </script>

</body>
</html>
