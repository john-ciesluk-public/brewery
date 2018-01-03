@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        Please fix the following errors
    </div>
@endif

{!! csrf_field() !!}
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title', isset($beer->title) ? $beer->title : null) }}">
    </div>
    @if($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <textarea class="form-control" name="description" rows="5">{{ old('description', isset($beer->description) ? $beer->description : null) }}</textarea>
    </div>
    @if($errors->has('description'))
        <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="image" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="image" placeholder="Image Name (.jpg)" value="{{ old('image', isset($beer->image) ? $beer->image : null) }}">
    </div>
    @if($errors->has('image'))
        <span class="help-block">{{ $errors->first('image') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('ibu') ? ' has-error' : '' }}">
    <label for="ibu" class="col-sm-2 control-label">IBU</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="ibu" placeholder="IBU" value="{{ old('ibu', isset($beer->ibu) ? $beer->ibu : null) }}">
    </div>
    @if($errors->has('ibu'))
        <span class="help-block">{{ $errors->first('ibu') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('og') ? ' has-error' : '' }}">
    <label for="og" class="col-sm-2 control-label">OG</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="og" placeholder="OG" value="{{ old('og', isset($beer->og) ? $beer->og : null) }}">
    </div>
    @if($errors->has('og'))
        <span class="help-block">{{ $errors->first('og') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('abv') ? ' has-error' : '' }}">
    <label for="abv" class="col-sm-2 control-label">ABV</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="abv" placeholder="ABV" value="{{ old('abv', isset($beer->abv) ? $beer->abv : null) }}">
    </div>
    @if($errors->has('abv'))
        <span class="help-block">{{ $errors->first('abv') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('hops') ? ' has-error' : '' }}">
    <label for="hops" class="col-sm-2 control-label" data-toggle="tooltip" data-placement="right" title="Separate by comma. ie(fuggle,cascade)">Hops</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="hops" placeholder="Hops" id="hops" value="{{ old('hops', isset($hops) ? $hops : '') }}">
    </div>
    @if($errors->has('hops'))
        <span class="help-block">{{ $errors->first('hops') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('malts') ? ' has-error' : '' }}">
    <label for="malts" class="col-sm-2 control-label" data-toggle="tooltip" data-placement="right" title="Separate by comma. ie(dark,light)">Malts/Grains</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="malts" placeholder="Malts"  id="malts" value="{{ old('malts', isset($malts) ? $malts : null) }}">
    </div>
    @if($errors->has('malts'))
        <span class="help-block">{{ $errors->first('malts') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('calories') ? ' has-error' : '' }}">
    <label for="calories" class="col-sm-2 control-label">Calories</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="calories" placeholder="Calories" value="{{ old('calories', isset($beer->calories) ? $beer->calories : null) }}">
    </div>
    @if($errors->has('calories'))
        <span class="help-block">{{ $errors->first('calories') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    <label for="type" class="col-sm-2 control-label">Type</label>
    <div class="col-sm-10">
        <select class="form-control" name="type">
            @foreach ($beerTypes as $key => $type)
            <option value="{{ $key }}" {{ isset($beer->type) && $beer->type == $key ? 'selected="selected"' : null }}>{{ $type }}</option>
            @endforeach
        </select>
    </div>
    @if($errors->has('type'))
        <span class="help-block">{{ $errors->first('type') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('available') ? ' has-error' : '' }}">
    <label for="available" class="col-sm-2 control-label">On Tap</label>
    <div class="col-sm-10">
        <select class="form-control" name="available">
            @foreach ($boolean as $key => $bool)
            <option value="{{ $key }}" {{ isset($beer->available) && $beer->available == $key ? 'selected="selected"' : null }}>{{ $bool }}</option>
            @endforeach
        </select>
    </div>
    @if($errors->has('available'))
        <span class="help-block">{{ $errors->first('available') }}</span>
    @endif
</div>
<div class="form-group{{ $errors->has('deleted') ? ' has-error' : '' }}">
    <label for="deleted" class="col-sm-2 control-label">Deleted</label>
    <div class="col-sm-10">
        <select class="form-control" name="deleted">
            @foreach ($boolean as $key => $bool)
            <option value="{{ $key }}" {{ isset($beer->deleted) && $beer->deleted == $key ? 'selected="selected"' : null }}>{{ $bool }}</option>
            @endforeach
        </select>
    </div>
    @if($errors->has('deleted'))
        <span class="help-block">{{ $errors->first('deleted') }}</span>
    @endif
</div>
