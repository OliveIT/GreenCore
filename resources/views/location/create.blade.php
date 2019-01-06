@extends('layouts.app')

@section('title')
    Add location
@endsection

@section('message')

    @if(Session::has('message'))
        <div class="col-m-10">
            <div  class="alert alert-success" role="alert">
                {{session::get('message')}}
            </div>
        </div>
    @endif

@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="btn-group pull-right">
                <a href="{{url('location/view')}}" class="btn btn-primary btn-flat"><i class="fa fa-list"></i>
                    View Location</a>
            </div>
            <br>
            <br>
            <h2>Add  Location</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'form','url'=> '/location/create']) !!}
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group {{$errors->has('location_name')?'has-error':''}}">
                                <label>Location Name</label>
                                <input type="text" name="location_name" class="form-control" value="{{old('location_name')}}">
                                <p class="help-block">{{$errors->first('location_name')}}</p>
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <button type="reset" value="Reset" class="btn btn-warning pull-left"><i
                                            class="fa fa-eraser"></i> Clear
                                </button>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Add Location
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

@endsection