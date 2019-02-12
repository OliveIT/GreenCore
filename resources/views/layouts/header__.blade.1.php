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