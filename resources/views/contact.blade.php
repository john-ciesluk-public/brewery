@extends('layouts.app')
@section('content')
<h2>Contact Us</h2>
<hr />
<div class="row">
	<div class="col-sm-6">
    <p align="justify">
    	Write, call, email, or stop by with any questions and we will be happy to help you.
    </p>
    <form action="/contact-us" method="post">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Please fix the following errors
            </div>
        @endif
		@if (session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
        {!! csrf_field() !!}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" placeholder="Message">{{ old('message') }}</textarea>
            @if($errors->has('message'))
                <span class="help-block">{{ $errors->first('message') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-default">Send</button>
    </form>
	</div>
	<div class="col-sm-5 col-sm-offset-1">
		<address>
			<strong>{{ config('sitedata.address.title') }}</strong>
			<br>
			{{ config('sitedata.address.address1') }}
			<br />
			@if (config('sitedata.address.address2'))
			{{ config('sitedata.address.address2') }}
			<br />
			@endif
			{{ config('sitedata.address.city') }}, {{ config('sitedata.address.state') }} {{ config('sitedata.address.zipcode') }}
			<br>
			<abbr title="Phone">P:</abbr> {{ config('sitedata.address.phone') }}
			<br />
			<a href="mailto:{{ config('sitedata.email') }}">{{ config('sitedata.email') }}</a>
		</address>
	</div>
</div>
<h3>&nbsp;</h3>
@endsection
