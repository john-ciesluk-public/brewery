@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<h2 class="text-center">Update Beer</h2>
		<form class="form-horizontal" method="post" action="/admin/beers/postUpdate/{{ $slug }}">
			@include('admin/beers/partials/form')
			<input type="hidden" id="hopsIds" name="hops_ids" value="{{ old('hopsIds', $hopsIds) }}">
			<input type="hidden" id="maltsIds" name="malts_ids" value="{{ old('maltsIds', $maltsIds) }}">
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-brown btn-block">Update</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
