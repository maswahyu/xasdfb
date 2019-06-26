<div class="form-group">
    <label for="title">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : old('title') }}" placeholder="Title">
    <span class="text-danger">{{ $errors->first('title') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Image' }}
    </label>
    @if(isset($news->image))
        <img src="{{ imageview($news->image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image">Browse</button> 
        </div>
        <input id="image_path" name="image" type="text" class="form-control" value="{{ isset($news->image) ? $news->image : old('image') }}" placeholder="Image">
    </div>
    <span class="text-danger">{{ $errors->first('image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="summary">{{ 'Summary' }}</label>
    <textarea class="form-control" rows="2" name="summary" type="textarea" id="summary" maxlength="300" placeholder="Summary">{{ isset($news->summary) ? $news->summary : old('summary') }}</textarea>
    <span class="text-danger">{{ $errors->first('summary') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-group">
    <label for="content">{{ 'Content' }}</label>
    <textarea class="form-control wysiwyg-advanced-br" rows="5" name="content" type="textarea" id="content" placeholder="Content">{{ isset($news->content) ? $news->content : old('content') }}</textarea>
    <span class="text-danger">{{ $errors->first('content') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="category_id">{{ 'Category' }}</label>
    <select name="category_id" class="form-control" id="category_id">
        @foreach($category as $item)
            <option value="{{ $item->id }}" {{ (isset($news->category_id) && $news->category_id == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control" id="publish">
        <option value="1" {{ (isset($news->publish) && $news->publish == '1') ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($news->publish) && $news->publish == '0') ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
@section('javascript')
<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function() {

      document.getElementById('button-image').addEventListener('click', (event) => {
        event.preventDefault();

        PopupCenter('/file-manager/fm-button','fm','900','500');  

      });
    });

    // set file link
    function fmSetLink($url) {
      document.getElementById('image_path').value = $url;
    }

</script>
@endsection