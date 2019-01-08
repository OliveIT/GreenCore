@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mx-auto mt-4">
                <h2 class="text-center">Add Account</h2>
            </div>

            @include('switch.switchInfo', [
                'data' => $data, 
                'geonames' => $geonames,
                'utility_company' => $utility_company,
                'newItem' => true])
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection