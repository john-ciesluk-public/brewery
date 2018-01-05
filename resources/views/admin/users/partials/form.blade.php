@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        Please fix the following errors
    </div>
@endif

{!! csrf_field() !!}
<div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="name" placeholder="user" value="{{ old('name', isset($user->name) ? $user->name : null) }}">
    </div>
    @if($errors->has('name'))
        <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="email" value="{{ old('email', isset($user->email) ? $user->email : null) }}">
    </div>
    @if($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" name="password" placeholder="password">
    </div>
    @if($errors->has('password'))
        <span class="help-block">{{ $errors->first('password') }}</span>
    @endif
</div>
<div class="form-group">
    <label for="password-confirm" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-10">
        <input id="password-confirm" type="password" class="form-control" placeholder="confirm password" name="password_confirmation">
    </div>
</div>
