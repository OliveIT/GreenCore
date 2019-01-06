@extends('layouts.app')

@section('title')
    view post
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
            <a href="{{url('post/create')}}" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>
                Add Post</a>
        </div>
        <br>
        <br>
        <table class="table table-bordered">
            <tr class="success">
                <th>ID</th>
                <th>Name</th>
                @if(auth()->user()->user_role == 'Student' || auth()->user()->user_role == 'Admin')
                    <th>Teacher Type</th>
                @endif
                @if(auth()->user()->user_role == 'Teacher' || auth()->user()->user_role == 'Admin')
                <th>Looking</th>
                <th>Available sit</th>
                @endif
                <th>Expected Amount</th>
                <th>Days</th>
                <th>Location Name</th>
                <th>Class</th>
                <th>Experience</th>
                <th>Subject</th>
                <th>Action</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    @if(auth()->user()->user_role == 'Student' || auth()->user()->user_role == 'Admin')
                          <td>{{$post->teacher_type}}</td>
                    @endif
                    @if(auth()->user()->user_role == 'Teacher' || auth()->user()->user_role == 'Admin')
                         <td>{{$post->looking_for}}</td>
                        <td>{{$post->available_sit}}</td>
                    @endif
                    <td>{{$post->expected_amount}}</td>
                    <td>{{$post->days}}</td>
                    <td>{{$post->location_name}}</td>
                    <td>{{$post->class_name}}</td>
                    <td>{{$post->experience}}</td>
                    <td>{{$post->subject}}</td>



                    <td>
                        <div class="btn btn-default">
                            <a href="{{ url('/post/edit',[$post->id,'edit']) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
                        </div>

                        <div class="btn btn-danger">
                            <a class="delete_link" href="{{ url('/post/delete',[$post->id,'delete']) }}"><i class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                        </div>
                    </td>

                </tr>
            @endforeach

        </table>
        {{--{{ $users->links() }}--}}
    </div>

@endsection

@section('js')

@endsection