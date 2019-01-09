@extends('layouts.app')
@section('title')
    Register
@endsection

@section('content')
<div class="mx-auto mt-4 mb-4">
    <h2 class="text-center">Profile</h2>
</div>

<div class="row">
    <div class="col-md-6">
        <div>
            <h2><b>{{auth()->user()->name}}</b></h2>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <p><b>User ID/Email</b></p>
                    <p class="text-muted">{{auth()->user()->email}}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <p><b>Password</b></p>
                    <p class="text-muted">************</p>
                </div>
                <div class="p-2 bd-highlight align-self-center">
                    <a href="{{ url('profile/password') }}" class="btn btn-outline-primary">Edit</a>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <p><b>Phone</b></p>
                    <p class="text-muted">{{ auth()->user()->phone_number }}</p>
                </div>
                <div class="p-2 bd-highlight align-self-center">
                    <a href="{{ url('profile/phone') }}" class="btn btn-outline-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto p-2 bd-highlight">
                    <p><b>Service Address</b></p>
                    <select class="form-control">
                        @foreach($accounts as $account)
                        <option value="{{ $account->street }}">{{ $account->street }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2 bd-highlight align-self-center">
                    <a href="{{ url('profile/service') }}" class="btn btn-outline-primary">Need to change your service address?</a>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <p><b>Utility company</b></p>
            <p class="text-muted">{{ Session("switchaccount")->street }}</p>
        </div>

        <div class="mt-3 mb-3">
            <p><b>Utility User ID</b></p>
            <p class="text-muted">{{ Session("switchaccount")->utility_user }}</p>
        </div>

        <div class="mt-3 mb-3">
            <p><b>Utility Password</b></p>
            <p class="text-muted">*********</p>
        </div>
    </div>
</div>
@endsection
