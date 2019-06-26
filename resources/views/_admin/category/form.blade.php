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


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
