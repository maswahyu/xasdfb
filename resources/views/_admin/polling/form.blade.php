<style>
    #questions-holder .item-question{
        margin-bottom: 10px;
        display:flex;
        justify-content:space-between;
    }

    #questions-holder .item-question input{
        margin-right: 5px;
    }

    #questions-holder .item-question input.votes{
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
         {{ 'Questions' }}
    </label>
    <div id="questions-holder">
        @if($formMode === 'create')
        <div class="item-question">
            <input class="form-control" name="question[]" type="text" placeholder="{{ucfirst('question')}}" value="" required>
            <button class="btn btn-danger" type="button" style="display:none;">Delete</button>
        </div>
        @else
            @foreach($polling->questions as $question)
            <div class="item-question" data-id="{{ $question->id }}">
                <input class="form-control" name="question[]" type="text" placeholder="{{ucfirst('question')}}" value="{{ $question->question }}" required>
                <input type="hidden" name="question_id[]" type="text" value="{{ $question->id }}" >
                <input class="form-control votes" type="text" readonly value="{{ $question->votes }}">
                <button class="btn btn-danger" type="button">Delete</button>
            </div>
            @endforeach
        @endif
    </div>
    <input id="btn-add-question" class="btn btn-secondary" type="button" value="Add Question">
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
    $('#btn-add-question').on('click',function(){
        var newItem = $('#questions-holder .item-question').eq(0).clone();
        newItem.find('input').val('');
        newItem.find('button').show();
        $('#questions-holder').append(newItem);
    });

    $('#questions-holder').on('click','.btn-danger',function(){
        var parent = $(this).parents('.item-question');
        @if($formMode === 'edit')
        if(parent.data('id')){
            $('#questions-holder').append('<input type="hidden" name="question_deleted[]" value="'+parent.data('id')+'" />');
        }
        @endif
        parent.remove();
    });
    
})

</script>
@endsection