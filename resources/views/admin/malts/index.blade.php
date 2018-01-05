@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <h2>Malts&nbsp;<a href="/admin/malts/create" class="btn btn-default pull-right">New Malt</a></h2>
        @if (session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
        @if ($malts)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Malt</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($malts as $malt)
                    <tr>
                        <td>
                            <a href="/admin/malts/update/{{ $malt['id'] }}" class="btn btn-brown">Update</a>
                            <a href="/admin/malts/delete/{{ $malt['id'] }}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>{{ $malt['malt'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            No malts yet.
        @endif
    </div>
</div>
@endsection
