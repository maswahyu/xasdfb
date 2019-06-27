@section('header')

    <!-- Select2 -->
  <link rel="stylesheet" href="/dist/plugins/select2/select2.min.css">
  <style type="text/css">
        .select2-container--default 
        .select2-selection--multiple 
        .select2-selection__rendered li {
            list-style: none;
        }

        .select2-container--default 
        .select2-selection--multiple 
        .select2-selection__choice {
            background-color: #007bff;
            border-color: #006fe6;
            padding: 1px 10px;
            color: #fff;
        }
  </style>

@endsection
<div class="form-group ">
    <label for="category_id">{{ 'Category' }}</label>
    <select name="category_id" class="form-control select2" id="category_id" style="width: 100%;">
        @foreach($category as $item) 
            <optgroup label="{{ $item->name }}">
                @foreach($item->children as $parent)
                    <option value="{{ $parent->id }}" {{ (isset($news->category_id) && $news->category_id == $parent->id) ? 'selected' : ''}}>{{ $parent->name }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first('category_id') }}</span>
    <p class="help-block"></p>
</div>

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
        <input id="image_path" name="image" type="text" class="form-control" value="{{ isset($news->image) ? $news->image : old('image') }}" placeholder="Image" required>
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
    <label for="tags">{{ 'Tags' }}</label>
    <select name="tags[]" class="select2" multiple="multiple" data-placeholder="Select a tags" style="width: 100%;">
        @foreach($tags as $item)
            <option value='{{ $item->id }}' {{ ($formMode === 'edit') ? $news->isSelected($item->id) : '' }}>{{ $item->name}}</option>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first('tags') }}</span>
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

<!-- Select2 -->
<script src="/dist/plugins/select2/select2.full.min.js"></script>
<script>
    $(function () {
        $('.select2').select2({
            tags: true
        })
    });
</script>

@endsection