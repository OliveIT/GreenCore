<form class="form-horizontal" method="POST" action="{{ route('add-switch-account-post') }}">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="street">Street Address</label>
        <input id="street" type="text" class="form-control" name="street" value="{{ $data ['street'] }}" required autofocus placeholder="Street Address">
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="city">City</label>
            <input id="city" type="text" class="form-control" name="city" value="{{ $data ['city'] }}" required placeholder="City">
        </div>

        <div class="form-group col-md-4">
            <label for="state">State</label>
            <select id="state" class="form-control" name="state" value="{{ $data ['state'] }}" required>
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="zipcode">Zip Code</label>
        <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ $data ['zipcode'] }}" required placeholder="Zip Code">
    </div>

    <div class="form-group">
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
        <input id="utility_password" type="text" class="form-control" name="utility_password" placeholder="Utility Password" {{ $newItem ? 'required' : '' }}>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-outline-primary btn-lg">
            Add Account
        </button>
    </div>
</form>