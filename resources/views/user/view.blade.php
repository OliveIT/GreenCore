@extends('layouts.app')

@section('title')
    View Profile
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
<div class="row">
    <div class="col-md-6">
        <h2>User Profile</h2>
        <div class="form-group">
            <label class="form-label">User name</label>
            <p class="text-muted">{{$user->name}}</p>
        </div>

        <div class="form-group">
            <label>User email</label>
            <p class="text-muted">{{$user->email}}</p>
        </div>

        <div class="form-group">
            <label>User phone number</label>
            <p class="text-muted">{{$user->phone_number}}</p>
        </div>
    </div>

    @foreach ($accounts as $account)
    <div class="col-md-6">
        <h2>Account ({{ $account->street }})</h2>
        <div class="form-group">
            <label class="form-label">City</label>
            <p class="text-muted">{{$account->city}}</p>
        </div>
        <div class="form-group">
            <label class="form-label">State</label>
            <p class="text-muted">{{$account->state}}</p>
        </div>
        <div class="form-group">
            <label class="form-label">Zipcode</label>
            <p class="text-muted">{{$account->zipcode}}</p>
        </div>
    </div>
    @endforeach
</div>

<a class="btn btn-outline-primary" href="{{ url('user/view') }}">Back</a>
@endsection