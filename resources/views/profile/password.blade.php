@extends('layouts.app')
@section('title')
    Profile
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form class="form-horizontal" method="POST" action="{{ url('profile/changePassword') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label>User ID/Email</label>
                <p class="text-muted">{{auth()->user()->email}}</p>
            </div>

            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input id="old_password" type="password" class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}" name="old_password" value="" required autofocus placeholder="Input Old Password">
                
                @if ($errors->has('old_password'))
                    <div class="invalid-feedback">{{ $errors->first('old_password') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="" required placeholder="Input Password">
                
                @if ($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input id="confirm_password" type="password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}" name="confirm_password" required placeholder="Confirm Password">
                
                @if ($errors->has('confirm_password'))
                    <div class="invalid-feedback">{{ $errors->first('confirm_password') }}</div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">
                    Change Password
                </button>
                <a class="btn btn-outline-primary" href="{{ url('/profile') }}">
                    Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
