@extends('layouts.app')

@section('title')
    Edit Profile
@endsection
@section('message')

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{session::get('message')}}
        </div>
    @endif

@endsection
{{--@section('errors')--}}

{{--@if(count($errors)>0)--}}
{{--<div class="alert alert-danger" role="alert">--}}
{{--<ul>--}}
{{--@foreach($errors->all() as $error)--}}
{{--<li>{{$error}}</li>--}}
{{--@endforeach--}}
{{--</ul>--}}
{{--</div>--}}
{{--@endif--}}

{{--@endsection--}}

@section('content')
<div class="col-md-6">
<h2>Add User</h2>
    {!! Form::open(['id'=>'form','url'=> 'user/add', 'method' => 'post']) !!}
        <div class="form-group {{$errors->has('name')?'has-error':''}}">
            <label>User name</label>
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
            <p class="invalid-feedback">{{$errors->first('name')}}</p>
        </div>

        <div class="form-group {{$errors->has('email')?'has-error':''}}">
            <label>User email</label>
            <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}">
            <p class="invalid-feedback">{{$errors->first('email')}}</p>
        </div>

        <div class="form-group {{$errors->has('phone_number')?'has-error':''}}">
            <label>User phone number</label>
            <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                    value="{{ old('phone_number') }}">
            <p class="invalid-feedback">{{$errors->first('phone_number')}}</p>
        </div>
        <div class="btn-group pull-right">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add
            </button>
            <a href="{{ url('user/view') }}" class="btn btn-secondary pull-right">Back</a>
        </div>
    {!! Form::close() !!}
</div>
@endsection

@section('js')
<script type="javascript/text">
</script>
@endsection