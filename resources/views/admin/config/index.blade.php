@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <h2>Site Configuration &nbsp; @if (!$config) <a href="/admin/config/create" class="btn btn-default pull-right">New config</a> @endif</h2>
        @if (session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
        @if ($config)
            <a href="/admin/config/update/{{ $config['id'] }}" class="btn btn-brown">Update</a>
        @else
            No configs yet.
        @endif
    </div>
</div>
@endsection
