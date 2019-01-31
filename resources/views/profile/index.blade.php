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
                <div class="mr-auto bd-highlight">
                    <p><b>Name</b></p>
                    <p>{{ $account->name }}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto bd-highlight">
                    <p><b>Street</b></p>
                    <p>{{ $account->address1 }} - {{ $account->address2 }}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto bd-highlight">
                    <p><b>Apt / Suite</b></p>
                    <p>{{ $account->address2 }}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto bd-highlight">
                    <p><b>City</b></p>
                    <p>{{ $account->city }}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto bd-highlight">
                    <p><b>State/Province</b></p>
                    <p>{{ $account->state }}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto bd-highlight">
                    <p><b>Postal Code</b></p>
                    <p>{{ $account->postal_code }}</p>
                </div>
            </div>
        </div>

        <div class="mt-3 mb-3">
            <div class="d-flex bd-highlight mb-3">
                <div class="mr-auto bd-highlight">
                    <p><b>Country</b></p>
                    <p>{{ $account->country_id }}</p>
                </div>
                <div class="bd-highlight align-self-center">
                    <a href="{{ url('profile/service') }}" class="btn btn-outline-primary">Change</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
