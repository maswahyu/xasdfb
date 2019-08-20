<div class="form-group">
    <label for="title">{{ 'Title' }}</label>
    <input class="form-control form-control-sm" name="title" type="text" id="title" placeholder="{{ucfirst('title')}}" value="{{ isset($slide->title) ? $slide->title : old('title') }}" >
    <span class="text-danger">{{ $errors->first('title') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Image' }}
    </label>
    @if(isset($slide->image))
        <img src="{{ imageview($slide->image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-sm btn-default btn-flat" id="button-image">Browse</button>
        </div>
        <input id="image_path" name="image" type="text" class="form-control form-control-sm" value="{{ isset($slide->image) ? $slide->image : old('image') }}" placeholder="Image" required>
    </div>
    <span class="text-danger">{{ $errors->first('image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Mobile Image' }}
    </label>
    @if(isset($slide->mobile_image))
        <img src="{{ imageview($slide->mobile_image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-sm btn-default btn-flat" id="button-image2">Browse</button>
        </div>
        <input id="image_path2" name="mobile_image" type="text" class="form-control form-control-sm" value="{{ isset($slide->mobile_image) ? $slide->mobile_image : old('mobile_image') }}" placeholder="Mobile Image">
    </div>
    <span class="text-danger">{{ $errors->first('mobile_image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="url">{{ 'Url' }}</label>
    <input class="form-control form-control-sm" name="url" type="text" id="url" placeholder="{{ucfirst('url')}}" value="{{ isset($slide->url) ? $slide->url : old('url') }}" >
    <span class="text-danger">{{ $errors->first('url') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control form-control-sm" id="publish">
        <option value="1" {{ (isset($slide->publish) && $slide->publish == '1') ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($slide->publish) && $slide->publish == '0') ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="is_featured">{{ 'Featured' }}</label>
    <select name="is_featured" class="form-control form-control-sm" id="is_featured">
        <option value="1" {{ (isset($slide->is_featured) && $slide->is_featured == 1) ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($slide->is_featured) && $slide->is_featured == 0) ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('is_featured') }}</span>
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

              inputId = 'image_path';

              window.open('/file-manager/fm-button', 'fm', 'width=900,height=500');
          });

          // second button
          document.getElementById('button-image2').addEventListener('click', (event) => {
              event.preventDefault();

              inputId = 'image_path2';

              window.open('/file-manager/fm-button', 'fm', 'width=900,height=500');
          });
      });

      // input
      let inputId = '';

      // set file link
      function fmSetLink($url) {
          document.getElementById(inputId).value = $url;
      }

</script>

@endsection