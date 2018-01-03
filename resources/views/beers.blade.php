@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-sm-3">
		<h2 class="text-center">Menu</h2>
		*<span class="red">on tap</span>
		<hr />
		<div class="bordered dark-link">
			<h3>Signature</h3>
		    @if ($signatures)
		        @foreach ($signatures as $signature)
	  				@if ($signature['available']) * @endif<a href="#{{ $signature['slug'] }}">{{ $signature['title'] }}</a>
	  				<br />
				@endforeach
			@else
				None yet
			@endif
			<h3>Seasonal</h3>
			@if ($seasonals)
				@foreach ($seasonals as $seasonal)
					@if ($seasonal['available']) * @endif<a href="#{{ $seasonal['slug'] }}">{{ $seasonal['title'] }}</a>
					<br />
				@endforeach
			@else
				None yet
			@endif
			<h3>Experimental</h3>
			@if ($experimentals)
				@foreach ($experimentals as $experimental)
					@if ($experimental['available']) * @endif<a href="#{{ $experimental['slug'] }}">{{ $experimental['title'] }}</a>
					<br />
				@endforeach
			@else
				None yet
			@endif
		</div>
	</div>
	<div class="col-sm-9">
		<h2>Our Crafts</h2>
		<hr />
		@if ($beers)
			@foreach ($beers as $key => $beer)
				<div class="well
        @if ($key % 2 === 0)
        well-light dark-link dark-text
        @else
        well-dark light-link light-text
        @endif
        ">
					<div class="row">
						<div class="col-sm-4">
							<img class="img img-responsive img-thumbnail" src="/img/beers/{{ $beer['image'] }}">
						</div>
						<div class="col-sm-8">
							<h3 id="{{ $beer['slug'] }}" class="text-center">{{ $beer['title'] }}</h3>
							<dl class="dl-horizontal">
								<dt>IBU:</dt> <dd>{{ $beer['ibu'] }}</dd>
								<dt>OG:</dt> <dd>{{ $beer['og'] }}</dd>
								<dt>ABV:</dt> <dd>{{ $beer['abv'] }}</dd>
								<dt>Hops:</dt>
								<dd>
									@foreach ($hops as $hop)
										{{ $hop['beers_id'] == $beer['id'] ? $hop['hop'].'&nbsp;' : '' }}
									@endforeach
								</dd>
								<dt>Malts/Grains:</dt>
								<dd>
									@foreach ($malts as $malt)
										{{ $malt['beers_id'] == $beer['id'] ? $malt['malt'].'&nbsp;' : '' }}
									@endforeach
								</dd>
							</dl>
							<p align="justify">{{ $beer['description'] }}</p>
						</div>
					</div>
				</div>
      @endforeach
		@else
			No beers yet.
		@endif
	</div>
</div>
@endsection
