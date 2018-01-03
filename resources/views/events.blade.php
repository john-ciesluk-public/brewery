@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <div class="row dark-link events">
            <div class="col-sm-6 text-center">
                <h3>Upcoming Events</h3>
                <hr />
                @if ($upcomingEvents)
                    @foreach($upcomingEvents as $event)
                        <div>
                            <input type="hidden" class="description" value="{{ $event['description'] }}">
                            <input type="hidden" class="title" value="{{ $event['title'] }}">
                            <a href="#" class="events-modal" data-toggle="modal" data-target="#eventsModal">{{ $event['title'] }}</a>
                        </div>
                    @endforeach
                @else
                    <p class="lead">There are no upcoming events</p>
                @endif
            </div>
            <div class="col-sm-6 text-center">
                <h3>Past Events</h3>
                <hr />
                @if ($pastEvents)
                    @foreach($pastEvents as $event)
                        <div>
                            <input type="hidden" class="description" value="{{ $event['description'] }}">
                            <input type="hidden" class="title" value="{{ $event['title'] }}">
                            <a href="#" class="events-modal" data-toggle="modal" data-target="#eventsModal">{{ $event['title'] }}</a>
                        </div>
                    @endforeach
                @else
                    <p class="lead">There are no past events</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
