@extends('layouts.app')
@section('title')
    Register
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="mb-3">
            <h5><b>Step 1:</b> Create or update account with local electric utility</h5>
            <p class="text-muted">If still with (Utility Company) go to www.utilitycompany.com or call 123­456­7890</p>
        </div>
        
        <div class="mb-3">
            <h5><b>Step 2:</b> Add or Update information</h5>
        </div>

        @include('switch.switchInfo', [
                'data' => $data, 
                'geonames' => $geonames,
                'utility_company' => $utility_company,
                'newItem' => true])
    </div>
</div>
@endsection
