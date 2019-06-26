<div class="form-group">
    <label for="name">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($member->name) ? $member->name : old('name') }}" required>
    <span class="text-danger">{{ $errors->first('name') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="email">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" placeholder="{{ucfirst('email')}}" value="{{ isset($member->email) ? $member->email : old('email') }}" required>
    <span class="text-danger">{{ $errors->first('email') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group ">
    <label for="profile_image">{{ 'Profile Image' }}</label>
    @if(isset($member->profile_image))
        <img src="{{ imageview($member->profile_image) }}" style="display: block; margin: 5px 0 10px 0; width: 100px;">
    @endif
    <div class="input-group">
        <div class="input-group-btn">
            <a href="{{ url('/') }}/filemanager/dialog.php?akey={{ env('FILE_KEY') }}&type=1&field_id=image_path&relative_url=1" class="file-iframe-btn" data-fancybox-type="iframe">
                <button type="button" class="btn btn-block btn-default btn-flat">Browse</button>
            </a>
        </div>
        <input id="image_path" name="profile_image" type="text" class="form-control" value="{{ isset($member->profile_image) ? $member->profile_image : old('profile_image') }}" placeholder="Profile Image">
    </div>
    <span class="text-danger">{{ $errors->first('profile_image') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="facebook">{{ 'Facebook' }}</label>
    <input class="form-control" name="facebook" type="text" id="facebook" placeholder="{{ucfirst('facebook')}}" value="{{ isset($member->facebook) ? $member->facebook : old('facebook') }}" >
    <span class="text-danger">{{ $errors->first('facebook') }}</span>
    <p class="help-block">Link facebook</p>
</div>

<div class="form-group">
    <label for="twitter">{{ 'Twitter' }}</label>
    <input class="form-control" name="twitter" type="text" id="twitter" placeholder="{{ucfirst('twitter')}}" value="{{ isset($member->twitter) ? $member->twitter : old('twitter') }}" >
    <span class="text-danger">{{ $errors->first('twitter') }}</span>
    <p class="help-block">Link twitter</p>
</div>

<div class="form-group">
    <label for="short_bio">{{ 'Short Bio' }}</label>
    <input class="form-control" name="short_bio" type="text" id="short_bio" placeholder="Short Bio" value="{{ isset($member->short_bio) ? $member->short_bio : old('short_bio') }}" >
    <span class="text-danger">{{ $errors->first('short_bio') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label for="bio">{{ 'Bio' }}</label>
    <textarea class="form-control" rows="5" name="bio" type="textarea" id="bio" placeholder="{{ucfirst('bio')}}" >{{ isset($member->bio) ? $member->bio : old('bio') }}</textarea>
    <span class="text-danger">{{ $errors->first('bio') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
