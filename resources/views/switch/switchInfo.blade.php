<form class="form-horizontal" method="POST" action="{{ $newItem ? route('add-switch-account-post') : route('edit-switch-account-post') }}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus placeholder="Name">
    </div>

    <div class="form-group">
        <label for="street">Street Address</label>
        <input id="street" type="text" class="form-control" name="address1" value="{{ $data->address1 }}" required placeholder="Street Address">
    </div>

    <div class="form-group">
        <label for="suite">Apt/Suite</label>
        <input id="suite" type="text" class="form-control" name="address2" value="{{ $data->address2 }}" required placeholder="Apt/Suite">
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="city">City</label>
            <input id="city" type="text" class="form-control" name="city" value="{{ $data->city }}" required placeholder="City">
        </div>

        <div class="form-group col-md-4">
            <label for="state">State</label>
            <select id="state" class="form-control" name="state" value="{{ $data->state }}" required>
                @foreach ($geonames as $geoname)
                <option value="{{ $geoname->state }}" {{ $data->state == $geoname->state ? "selected" : "" }}>{{ $geoname->state }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="zipcode">Postal Code</label>
        <input id="zipcode" type="text" class="form-control" name="postal_code" value="{{ $data->postal_code }}" required placeholder="Zip Code">
    </div>

    <?php /*<div class="form-group">
        {!! Form::Label('utility_company_id', 'Utility Company') !!}
        <select id="utility_company_id" class="form-control" name="utility_company_id" value="{{ $data ['utility_company_id'] }}" required>
            @foreach($utility_company as $utility)
            <option value="{{ $utility->id }}">{{ $utility->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="utility_user">Utility User</label>
        <input id="utility_user" type="text" class="form-control" name="utility_user" placeholder="Utility User" {{ $newItem ? 'required' : '' }}>
    </div>

    <div class="form-group">
        <label for="utility_password">Utility Password</label>
        <input id="utility_password" type="password" class="form-control" name="utility_password" placeholder="Utility Password" {{ $newItem ? 'required' : '' }}>
    </div>*/?>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary">
            {{ $newItem ? "Add Account" : "Change Account" }}
        </button>
        @if (!$newItem)
        <a class="btn btn-outline-primary" href="{{ url('/profile') }}">
            Back
        </a>
        @endif
    </div>
</form>