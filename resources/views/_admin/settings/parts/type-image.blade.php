<div class="form-group ">
    <label>
         {{ $setting->name }}
    </label>
    @if(!empty($setting->value))
        <img src="{{ imageview($setting->value) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <button type="button" class="btn btn-block btn-default btn-flat" id="button-image-{{ $setting->key }}">Browse</button>
        </div>
        <input name="{{ $setting->key }}" id="image_path_{{ $setting->key }}" type="text" class="form-control" value="{{ !empty($setting->value) ? $setting->value : '' }}" placeholder="Image">
    </div>
    <p class="help-block"></p>
</div>