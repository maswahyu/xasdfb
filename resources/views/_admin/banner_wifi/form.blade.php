<div class="form-group">
    <label for="title">{{ 'Name' }}</label>
    <input class="form-control form-control-sm" name="title" type="text" id="title" placeholder="{{ucfirst('name')}}" value="{{ isset($bannerWifi->title) ? $bannerWifi->title : old('title') }}" required>
    <span class="text-danger">{{ $errors->first('title') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Image' }}
    </label>
    @if(isset($bannerWifi->image))
        <img src="{{ imageview($bannerWifi->image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image">Browse</button>
        </div>
        <input id="image_path" name="image" type="text" class="form-control form-control-sm" value="{{ isset($bannerWifi->image) ? $bannerWifi->image : old('image') }}" placeholder="Image">
    </div>
    <span class="text-danger">{{ $errors->first('image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Mobile Image' }}
    </label>
    @if(isset($bannerWifi->mobile_image))
        <img src="{{ imageview($bannerWifi->mobile_image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image2">Browse</button>
        </div>
        <input id="image_path2" name="mobile_image" type="text" class="form-control form-control-sm" value="{{ isset($bannerWifi->mobile_image) ? $bannerWifi->mobile_image : old('mobile_image') }}" placeholder="Mobile Image">
    </div>
    <span class="text-danger">{{ $errors->first('mobile_image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="cta">{{ 'CTA' }}</label>
    <input class="form-control form-control-sm" name="cta" type="text" id="cta" placeholder="{{ucfirst('CTA')}}" value="{{ isset($bannerWifi->cta) ? $bannerWifi->cta : old('cta') }}">
    <span class="text-danger">{{ $errors->first('cta') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control form-control-sm" id="publish">
        <option value="1" {{ (isset($bannerWifi->publish) && $bannerWifi->publish == '1') ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($bannerWifi->publish) && $bannerWifi->publish == '0') ? 'selected' : '' }}>No</option>
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
