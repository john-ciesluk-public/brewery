@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h2>Mailing List Subscribers</h2>
        @foreach ($mailingList as $list)
            {{ $list['email'] }}<br />
        @endforeach
    </div>
</div>
@endsection
