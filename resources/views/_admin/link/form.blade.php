<div class="form-group">
    <label for="name">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($link->name) ? $link->name : old('name') }}" >
    <span class="text-danger">{{ $errors->first('name') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-group">
    <label for="url">{{ 'Url' }}</label>
    <input class="form-control" name="url" type="text" id="url" placeholder="{{ucfirst('url')}}" value="{{ isset($link->url) ? $link->url : old('url') }}" >
    <span class="text-danger">{{ $errors->first('url') }}</span>
    <p class="help-block"></p>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
