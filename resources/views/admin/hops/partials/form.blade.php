@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        Please fix the following errors
    </div>
@endif

{!! csrf_field() !!}
<div class="form-group{{ $errors->has('hop') ? ' has-error' : '' }}">
    <label for="hop" class="col-sm-2 control-label">Hop</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="hop" placeholder="Hop" value="{{ old('hop', isset($hop->hop) ? $hop->hop : null) }}">
    </div>
    @if($errors->has('hop'))
        <span class="help-block">{{ $errors->first('hop') }}</span>
    @endif
</div>
