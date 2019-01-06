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
    <section class="content">
        <div class="container">
            <h2>Edit Profile</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'form','url'=> 'user/edit/ ' . $userById->id . '/update']) !!}
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('name')?'has-error':''}}">
                                <label>User name</label>
                                <input type="text" name="name" class="form-control" value="{{$userById->name}}">
                                <p class="help-block">{{$errors->first('name')}}</p>
                            </div>

                            <div class="form-group {{$errors->has('email')?'has-error':''}}">
                                <label>User email</label>
                                <input type="text" name="email" class="form-control" value="{{$userById->email}}">
                                <p class="help-block">{{$errors->first('email')}}</p>
                            </div>

                            <div class="form-group {{$errors->has('phone_number')?'has-error':''}}">
                                <label>User phone number</label>
                                <input type="text" name="phone_number" class="form-control"
                                       value="{{$userById->phone_number}}">
                                <p class="help-block">{{$errors->first('phone_number')}}</p>
                            </div>

                            <div class="form-group {{$errors->has('last_level_education')?'has-error':''}}">
                                <label>Last laval of education</label>
                                <select name="last_level_education" id="last_level_education"
                                        data-live-search="true"
                                        data-size="6"
                                        class="form-control selectpicker">
                                    <option value="MS">MS</option>
                                    <option value="BSC">BSC</option>
                                    <option value="B Com">B Com</option>
                                    <option value="HSC">HSC</option>
                                    <option value="SSC">SSC</option>
                                </select>
                                <p class="help-block">{{$errors->first('last_level_education')}}</p>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('location_id')?'has-error':''}}">
                                <label>Select location</label>
                                <a href="{{url('/location/create')}}" class="pull-right">+ Add New</a>
                                <select name="location_id" title="Select location"
                                        data-live-search="true"
                                        data-size="6"
                                        class="form-control">
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                                <p class="help-block">{{$errors->first('location_id')}}</p>
                            </div>

                            <div class="form-group {{$errors->has('user_role')?'has-error':''}}">
                                <label>Select Role</label>
                                <select name="user_role" id="user_role"
                                        data-live-search="true"
                                        data-size="6"
                                        class="form-control selectpicker">
                                    <option value="Student">Student</option>
                                    <option value="Teacher">Teacher</option>
                                </select>
                                <p class="help-block">{{$errors->first('user_role')}}</p>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <button type="reset" value="Reset" class="btn btn-warning pull-left"><i
                                            class="fa fa-eraser"></i> Clear
                                </button>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Update
                                    User
                                </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
    <script type="javascript/text">

     $('select[name=user_role]').selectpicker('val', '{{ $userById->user_role}}');

    </script>
@endsection