@section('header')
<!-- Date Picker -->
<link rel="stylesheet" href="/dist/plugins/datepicker/datepicker3.css">
@endsection
<div class="form-group">
    <label for="name">{{ 'Name' }}</label>
    <input class="form-control form-control-sm" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($stickyBanner->name) ? $stickyBanner->name : old('name') }}" required>
    <span class="text-danger">{{ $errors->first('name') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label>
         {{ 'Image' }}
    </label>
    @if(isset($stickyBanner->image))
        <img src="{{ imageview($stickyBanner->image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image">Browse</button>
        </div>
        <input id="image_path" name="image" type="text" class="form-control form-control-sm" value="{{ isset($stickyBanner->image) ? $stickyBanner->image : old('image') }}" placeholder="Image">
    </div>
    <span class="text-danger">{{ $errors->first('image') }}</span>
    <p class="help-block"></p>
</div>


<div class="form-group">
    <label for="cta">{{ 'CTA' }}</label>
    <input class="form-control form-control-sm" name="cta" type="text" id="cta" placeholder="{{ucfirst('CTA')}}" value="{{ isset($stickyBanner->cta) ? $stickyBanner->cta : old('cta') }}">
    <span class="text-danger">{{ $errors->first('cta') }}</span>
    <p class="help-block">Full URL, eg: https://google.com/slug</p>
</div>

<div class="form-group">
    <label for="status">{{ 'Status' }}</label>
    <select name="status" class="form-control form-control-sm" id="status">
        <option value="1" {{ (isset($stickyBanner->status) && $stickyBanner->status == '1') ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($stickyBanner->status) && $stickyBanner->status == '0') ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('status') }}</span>
    <p class="help-block"></p>
</div>
<div class="form-group">
    <label for="page">{{ 'Page' }}</label>
    <select name="page" class="form-control form-control-sm" id="page">
        <option disabled selected>Choose page</option>
        @foreach(App\StickyBanner::getConstanta('PAGE') as $key => $page)
        <option value="{{$page}}" {{ (isset($stickyBanner->page) && $stickyBanner->page == $page) ? 'selected' : '' }}>{{ $key }}</option>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first('page') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="pub_day">{{ 'Publish Day' }}</label>
    <select name="pub_day" class="form-control form-control-sm" id="pub_day">
        @php
        $dayOfWeek = [
            0 => 'Senin',
            1 => 'Selasa',
            2 => 'Rabu',
            3 => 'Kamis',
            4 => 'Jumat',
            5 => 'Sabtu',
            6 => 'Minggu',
        ];
        @endphp
            <option disabled selected>Choose Day</option>
        @foreach($dayOfWeek as $key => $day)
            <option value="{{ $key }}" {{ (isset($stickyBanner->pub_day) && $stickyBanner->pub_day == $key) ? 'selected' : '' }}>{{$day}}</option>
        @endforeach
    </select>
    <span class="text-danger">{{ $errors->first('pub_day') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="publish">Start Periode</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-calendar"></i>
          </span>
        </div>
        <input class="form-control float-right input-datepicker" name="periode_start" type="text" id="periode_start" value="{{ isset($event->periode_start) ? $event->periode_start : old('periode_start') }}" placeholder="Start Date" autocomplete="off">
    </div>
    <span class="text-danger">{{ $errors->first('periode_start') }}</span>
    <p class="help-block"></p>
</div>


<div class="form-group">
    <label for="publish">End Periode</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-calendar"></i>
          </span>
        </div>
        <input class="form-control float-right input-datepicker" name="periode_end" type="text" id="periode_end" value="{{ isset($event->periode_end) ? $event->periode_end : old('periode_end') }}" placeholder="End Date" autocomplete="off">
    </div>
    <span class="text-danger">{{ $errors->first('periode_end') }}</span>
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
