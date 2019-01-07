@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="form-horizontal" method="POST" action="{{ route('add-switch-account-post') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="mx-auto mt-4">
                        <h2 class="text-center">Add Account</h2>
                    </div>
                </div>

                <div class="form-group">
                    <label for="utilityname" class="col-md-4 control-label">Utility Name</label>

                    <div class="col-md-12">
                        <input id="utilityname" type="text" class="form-control {{ $errors->has('utilityname') ? 'is-invalid' : '' }}" name="utilityname" value="{{ old('email') }}" required autofocus placeholder="Utility Name">

                        @if ($errors->has('utilityname'))
                            <div class="invalid-feedback">{{ $errors->first('utilityname') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="uid" class="col-md-4 control-label">UID</label>

                    <div class="col-md-12">
                        <input id="uid" type="text" class="form-control {{ $errors->has('uid') ? 'is-invalid' : '' }}" name="uid" value="{{ old('uid') }}" required placeholder="UID">

                        @if ($errors->has('uid'))
                            <div class="invalid-feedback">{{ $errors->first('uid') }}</div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-outline-primary btn-lg">
                            Add Account
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection