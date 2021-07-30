<div class="form-group">
    <label for="name">{{ 'Name' }}</label>
    <input class="form-control form-control-sm" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($prize->name) ? $prize->name : old('name') }}" >
    <span class="text-danger">{{ $errors->first('name') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="category">{{ 'Category' }}</label>
    <input class="form-control form-control-sm" name="category" type="text" id="category" placeholder="{{ucfirst('category')}}" value="{{ isset($prize->category) ? $prize->category : old('category') }}">
    <span class="text-danger">{{ $errors->first('category') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Image' }}
    </label>
    @if(isset($prize->image))
        <img src="{{ imageview($prize->image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-sm btn-default btn-flat" id="button-image">Browse</button>
        </div>
        <input id="image_path" name="image" type="text" class="form-control form-control-sm form-control-sm" value="{{ isset($prize->image) ? $prize->image : old('image') }}" placeholder="Image" required>
    </div>
    <span class="text-danger">{{ $errors->first('image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="poin">{{ 'Poin' }}</label>
    <input class="form-control form-control-sm" name="poin" type="number" id="poin" placeholder="{{ucfirst('poin')}}" value="{{ isset($prize->poin) ? $prize->poin : old('poin') }}">
    <span class="text-danger">{{ $errors->first('poin') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control" id="publish">
        <option value="1" {{ (isset($prize->publish) && $prize->publish == '1') ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($prize->publish) && $prize->publish == '0') ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
