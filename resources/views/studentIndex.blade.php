<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome To Tutor Student Portal</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {{--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('/font-awesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('main.css')}}"/>



</head>
<body>

<section>
    <div class="row">
        <div class="col-md-12">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}">Teacher & Student Portal</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        @if (Route::has('login'))
                            <ul class="nav navbar-nav">
                                @if (Auth::check())
                                    <li><a href="{{ url('/home') }}">Home</a></li>
                                @else
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="{{ url('/register') }}">Register</a></li>
                                @endif
                            </ul>
                        @endif

                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>
{{--search section--}}

<section>
    <div class="search-option">
        <div class="row">
            {!! Form::open(['url'=>'/student/search','method'=>'GET']) !!}
            <div class="col-md-8 col-md-offset-1">
                <input type="text" name="class_name" class="form-control" placeholder="Please search with class">
            </div>
            <div class="col-md-3">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>

{{--search section end--}}
<br>
<br>

{{--wall section for button--}}
<div class="row">
    <div class="col-md-offset-1  col-md-9">
        <div class="well">
            <div class="btn-group" role="group">
                <a href="{{url('/')}}" class="btn btn-default" role="button">Teacher</a>
                <a href="{{url('/student')}}" class="btn btn-default" role="button">Student</a>
            </div>
        </div>
    </div>
</div>
{{--endwall section for button--}}
{{--list section--}}
{{--{{dd($locations )}}--}}
<section>
    <div class="location-list">
        <div class="col-md-9 col-md-offset-1">
            <ul class="list-group">
                @foreach($locations as $location)
                    <li class="list-group-item"><i class="fa fa-list"> <a href="{{route('detailsStudentPost', $location->id)}}">{{$location->location_name}}</a></i></li>

                    {{--<li class="list-group-item"><a href="{{route('detailsTeacherPost', $location->id)}}"><i class="fas fa-list">{{$location  ->location_name}}</i></a></li>--}}

                @endforeach
                {{--{{$locations->render()}}--}}
            </ul>
        </div>
    </div>
</section>
{{--list section--}}

{{--js section--}}
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

</body>
</html>
