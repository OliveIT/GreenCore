@extends('layouts.app')
@section('title')
    Profile
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form class="form-horizontal" method="POST" action="{{ url('profile/changePhone') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Phone number</label>
                <input id="phone_number" type="text" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" name="phone_number" value="{{ auth()->user()->phone_number }}" required placeholder="Input Phone number. ex:01123456789">
                
                @if ($errors->has('phone_number'))
                    <div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">
                    Change Phone number
                </button>
                <a class="btn btn-outline-primary" href="{{ url('/profile') }}">
                    Back
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
