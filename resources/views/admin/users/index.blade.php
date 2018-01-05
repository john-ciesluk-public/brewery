@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <h2>Users&nbsp;<a href="/admin/users/create" class="btn btn-default pull-right">New User</a></h2>
        @if (session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
        @if ($users)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="/admin/users/update/{{ $user['id'] }}" class="btn btn-brown">Update</a>
                            <a href="/admin/users/delete/{{ $user['id'] }}" class="btn btn-danger">Delete</a>
                        </td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            No users yet.
        @endif
    </div>
</div>
@endsection
