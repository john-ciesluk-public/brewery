@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-sm-12">
        <h2>About Us</h2>
        <hr />
        {!! $description['description'] !!}
    </div>
</div>
@endsection
