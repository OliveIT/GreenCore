<?php $url = Route::current()->uri; ?>

<nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{asset('assets/images/brand.png')}}"/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample06">
        @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown06">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </li> -->

            
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @elseif ($url == "/")
                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
            @else
                @if(Session::get("switchaccount"))
                <li class="nav-item"><a class="nav-link" href="#">
                    {{ Session::get("switchaccount")->contacts [0]->first_name ." | ". Session::get("switchaccount")->address1." - ".Session::get("switchaccount")->address2 }}</a></li>
                @endif
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
</nav>