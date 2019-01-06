@extends('layouts.app')

@section('title')
    view location
@endsection
@section('message')
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
@endsection

@section('content')
    <div class="col-md-12">
        <div class="btn-group pull-right">
            <a href="{{url('location/create')}}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>
                Add Location</a>
        </div>
        <br>
        <br>
        <table class="table table-bordered">
            <tr class="success">
                <th>ID</th>
                <th>Name</th>

                <th>Action</th>
            </tr>
            @foreach($locations as $location)
                <tr>
                    <td>{{$location->id}}</td>
                    <td>{{$location->location_name}}</td>
                    <td>
                        <div class="btn btn-default">
                            <a href="{{ url('/location/edit',[$location->id,'edit']) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        </div>

                        <div class="btn btn-danger">
                            <a class="delete_link" href="{{ url('/location/delete',[$location->id,'delete']) }}"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                        </div>
                    </td>

                </tr>
            @endforeach

        </table>
        {{ $locations->render() }}
    </div>

@endsection

@section('js')

@endsection