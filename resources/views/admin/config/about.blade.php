@extends('layouts.app')
@section('content')
<h2 class="text-center">Update About Page</h2>
<form class="form-horizontal" method="post" action="/admin/config/postAbout">
	<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	    <label for="description" class="col-sm-2 control-label">Description</label>
	    <div class="col-sm-10">
	        <textarea class="form-control" name="description" rows="5">{{ old('description', isset($about->description) ? $about->description : null) }}</textarea>
	    </div>
	    @if($errors->has('description'))
	        <span class="help-block">{{ $errors->first('description') }}</span>
	    @endif
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-brown btn-block">Update</button>
		</div>
	</div>
</form>
@endsection
