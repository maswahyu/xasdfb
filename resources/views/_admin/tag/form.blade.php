<div class="form-group">
    <label for="name">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($tag->name) ? $tag->name : old('name') }}" required>
    <span class="text-danger">{{ $errors->first('name') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control" id="publish">
        <option value="1" {{ (isset($tag->publish) && $tag->publish == 1) ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($tag->publish) && $tag->publish == 0) ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
