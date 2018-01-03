@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <h2>Site Configuration</h2>
        @if (session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if ($config)
                            <a href="/admin/config/update/{{ $config['id'] }}" class="btn btn-brown">Update</a>
                        @else
                            <a href="/admin/config/create" class="btn btn-brown pull-right">Setup</a>
                        @endif
                    </td>
                    <td>Global Site Settings</td>
                </tr>
                <tr>
                    <td><a href="/admin/config/about" class="btn btn-brown">Update</a></td>
                    <td>About Page</td>
                </tr>
                <tr>
                    <td><a href="/admin/config/jobs" class="btn btn-brown">Update</a></td>
                    <td>Jobs Page</td>
                </tr>
                <tr>
                    <td><a href="/admin/config/home" class="btn btn-brown">Update</a></td>
                    <td>Home Page</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
