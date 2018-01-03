@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        Please fix the following errors
    </div>
@endif

{!! csrf_field() !!}
<div class="form-group{{ $errors->has('malt') ? ' has-error' : '' }}">
    <label for="malt" class="col-sm-2 control-label">Malt</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="malt" placeholder="Malt" value="{{ old('malt', isset($malt->malt) ? $malt->malt : null) }}">
    </div>
    @if($errors->has('malt'))
        <span class="help-block">{{ $errors->first('malt') }}</span>
    @endif
</div>
