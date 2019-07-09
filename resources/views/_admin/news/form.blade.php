@section('header')

    <!-- Select2 -->
  <link rel="stylesheet" href="/dist/plugins/select2/select2.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
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
    <select name="category_id" class="form-control form-control-sm select2" id="category_id" style="width: 100%;">
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
    <input class="form-control form-control-sm" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : old('title') }}" placeholder="Title">
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
            <button type="button" class="btn btn-block btn-sm btn-default btn-flat" id="button-image">Browse</button> 
        </div>
        <input id="image_path" name="image" type="text" class="form-control form-control-sm" value="{{ isset($news->image) ? $news->image : old('image') }}" placeholder="Image" required>
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
    <textarea class="form-control wysiwyg-advanced-br" rows="10" name="content" type="textarea" id="content" placeholder="Content">{{ isset($news->content) ? $news->content : old('content') }}</textarea>
    <span class="text-danger">{{ $errors->first('content') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="tags">{{ 'Tags' }}</label>
    <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Select a tags" style="width: 100%;">
    </select>
    <span class="text-danger">{{ $errors->first('tags') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control form-control-sm" id="publish">
        <option value="1" {{ (isset($news->publish) && $news->publish == '1') ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($news->publish) && $news->publish == '0') ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="publish">Publish Date</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-calendar"></i>
          </span>
        </div> 
        <input class="form-control form-control-sm float-right" name="published_at" type="text" id="datetimepicker" data-toggle="datetimepicker" data-target="#datetimepicker" value="{{ isset($news->published_at) ? $news->published_at : old('published_at') }}" placeholder="Publish Date" autocomplete="off" required> 
    </div>
    <span class="text-danger">{{ $errors->first('published_at') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="is_highlight">{{ 'Highlight' }}</label>
    <select name="is_highlight" class="form-control form-control-sm" id="is_highlight">
        <option value="0" {{ (isset($news->is_highlight) && $news->is_highlight == 0) ? 'selected' : '' }}>No</option>
        <option value="1" {{ (isset($news->is_highlight) && $news->is_highlight == 1) ? 'selected' : '' }}>Yes</option>
    </select>
    <span class="text-danger">{{ $errors->first('is_highlight') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="is_mustread">{{ 'Must Read' }}</label>
    <select name="is_mustread" class="form-control form-control-sm" id="is_mustread">
        <option value="0" {{ (isset($news->is_mustread) && $news->is_mustread == 0) ? 'selected' : '' }}>No</option>
        <option value="1" {{ (isset($news->is_mustread) && $news->is_mustread == 1) ? 'selected' : '' }}>Yes</option>
    </select>
    <span class="text-danger">{{ $errors->first('is_mustread') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@section('javascript')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Select2 -->
<script src="/dist/plugins/select2/select2.full.min.js"></script>
<script>
    $(function () {

        $('#datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            autoclose: true,
            todayBtn: true,
        });

        $('#category_id').select2();

        $('#tags').select2({
            tags: true,
            placeholder: 'Cari...',
            data : {
                id: '3', 
                text: 'Bold'
            },
            ajax: {
              url: '/magic/loadtags',
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                return {
                  results:  $.map(data, function (item) {
                    return {
                      text: item.name,
                      id: item.id
                    }
                  })
                };
              },
              cache: true
            }
        });

        @if($formMode === 'edit')
        var newsId = '{{ isset($news->id) ? $news->id : 0 }}';
        var newsSelect = $('#tags');
        
        $.ajax({
            type: 'GET',
            url: '/magic/loadtagsnews/' + newsId
        }).then(function (data) {
            $.map(data, function (v) {
                var option = new Option(v.name, v.id, true, true);
                newsSelect.append(option).trigger('change');
            });

        });
        @endif
    });

</script>

@endsection