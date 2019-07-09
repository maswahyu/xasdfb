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

<input type="hidden" name="type" value="{{ isset($gallery->type) ? $gallery->type : Request::query('type') }}">

<div class="form-group">
    <label for="title">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" placeholder="{{ucfirst('title')}}" value="{{ isset($gallery->title) ? $gallery->title : old('title') }}" >
    <span class="text-danger">{{ $errors->first('title') }}</span>
    <p class="help-block"></p>
</div>
@if(Request::query('type') == 'photo')
<div class="form-group">
    <label for="value">{{ 'Image' }}</label>
    @if(isset($gallery->value))
        <img src="{{ imageview($gallery->value) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image">Browse</button> 
        </div>
        <input id="image_path" name="value" type="text" class="form-control" value="{{ isset($gallery->value) ? $gallery->value : old('value') }}" placeholder="Image">
    </div>
    <span class="text-danger">{{ $errors->first('value') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="album_id">{{ 'Album' }}</label>
    <select name="album_id" class="form-control" id="album_id" required>
        @if($formMode === 'edit')
            <option value="{{ $gallery->album_id }}" {{ ($gallery->album_id) ? 'selected' : ''}}>{{ $gallery->album->name }}</option>
        @endif
    </select>
    <span class="text-danger">{{ $errors->first('album_id') }}</span>
    <p class="help-block"></p>
</div>

@else
<div class="form-group">
    <label for="value">{{ 'Video Youtube Url' }}</label>
    <input class="form-control" name="value" type="text" id="value" placeholder="Video Youtube Url" value="{{ isset($gallery->value) ? $gallery->value : old('value') }}" >
    <span class="text-danger">{{ $errors->first('value') }}</span>
    <p class="help-block"></p>
</div>
@endif

<div class="form-group">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control" id="publish">
        <option value="1" {{ (isset($gallery->publish) && $gallery->publish == '1') ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($gallery->publish) && $gallery->publish == '0') ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="is_featured">{{ 'Featured' }}</label>
    <select name="is_featured" class="form-control form-control-sm" id="is_featured">
        <option value="0" {{ (isset($gallery->is_featured) && $gallery->is_featured == 0) ? 'selected' : '' }}>No</option>
        <option value="1" {{ (isset($gallery->is_featured) && $gallery->is_featured == 1) ? 'selected' : '' }}>Yes</option>
    </select>
    <span class="text-danger">{{ $errors->first('is_featured') }}</span>
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
        $('#album_id').select2({
            tags: false,
            placeholder: 'Cari...',
            ajax: {
              url: '/magic/loadalbum',
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
    });

</script>

@endsection