@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Delete Hop{{ $hop->hop }}</h2>
		<form class="form-horizontal" method="post" action="/admin/hops/postDelete/{{ $hop->id }}">
			{!! csrf_field() !!}
			<div class="form-group">
				<label for="delete" class="col-sm-2 control-label">Are you sure?</label>
			    <div class="col-sm-10">
					<button type="submit" class="btn btn-brown">Yes</button>
					<a href="/admin/hops" class="btn btn-default">No</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
