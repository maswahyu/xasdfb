<style>
    #options-holder .item-option{
        margin-bottom: 10px;
        display:flex;
        justify-content:space-between;
    }

    #options-holder .item-option input{
        margin-right: 5px;
    }

    #options-holder .item-option input.votes{
        width: 100px;
    }
</style>

<div class="form-group">
    <label for="name">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" placeholder="{{ucfirst('name')}}" value="{{ isset($polling->name) ? $polling->name : old('name') }}" required>
    <span class="text-danger">{{ $errors->first('name') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <label>
         {{ 'options' }}
    </label>
    <div id="options-holder">
        @if($formMode === 'create')
        <div class="item-option">
            <input class="form-control" name="option[]" type="text" placeholder="{{ucfirst('option')}}" value="" required>
            <button class="btn btn-danger" type="button" style="display:none;">Delete</button>
        </div>
        @else
            @foreach($polling->options as $option)
            <div class="item-option" data-id="{{ $option->id }}">
                <input class="form-control" name="option[]" type="text" placeholder="{{ucfirst('option')}}" value="{{ $option->option }}" required>
                <input type="hidden" name="option_id[]" type="text" value="{{ $option->id }}" >
                <input class="form-control votes" type="text" readonly value="{{ $option->votes }}">
                <button class="btn btn-danger" type="button">Delete</button>
            </div>
            @endforeach
        @endif
    </div>
    <input id="btn-add-option" class="btn btn-secondary" type="button" value="Add Option">
</div>

<div class="form-group">
    <label for="publish">{{ 'Publish' }}</label>
    <select name="publish" class="form-control" id="publish">
        <option value="1" {{ (isset($polling->publish) && $polling->publish == 1) ? 'selected' : '' }}>Yes</option>
        <option value="0" {{ (isset($polling->publish) && $polling->publish == 0) ? 'selected' : '' }}>No</option>
    </select>
    <span class="text-danger">{{ $errors->first('publish') }}</span>
    <p class="help-block"></p>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

@section('javascript')
<script>

$(function() {
    $('#btn-add-option').on('click',function(){
        var newItem = $('#options-holder .item-option').eq(0).clone();
        newItem.find('input').val('');
        newItem.find('button').show();
        $('#options-holder').append(newItem);
    });

    $('#options-holder').on('click','.btn-danger',function(){
        var parent = $(this).parents('.item-option');
        @if($formMode === 'edit')
        if(parent.data('id')){
            $('#options-holder').append('<input type="hidden" name="option_deleted[]" value="'+parent.data('id')+'" />');
        }
        @endif
        parent.remove();
    });
    
})

</script>
@endsection