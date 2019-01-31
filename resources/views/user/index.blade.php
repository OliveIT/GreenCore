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
        <a href="{{ url('user/new') }}" class="btn btn-primary">
            <i class="fa fa-plus"></i> Add</a>
    </div>
</div>

<table class="table table-bordered">
    <tr class="success">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Street</th>
        <th>Apt / Suite</th>
        <th>City</th>
        <th>State</th>
        <th>Action</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->contacts [0]->email}}</td>
            <td>{{$user->address1}}</td>
            <td>{{$user->address2}}</td>
            <td>{{$user->city}}</td>
            <td>{{$user->state}}</td>

            <td>
                <div class="btn-group">
                    <a href="{{ url('/user/view',[$user->user_id,'view']) }}" class="btn btn-primary">
                        <i class="fas fa-tv" aria-hidden="true"> </i> View</a>
                    <a class="btn btn-danger btn-remove" href="#" data-link="{{ url('/user/delete',[$user->user_id,'delete']) }}">
                        <i class="fa fa-trash" aria-hidden="true"> </i> Delete</a>
                </div>
            </td>
        </tr>
    @endforeach
</table>

@endsection

@section('js')

<script>
$(function() {
    $(".btn-remove").bind("click", function(e) {
        if (!confirm("Do you want to delete this user?")) return;
        window.open($(this).data("link"), "_self");
    });
})
</script>
@endsection