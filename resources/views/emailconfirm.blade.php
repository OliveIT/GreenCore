@extends('layouts.public')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="mx-auto">
                    <h2 class="text-center">Registration Confirmed</div>
                    <div class="text-center">
                        Your Email is successfully verified. Click here to <a href="{{ url('/login') }}">login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection