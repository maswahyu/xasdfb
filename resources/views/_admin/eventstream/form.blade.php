<div class="form-group">
    <label for="name">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($eventstream->name) ? $eventstream->name : old('name') }}" required>
    <span class="text-danger">{{ $errors->first('name') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-group">
    <label for="slug">{{ 'Slug' }}</label>
    <input class="form-control" name="slug" type="text" id="slug" placeholder="{{ucfirst('slug')}}" value="{{ isset($eventstream->slug) ? $eventstream->slug : old('slug') }}" required>
    <span class="text-danger">{{ $errors->first('slug') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-group">
    <label for="yt_link">{{ 'Yt Link' }}</label>
    <input class="form-control" name="yt_link" type="text" id="yt_link" placeholder="{{ucfirst('yt_link')}}" value="{{ isset($eventstream->yt_link) ? $eventstream->yt_link : old('yt_link') }}" required>
    <span class="text-danger">{{ $errors->first('yt_link') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-group ">
    <label>
         {{ 'Thumbnail' }}
    </label>
    @if(isset($eventstream->thumbnail))
        <img src="{{ imageview($eventstream->thumbnail) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image">Browse</button>
        </div>
        <input id="image_path" name="thumbnail" type="text" class="form-control form-control-sm" value="{{ isset($eventstream->thumbnail) ? $eventstream->thumbnail : old('thumbnail') }}" placeholder="Thumbnail">
    </div>
    <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-row">
    <div class="col-6">
        <div class="form-group">
            <label for="periode_start">{{ 'Periode Start' }}</label>
            <input class="form-control" name="periode_start" type="datetime-local" id="periode_start" placeholder="{{ucfirst('periode_start')}}" value="{{ isset($eventstream->periode_start) ? Str::replaceArray(' ', ['T'], $eventstream->periode_start) : old('periode_start') }}" required>
            <span class="text-danger">{{ $errors->first('periode_start') }}</span>
            <p class="help-block"></p>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="periode_end">{{ 'Periode End' }}</label>
            <input class="form-control" name="periode_end" type="datetime-local" id="periode_end" placeholder="{{ucfirst('periode_end')}}" value="{{ isset($eventstream->periode_end) ? Str::replaceArray(' ', ['T'], $eventstream->periode_end) : old('periode_end') }}" required>
            <span class="text-danger">{{ $errors->first('periode_end') }}</span>
            <p class="help-block"></p>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="event_date">{{ 'Event Date' }}</label>
    <input class="form-control" name="event_date" type="datetime-local" id="event_date" placeholder="{{ucfirst('event_date')}}" value="{{ isset($eventstream->event_date) ? Str::replaceArray(' ', ['T'], $eventstream->event_date) : old('event_date') }}" required>
    <span class="text-danger">{{ $errors->first('event_date') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-group">
    <label for="live_chat">{{ 'Live Chat' }}</label>
    <select name="live_chat" class="form-control form-control-sm" id="live_chat">
        <option value="1" {{ (isset($eventstream->live_chat) && $eventstream->live_chat == '1') ? 'selected' : '' }}>Enable</option>
        <option value="0" {{ (isset($eventstream->live_chat) && $eventstream->live_chat == '0') ? 'selected' : '' }}>Disable</option>
    </select>
    <span class="text-danger">{{ $errors->first('live_chat') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-group">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control form-control-sm" id="publish">
        <option value="1" {{ (isset($eventstream->publish) && $eventstream->publish == '1') ? 'selected' : '' }}>Publish</option>
        <option value="0" {{ (isset($eventstream->publish) && $eventstream->publish == '0') ? 'selected' : '' }}>Unpublish</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
