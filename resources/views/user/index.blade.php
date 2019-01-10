@extends('layouts.app')

@section('title')
    view profile
@endsection
@section('message')
    @if(Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
@endsection

@section('content')
<div class="d-flex bd-highlight mt-4">
    <div class="mr-auto bd-highlight">
        <h2>User Management</h2>
    </div>
    <div class="bd-highlight align-self-center">
        <a href="{{ url('user/new') }}" class="btn btn-outline-primary">
            <i class="fa fa-plus"></i> Add</a>
    </div>
</div>

<table class="table table-bordered">
    <tr class="success">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone_number}}</td>

            <td>
                <div class="btn-group">
                    <a href="{{ url('/user/view',[$user->id,'view']) }}" class="btn btn-primary">
                        <i class="fas fa-tv" aria-hidden="true"> </i> View</a>
                    <a class="btn btn-danger" href="{{ url('/user/delete',[$user->id,'delete']) }}">
                        <i class="fa fa-trash" aria-hidden="true"> </i> Delete</a>
                </div>
            </td>
        </tr>
    @endforeach
</table>

@endsection

@section('js')

@endsection