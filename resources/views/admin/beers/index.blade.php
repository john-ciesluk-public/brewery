@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <h2>Beers&nbsp;<a href="/admin/beers/create" class="btn btn-default pull-right">New Beer</a></h2>
        @if (session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
        @if ($beers)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Hops</th>
                    <th>Malts/Grains</th>
                    <th>IBU</th>
                    <th>OG</th>
                    <th>ABV</th>
                    <th>Calories</th>
                    <th>Description</th>
                    <th>Deleted</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($beers as $beer)
                <tr>
                    <td><a href="/admin/beers/update/{{ $beer['slug'] }}" class="btn btn-brown">Update</a></td>
                    <td><img class="img img-responsive" src="/img/beers/{{ $beer['image'] }}"></td>
                    <td>{{ $beer['title'] }}</td>
                    <td>
                        @foreach ($hops as $hop)
                            {{ $hop['beers_id'] == $beer['id'] ? $hop['hop'].',' : '' }}
                        @endforeach
                    </td>
                    <td>
                        @foreach ($malts as $malt)
                            {{ $malt['beers_id'] == $beer['id'] ? $malt['malt'].',' : '' }}
                        @endforeach
                    </td>
                    <td>{{ $beer['ibu'] }}</td>
                    <td>{{ $beer['og'] }}</td>
                    <td>{{ $beer['abv'] }}</td>
                    <td>{{ $beer['calories'] }}</td>
                    <td>{{ $beer['description'] }}</td>
                    <td>@if ($beer['deleted'])<span class="red">yes</span>@else No @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            No beers yet.
        @endif
    </div>
</div>
@endsection
