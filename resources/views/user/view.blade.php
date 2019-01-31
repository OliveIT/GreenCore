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
        <h2>{{ $client->name }}</h2>
        <div class="form-group">
            <label class="form-label">Street</label>
            <p class="text-muted">{{ $client->address1 }}</p>
        </div>
        <div class="form-group">
            <label class="form-label">APT / Suite</label>
            <p class="text-muted">{{ $client->address2 }}</p>
        </div>
        <div class="form-group">
            <label class="form-label">City</label>
            <p class="text-muted">{{ $client->city }}</p>
        </div>
        <div class="form-group">
            <label class="form-label">State</label>
            <p class="text-muted">{{ $client->state }}</p>
        </div>
        <div class="form-group">
            <label class="form-label">Work Phone</label>
            <p class="text-muted">{{ $client->work_phone }}</p>
        </div>
    </div>
    <div class="col-md-6">
        <?php $contact = $client->contacts [0]; ?>
        <h2>{{ $contact->email }}</h2>
        <div class="form-group">
            <label class="form-label">First Name</label>
            <p class="text-muted">{{ $contact->first_name }}</p>
        </div>
        <div class="form-group">
            <label class="form-label">Last Name</label>
            <p class="text-muted">{{ $contact->last_name }}</p>
        </div>
        <div class="form-group">
            <label class="form-label">Phone Number</label>
            <p class="text-muted">{{ $contact->phone }}</p>
        </div>
    </div>
    <div class="col-12">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{ url('user/view') }}">Back</a>
        </div>
    </div>
</div>

@endsection