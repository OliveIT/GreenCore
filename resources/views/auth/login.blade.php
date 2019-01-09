@extends('layouts.public')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="mx-auto mt-4">
                        <h2 class="text-center">Customer Login</h2>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required placeholder="Password">

                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Keep me signed in
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-12">
                        <a href="{{ url('/register') }}"><u>Create login</u></a>
                        <p class="inline-block"> | Forget your 
                            <a href="{{ route('password.request') }}"><u>email</u></a> or 
                            <a href="{{ route('password.request') }}"><u>password?</u></a>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-primary btn-lg">
                            Login
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
