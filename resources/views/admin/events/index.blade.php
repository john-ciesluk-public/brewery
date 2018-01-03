@extends('layouts.app')
@section('content')
<div class="row row-margin">
    <div class="col-xs-12">
        <h2>Events <a href="/admin/events/create" class="btn btn-default pull-right">New Event</a></h2>
        <hr />
        <h3>Upcoming Events</h3>
        @if ($upcomingEvents)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Title</th>
                    <td>Event Date</th>
                    <th>Description</th>
                    <th>Deleted</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($upcomingEvents as $event)
                <tr>
                    <td><a href="/admin/events/update/{{ $event['id'] }}" class="btn btn-brown">Update</a></td>
                    <td>{{ $event['title'] }}</td>
                    <td>{{ date('F j, Y', strtotime($event['event_date'])) }}</td>
                    <td>{{ $event['description'] }}</td>
                    <td>@if ($event['deleted'])<span class="red">yes</span>@else No @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            There are no upcoming events
        @endif

        <h3>Past Events</h3>

        @if ($pastEvents)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Title</th>
                    <th>Event Date</th>
                    <th>Description</th>
                    <th>Deleted</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pastEvents as $event)
                <tr>
                    <td><a href="/admin/events/update/{{ $event['id'] }}" class="btn btn-brown">Update</a></td>
                    <td>{{ $event['title'] }}</td>
                    <td>{{ date('F j, Y', strtotime($event['event_date'])) }}</td>
                    <td>{{ $event['description'] }}</td>
                    <td>@if ($event['deleted'])<span class="red">yes</span>@else No @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            There are no upcoming events
        @endif
    </div>
</div>
@endsection
