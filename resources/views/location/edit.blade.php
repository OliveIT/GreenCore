@extends('layouts.app')

@section('title')
    Edit location
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
            <h2>Edit Location</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'form','url'=> 'location/edit/ ' . $locationById->id . '/update']) !!}
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group {{$errors->has('location_name')?'has-error':''}}">
                                <label>Location Name</label>
                                <input type="text" name="location_name" class="form-control" value="{{$locationById->location_name}}">
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