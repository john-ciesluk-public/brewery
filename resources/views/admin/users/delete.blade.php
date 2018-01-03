@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-12">
		<h2>Delete User {{ $user->name }}</h2>
		<form class="form-horizontal" method="post" action="/admin/users/postDelete/{{ $user->id }}">
			{!! csrf_field() !!}
			<div class="form-group">
				<label for="delete" class="col-sm-2 control-label">Are you sure?</label>
			    <div class="col-sm-10">
					<button type="submit" class="btn btn-brown">Yes</button>
					<a href="/admin/users" class="btn btn-default">No</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
