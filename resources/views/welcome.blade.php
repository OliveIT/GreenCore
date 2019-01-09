<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome To Tutor Student Portal</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    {{--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">--}}
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('/font-awesome/css/font-awesome.css')}}"/> -->
    <link rel="stylesheet" type="text/css" href="{{asset('main.css')}}"/>
</head>
<body>

<header class="navbar navbar-expand flex-column flex-md-row bd-navbar">
    <a class="navbar-brand mr-0 mr-md-2" href="{{url('/')}}" aria-label="Bootstrap">
        <img src="{{asset('assets/images/brand.png')}}"/>
    </a>
    @if (Route::has('login'))
    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
        @if (Auth::check())
            <li class="nav-item"><a class="nav-link p-2" href="{{ url('/home') }}">Home</a></li>
        @else
            <li class="nav-item"><a class="nav-link p-2" href="{{ url('/login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link p-2" href="{{ url('/register') }}">Register</a></li>
        @endif
    </ul>
    @endif
</header>
{{--search section--}}

<section>
  <div class="search-option">
      <div class="row">
          {!! Form::open(['url'=>'/teacher/search','method'=>'GET']) !!}
          {!! Form::close() !!} 
      </div>
  </div>
</section>

{{--search section end--}}
<br>
<br>

{{--wall section for button--}}
{{--endwall section for button--}}
{{--list section--}}

{{--js section--}}
<!-- <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
