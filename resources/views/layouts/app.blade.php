<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $configVariables->company }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
<body>
	<div id="app">
		<div class="container">
			<div class="row row-margin">
				<div class="col-xs-12">
					<div class="header-image home-page-fixed-height">
						<div class="row">
							<div class="col-sm-3">
								<div class="menu text-center">
									<span class="glyphicon glyphicon-grain glyphicon-link" aria-hidden="true"></span>
									<br />
									<a href="{{ url('') }}">Home</a>
									<br />
									<a href="{{ url('events') }}">Events</a>
									<br />
									<a href="{{ url('about') }}">About Us</a>
									<br />
									<a href="{{ url('beers') }}">Our Crafts</a>
									@if (Auth::user())
									<div class="row"><div class="col-sm-10 col-sm-offset-1"><hr /></div></div>
									<a href="{{ url('admin') }}">Admin Home</a>
									<br />
									<a href="{{ url('admin/events') }}">Events</a>
									<br />
									<a href="{{ url('admin/beers') }}">Beers</a>
									<br />
									<a href="{{ url('admin/hops') }}">Hops</a>
									<br />
									<a href="{{ url('admin/malts') }}">Malts/Grains</a>
									<br />
									<a href="{{ url('admin/mailinglist') }}">Mailing List</a>
									<br />
									<a href="{{ url('admin/statistics') }}">Statistics</a>
									<br />
									<a href="{{ url('admin/users') }}">Users</a>
									<br />
									<a href="{{ url('admin/config') }}">Site Configuration</a>
									<br />
									<a href="{{ url('logout') }}">Logout</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
			@yield('content')
		</div>
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="footer-color">
							<div class="row">
								<div class="col-sm-4 text-center">
									<p class="lead">Subscribe to our mailing list</p>
									<form class="form-inline" id="subscribe-form">
										{!! csrf_field() !!}
										<div class="input-group">
											<div class="input-group-addon">Email</div>
											<input type="email" class="form-control" name="email" id="email" placeholder="Email">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-tan btn-subscribe">
													<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
												</button>
											</span>
										</div>
									</form>
								</div>
								<div class="col-sm-4 text-center">
									@if (Auth::user())
									<a href="{{ url('logout') }}">Logout</a>
									@else
									<a href="{{ url('login') }}">Login</a>
									@endif
									<br />
									<a href="{{ url('contact-us') }}">Contact Us</a>
									<br />
									<a href="{{ url('jobs') }}">Employment</a>
								</div>
								<div class="col-sm-4 text-center">
									<address>
										<strong>{{ $configVariables->address_title }}</strong>
										<br>
										{{ $configVariables->address_line1 }}
										<br />
										@if ($configVariables->address_line2)
										{{ $configVariables->address_line2 }}
										<br />
										@endif
										{{ $configVariables->address_city }}, {{ $configVariables->address_state }} {{ $configVariables->address_zipcode }}
										<br>
										<abbr title="Phone">P:</abbr> {{ $configVariables->address_phone }}
										<br />
										<a href="mailto:{{ $configVariables->email }}">{{ $configVariables->email }}</a>
									</address>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	@include('layouts.modals')
	@include('layouts.scripts')
</body>
</html>
