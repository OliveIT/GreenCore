@extends('layouts.public')

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
                @foreach($accounts as $account)
                @if (!$account->is_deleted)
                <label class="btn btn-outline-primary btn-lg w-100 btn-account" data-id="{{ $account->id }}">
                    <input type="radio" name="options" autocomplete="off" checked> {{ $account->address1 }} - {{ $account->address2 }}
                </label>
                @endif
                @endforeach
                
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
    $(".btn-account").bind("click", function(e) {
        const accountId = $(this).data("id");
        window.open(`{{ url('/switch/set') }}/${accountId}`, "_self");
    })
})
</script>
@endsection