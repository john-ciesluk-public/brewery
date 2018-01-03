@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        Please fix the following errors
    </div>
@endif
{!! csrf_field() !!}
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title', isset($event->title) ? $event->title : null) }}">
    </div>
    @if($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="description" rows="5">{{ old('description', isset($event->description) ? html_entity_decode($event->description) : null) }}</textarea>
    </div>
    @if($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('event_date') ? ' has-error' : '' }}">
    <label for="event_date" class="col-sm-2 control-label">Event Date</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="event_date" placeholder="Date" id="datetimepicker" value="{{ old('event_date', isset($event->event_date) ? $event->event_date : null) }}">
    </div>
    @if($errors->has('event_date'))
        <span class="help-block">{{ $errors->first('event_date') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('deleted') ? ' has-error' : '' }}">
    <label for="deleted" class="col-sm-2 control-label">Deleted</label>
    <div class="col-sm-10">
        <select class="form-control" name="deleted">
            @foreach ($boolean as $key => $bool)
            <option value="{{ $key }}" {{ isset($event->deleted) && $event->deleted == $key ? 'selected="selected"' : null }}>{{ $bool }}</option>
            @endforeach
        </select>
    </div>
    @if($errors->has('deleted'))
        <span class="help-block">{{ $errors->first('deleted') }}</span>
    @endif
</div>
