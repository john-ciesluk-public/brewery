@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xs-12 text-center row-margin">
        <span class="title">{{ $configVariables->company }}</span>
        <br />
        <span class="title-secondary">Brewing Company</span>
        {!! $description['description'] !!}
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 text-center row-margin">
        <div class="one-third-left dark-link">
            <h2>Currently on Tap</h2>
            <hr />
            @foreach ($beers as $beer)
                <a href="/beers#{{ $beer['slug'] }}">{{ $beer['title'] }}</a>
                <br />
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 text-center row-margin">
        <div class="one-third-right dark-link">
            <h2>Upcoming Events</h2>
            <hr />
            @if ($upcomingEvents)
                @foreach ($upcomingEvents as $event)
                    <a href="/events#{{ $event['slug'] }}">{{ $event['title'] }}</a>
                    <br />
                @endforeach
            @else
                There are currently no upcoming events.
            @endif
        </div>
    </div>
</div>
@endsection
