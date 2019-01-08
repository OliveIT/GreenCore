@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if(auth()->user()->user_role == 'Admin')
            You are Administrator!
        @else
            You are logged in!
        @endif
        <br>
        <br>
        <br>
        @if(auth()->user()->verified == '0')
            <div class="alert alert-danger">

                please <strong> verify </strong> your account.Without verification you can not
                submit your post!

            </div>
        @endif
    </div>
</div>
@endsection
