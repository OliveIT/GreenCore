@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mx-auto mt-4">
                <h2 class="text-center">Choose Account</h2>
            </div>

            <div class="btn-group-toggle w-100 btn-choose-account" data-toggle="buttons">
                <!-- <label class="btn btn-outline-primary btn-lg active">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
                </label>
                <label class="btn btn-outline-primary btn-lg">
                    <input type="radio" name="options" id="option2" autocomplete="off" checked> Active
                </label> -->
                <label class="btn btn-outline-primary btn-lg w-100" id="option-add">
                    <input type="radio" name="options" autocomplete="off" checked> Add Account
                </label>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(function() {
    $("#option-add").bind("click", function(e) {
        window.open("{{ route('add-switch-account') }}", "_self");
    });
})
</script>
@endsection