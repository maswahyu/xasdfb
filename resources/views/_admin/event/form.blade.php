@section('header')
<!-- Date Picker -->
<link rel="stylesheet" href="/dist/plugins/datepicker/datepicker3.css">
@endsection
<div class="form-group">
    <label for="title">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" placeholder="{{ucfirst('title')}}" value="{{ isset($event->title) ? $event->title : old('title') }}" required>
    <span class="text-danger">{{ $errors->first('title') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Image' }}
    </label>
    @if(isset($event->image))
        <img src="{{ imageview($event->image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image">Browse</button> 
        </div>
        <input id="image_path" name="image" type="text" class="form-control" value="{{ isset($event->image) ? $event->image : old('image') }}" placeholder="Image" required>
    </div>
    <span class="text-danger">{{ $errors->first('image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="summary">{{ 'Summary' }}</label>
    <textarea class="form-control" rows="5" name="summary" type="textarea" id="summary" placeholder="{{ucfirst('summary')}}" >{{ isset($event->summary) ? $event->summary : old('summary') }}</textarea>
    <span class="text-danger">{{ $errors->first('summary') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="publish">Start Date</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-calendar"></i>
          </span>
        </div>
        <input class="form-control float-right input-datepicker" name="start_at" type="text" id="start_at" value="{{ isset($event->start_at) ? $event->start_at_date : old('start_at') }}" placeholder="Start Date" autocomplete="off" required>
    </div>
    <span class="text-danger">{{ $errors->first('start_at') }}</span>
    <p class="help-block"></p>
</div>


<div class="form-group">
    <label for="publish">End Date</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-calendar"></i>
          </span>
        </div>
        <input class="form-control float-right input-datepicker" name="end_at" type="text" id="end_at" value="{{ isset($event->end_at) ? $event->end_at_date : old('end_at') }}" placeholder="End Date" autocomplete="off" required>
    </div>
    <span class="text-danger">{{ $errors->first('end_at') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control" id="publish">
        <option value="1" {{ (isset($event->publish) && $event->publish == 1) ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($event->publish) && $event->publish == 0) ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="content">{{ 'Content' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" placeholder="{{ucfirst('content')}}" >{{ isset($event->content) ? $event->content : old('content') }}</textarea>
    <span class="text-danger">{{ $errors->first('content') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
