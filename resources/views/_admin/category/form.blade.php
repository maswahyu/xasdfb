<div class="form-group ">
    <label for="parent_id">{{ 'Category' }}</label>
    <select name="parent_id" class="form-control form-control-sm" id="parent_id">
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
    <input class="form-control form-control-sm" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($category->name) ? $category->name : old('name') }}" required>
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
        <input id="image_path" name="image" type="text" class="form-control form-control-sm" value="{{ isset($category->image) ? $category->image : old('image') }}" placeholder="Image" required>
    </div>
    <span class="text-danger">{{ $errors->first('image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="description">{{ 'Description' }}</label>
    <textarea class="form-control form-control-sm" rows="2" name="description" type="textarea" id="description" maxlength="300" placeholder="Description">{{ isset($category->description) ? $category->description : old('description') }}</textarea>
    <span class="text-danger">{{ $errors->first('description') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control form-control-sm" id="publish">
        <option value="1" {{ (isset($category->publish) && $category->publish == '1') ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($category->publish) && $category->publish == '0') ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <a href="javascript:void(0)" id="advancedButton">Advanced +</a>
    <div id="advanced">
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input class="form-control form-control-sm" name="meta_title" type="text" id="meta_title" placeholder="Meta Title" value="{{ isset($category->meta_title) ? $category->meta_title : old('meta_title') }}" required>
            <span class="text-danger">{{ $errors->first('meta_title') }}</span>
            <p class="help-block"></p>
        </div>

        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea class="form-control form-control-sm" rows="2" name="meta_description" type="textarea" id="meta_description" maxlength="300" placeholder="Meta description">{{ isset($category->meta_description) ? $category->meta_description : old('meta_description') }}</textarea>
            <span class="text-danger">{{ $errors->first('meta_description') }}</span>
            <p class="help-block"></p>
        </div>

        <div class="form-group">
            <label for="meta_keyword">Meta Keyword</label>
            <textarea class="form-control form-control-sm" rows="2" name="meta_keyword" type="textarea" id="meta_keyword" maxlength="300" placeholder="ex. style, music, movie">{{ isset($category->meta_keyword) ? $category->meta_keyword : old('meta_keyword') }}</textarea>
            <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
            <p class="help-block"></p>
        </div>

    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@section('javascript')

    <script>
        $(function () {

            $('#advanced').addClass('d-none');

            $('#advancedButton').on('click', function() {
                $('#advanced').removeClass('d-none');
            });

        })
    </script>

@endsection
