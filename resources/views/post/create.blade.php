@extends('layouts.app')

@section('title')
    Add Post
@endsection
@section('message')

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{session::get('message')}}
        </div>
    @endif

@endsection
@section('errors')

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="btn-group pull-right">
                <a href="{{url('post/view')}}" class="btn btn-primary btn-flat"><i class="fa fa-list"></i>
                    View Post</a>
            </div>
            <h2>Add Post</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'form','url'=> '/post/create']) !!}
                        <div class="col-md-6">
                            @if(auth()->user()->user_role == 'Student' || auth()->user()->user_role == 'Admin')
                                <div class="form-group {{$errors->has('teacher_type')?'has-error':''}}">
                                    <label>Teacher Type</label>
                                    <select name="teacher_type" id="teacher_type"
                                            class="form-control selectpicker">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <p class="help-block">{{$errors->first('teacher_type')}}</p>
                                </div>
                            @endif

                            @if(auth()->user()->user_role == 'Teacher' || auth()->user()->user_role == 'Admin')
                                <div class="form-group {{$errors->has('looking')?'has-error':''}}">
                                    <label>Looking For</label>
                                    <select name="looking" id="looking" onchange="decideView(this.value)"
                                            class="form-control selectpicker">
                                        <option value="Tuition">Tuition</option>
                                        <option value="Batch">Batch</option>
                                    </select>
                                    <p class="help-block">{{$errors->first('teacher_type')}}</p>
                                </div>

                                <div class="form-group {{$errors->has('available_sit')?'has-error':''}}">
                                    <label>Available Sit</label>
                                    <input type="number" name="available_sit" id="available_sit" class="form-control" value="{{old('available_sit')}}">
                                    <p class="help-block">{{$errors->first('available_sit')}}</p>
                                    <p class="help-block">If you are looking for batch then enter available sit</p>
                                </div>

                            @endif




                            <div class="form-group {{$errors->has('expected_amount')?'has-error':''}}">
                                <label>Amount</label>
                                <input type="number" name="expected_amount" class="form-control" value="{{old('expected_amount')}}">
                                <p class="help-block">{{$errors->first('expected_amount')}}</p>
                            </div>

                            <div class="form-group {{$errors->has('days')?'has-error':''}}">
                                <label>Days</label>
                                <input type="number" name="days" class="form-control" value="{{old('days')}}">
                                <p class="help-block">{{$errors->first('days')}}</p>
                            </div>

                            <div class="form-group {{$errors->has('class')?'has-error':''}}">
                                <label>Class</label>
                                <input type="number" name="class" class="form-control" value="{{old('class')}}">
                                <p class="help-block">{{$errors->first('class')}}</p>
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

                            <div class="form-group {{$errors->has('experience')?'has-error':''}}">
                                <label>Experience</label>
                                <input type="number" name="experience" class="form-control" value="{{old('experience')}}">
                                <p class="help-block">{{$errors->first('experience')}}</p>
                            </div>
                            <div class="form-group {{$errors->has('subject')?'has-error':''}}">
                                <label>Subject</label>
                                <textarea name="subject" class="form-control"
                                          rows="5">{{old('subject')}}</textarea>
                                <p class="help-block">{{$errors->first('subject')}}</p>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <button type="reset" value="Reset" class="btn btn-warning pull-left"><i
                                            class="fa fa-eraser"></i> Clear
                                </button>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create Post
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


    </script>
@endsection