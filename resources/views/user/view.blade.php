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

            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr class="success">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Location Name</th>
                        <th>Institute Name</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>{{$user->location_name}}</td>
                            <td>{{$user->last_level_education}}</td>
                            <td>{{$user->user_role}}</td>


                            <td>
                                <div class="btn btn-default">
                                    <a href="{{ url('/user/edit',[$user->id,'edit']) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                                </div>

                                <div class="btn btn-danger">
                                    <a class="delete_link" href="{{ url('/user/delete',[$user->id,'delete']) }}"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </table>
                {{ $users->links() }}
            </div>

@endsection

@section('js')

@endsection