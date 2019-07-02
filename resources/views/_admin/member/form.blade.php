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

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
