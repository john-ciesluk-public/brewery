@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        Please fix the following errors
    </div>
@endif

{!! csrf_field() !!}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email', isset($config->email) ? $config->email : null) }}">
    </div>
    @if($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
    <label for="company" class="col-sm-2 control-label">Company</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="company" placeholder="Company" value="{{ old('company', isset($config->company) ? $config->company : null) }}">
    </div>
    @if($errors->has('company'))
        <span class="help-block">{{ $errors->first('company') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('address_title') ? ' has-error' : '' }}">
    <label for="address_title" class="col-sm-2 control-label">Address Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="address_title" placeholder="Address Title" value="{{ old('address_title', isset($config->address_title) ? $config->address_title : null) }}">
    </div>
    @if($errors->has('address_title'))
        <span class="help-block">{{ $errors->first('address_title') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('address_line1') ? ' has-error' : '' }}">
    <label for="address_line1" class="col-sm-2 control-label">Address Line1</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="address_line1" placeholder="Address Line1" value="{{ old('address_line1', isset($config->address_line1) ? $config->address_line1 : null) }}">
    </div>
    @if($errors->has('address_line1'))
        <span class="help-block">{{ $errors->first('address_line1') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('address_line2') ? ' has-error' : '' }}">
    <label for="address_line2" class="col-sm-2 control-label">Address Line2</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="address_line2" placeholder="Address Line2" value="{{ old('address_line2', isset($config->address_line2) ? $config->address_line2 : null) }}">
    </div>
    @if($errors->has('address_line2'))
        <span class="help-block">{{ $errors->first('address_line2') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('address_city') ? ' has-error' : '' }}">
    <label for="address_city" class="col-sm-2 control-label">City</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="address_city" placeholder="City" value="{{ old('address_city', isset($config->address_city) ? $config->address_city : null) }}">
    </div>
    @if($errors->has('address_city'))
        <span class="help-block">{{ $errors->first('address_city') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('address_state') ? ' has-error' : '' }}">
    <label for="address_state" class="col-sm-2 control-label">State</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="address_state" placeholder="State" value="{{ old('address_state', isset($config->address_state) ? $config->address_state : null) }}">
    </div>
    @if($errors->has('address_state'))
        <span class="help-block">{{ $errors->first('address_state') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('address_zipcode') ? ' has-error' : '' }}">
    <label for="address_zipcode" class="col-sm-2 control-label">Zipcode</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="address_zipcode" placeholder="Zipcode" value="{{ old('address_zipcode', isset($config->address_zipcode) ? $config->address_zipcode : null) }}">
    </div>
    @if($errors->has('address_zipcode'))
        <span class="help-block">{{ $errors->first('address_zipcode') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('address_phone') ? ' has-error' : '' }}">
    <label for="address_phone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="address_phone" placeholder="Phone #" value="{{ old('address_phone', isset($config->address_phone) ? $config->address_phone : null) }}">
    </div>
    @if($errors->has('address_phone'))
        <span class="help-block">{{ $errors->first('address_phone') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('enable_registration') ? ' has-error' : '' }}">
    <label for="enable_registration" class="col-sm-2 control-label">Enable Registration</label>
    <div class="col-sm-10">
        <select class="form-control" name="enable_registration">
            @foreach ($boolean as $key => $bool)
            <option value="{{ $key }}" {{ isset($config->enable_registration) && $config->enable_registration == $key ? 'selected="selected"' : null }}>{{ $bool }}</option>
            @endforeach
        </select>
    </div>
    @if($errors->has('enable_registration'))
        <span class="help-block">{{ $errors->first('enable_registration') }}</span>
    @endif
</div>
