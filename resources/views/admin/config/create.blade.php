@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h2 class="text-center">Create New Config</h2>
		<form class="form-horizontal" method="post" action="/admin/config/postCreate">
			@include('admin/config/partials/form')
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-brown btn-block">Create</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
