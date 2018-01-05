@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <h2>Hops&nbsp;<a href="/admin/hops/create" class="btn btn-default pull-right">New Hop</a></h2>
        @if (session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
        @if ($hops)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Hop</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hops as $hop)
                    <tr>
                        <td>
                            <a href="/admin/hops/update/{{ $hop['id'] }}" class="btn btn-brown">Update</a>
                            <a href="/admin/hops/delete/{{ $hop['id'] }}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>{{ $hop['hop'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            No hops yet.
        @endif
    </div>
</div>
@endsection
