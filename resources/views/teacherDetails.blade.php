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
<div class="col-md-11 col-md-offset-1">
    <div class="row">
        <div class="container">
            @if(count($teachers) > 0)
                @foreach($teachers as $teacher)
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><b>Teacher Details</b></div>
                            <div class="panel-body">
                                <ul>
                                    <li><b>Looking For</b> :{{$teacher->looking_for}}</li>
                                    @if($teacher->available_sit == null)
                                        <li><b>Available sit</b> : 0</li>
                                    @else
                                        <li><b>Available sit</b> :{{$teacher->available_sit}}</li>
                                    @endif
                                    <li><b>Class</b> :{{$teacher->class_name}}</li>
                                    <li><b>Expected Amount</b> :{{$teacher->expected_amount}}</li>
                                    <li><b>Experience</b> :{{$teacher->experience}}</li>
                                    <li><b>Days</b> :{{$teacher->days}}</li>
                                    <li><b>Subject</b> :{{$teacher->subject}}</li>
                                    <li><b>Location</b> :{{$teacher->location_name}}</li>
                                    <li><b>Teacher Name</b> :{{$teacher->name}}</li>
                                    <li><b>Teacher phone number</b> :{{$teacher->phone_number}}</li>
                                    <li><b>Last level of education</b> :{{$teacher->last_level_education}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <h1>
                        <div class="alert alert-danger" role="alert">
                            No teacher post found.
                        </div>
                    </h1>
                </div>
            @endif
        </div>
    </div>
</div>

{{--{{dd($teachers)}}--}}
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
