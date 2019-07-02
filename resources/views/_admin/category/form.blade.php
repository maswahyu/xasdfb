<div class="form-group ">
    <label for="parent_id">{{ 'Category' }}</label>
    <select name="parent_id" class="form-control" id="parent_id">
    	<option value="0" {{ (isset($category->parent_id) && $category->parent_id == 0) ? 'selected' : '' }}>Top Parent</option>
        @foreach($parent as $item)
            <option value="{{ $item->id }}" {{ (isset($category->parent_id) && $category->parent_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="name">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($category->name) ? $category->name : old('name') }}" required>
    <span class="text-danger">{{ $errors->first('name') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Image' }}
    </label>
    @if(isset($category->image))
        <img src="{{ imageview($category->image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image">Browse</button> 
        </div>
        <input id="image_path" name="image" type="text" class="form-control" value="{{ isset($category->image) ? $category->image : old('image') }}" placeholder="Image" required>
    </div>
    <span class="text-danger">{{ $errors->first('image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="description">{{ 'Description' }}</label>
    <textarea class="form-control" rows="2" name="description" type="textarea" id="description" maxlength="300" placeholder="Description">{{ isset($category->description) ? $category->description : old('description') }}</textarea>
    <span class="text-danger">{{ $errors->first('description') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
