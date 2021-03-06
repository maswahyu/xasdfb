@php
use App\News;
@endphp

@section('header')

    <!-- Select2 -->
  <link rel="stylesheet" href="/dist/plugins/select2/select2.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
  <style type="text/css">
    .select2-container {
        width: 100% !important;
        padding: 0;
    }
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
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        margin-top: -6px;
    }
  </style>

@endsection
<div class="col-md-8">
    <div class="card card-outline">
        <div class="card-body">
            <div class="form-group ">
                <label for="category_id">{{ 'Category' }}</label>
                <select name="category_id" class="form-control form-control-sm select2" id="category_id" style="width: 100%;">
                    @foreach($category as $item)
                        <optgroup label="{{ $item->name }}">
                            @foreach($item->subcategory as $parent)
                                <option value="{{ $parent->id }}" {{ (isset($news->category_id) && $news->category_id == $parent->id) ? 'selected' : ''}}>{{ $parent->name }} <i>{{ !$parent->publish ? ' - (unpublished category)' : '' }}</i></option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                <p class="help-block"></p>
            </div>

            <div class="form-group">
                <label for="title">{{ 'Title' }}</label>
                <input class="form-control form-control-sm" name="title" type="text" id="title" value="{{ isset($news->title) ? $news->title : old('title') }}" placeholder="Title" maxlength="60">
                <span class="text-danger">{{ $errors->first('title') }}</span>
                <p class="help-block">Max character = 60</p>
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
                    <option value="{{ News::STATUS_PUBLISHED }}" {{ (isset($news->publish) && $news->publish == News::STATUS_PUBLISHED) ? 'selected' : '' }}>Yes</option>
                    <option value="{{ News::STATUS_SCHEDULED }}" {{ (isset($news->publish) && $news->publish == News::STATUS_SCHEDULED) ? 'selected' : '' }}>Scheduled</option>
                    <option value="{{ News::STATUS_UNPUBLISHED }}" {{ (isset($news->publish) && $news->publish == News::STATUS_UNPUBLISHED) ? 'selected' : '' }}>No</option>
                </select>
                <span class="text-danger">{{ $errors->first('publish') }}</span>
                <p class="help-block"></p>
            </div>

            <div class="form-group {{ isset($news->publish) && $news->publish != News::STATUS_SCHEDULED ? 'd-none' : null }}" id="published-at">
                <label for="publish">Publish Date</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input class="form-control form-control-sm float-right" name="published_at" type="text" id="datetimepicker" data-toggle="datetimepicker" data-target="#datetimepicker" value="{{ isset($news->published_at) ? $news->published_date_12 : old('published_at') }}" placeholder="Publish Date" autocomplete="off">
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
                <a href="javascript:void(0)" id="advancedButton">Advanced +</a>
                <div id="advanced">
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input class="form-control form-control-sm" name="meta_title" type="text" id="meta_title" placeholder="Meta Title" value="{{ isset($news->meta_title) ? $news->meta_title : old('meta_title') }}">
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                        <p class="help-block"></p>
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control form-control-sm" rows="2" name="meta_description" type="textarea" id="meta_description" maxlength="300" placeholder="Meta description">{{ isset($news->meta_description) ? $news->meta_description : old('meta_description') }}</textarea>
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                        <p class="help-block"></p>
                    </div>

                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <textarea class="form-control form-control-sm" rows="2" name="meta_keyword" type="textarea" id="meta_keyword" maxlength="300" placeholder="ex. style, music, movie">{{ isset($news->meta_keyword) ? $news->meta_keyword : old('meta_keyword') }}</textarea>
                        <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                        <p class="help-block"></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-4">
    <div class="card card-outline">
        <div class="card-body">
            <div class="form-group">
                <h4>Baja Juga</h4>
                    <div class="form-group">
                        <label>
                             Artikel
                        </label>
                        <select name="read_more[]" id="read_more" class="select2" multiple="multiple" data-placeholder="Select a news" style="width: 100%;"></select>
                        <p class="help-block"></p>
                    </div>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
            </div>
        </div>
    </div>
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

        $('#published-at').addClass('d-none');
        @if(isset($news->publish) && $news->publish == News::STATUS_SCHEDULED)
        $('#published-at').removeClass('d-none');
        @endif

        $('#publish').on('change', function() {
            if ($(this).val() == 2) {
                $('#published-at').removeClass('d-none');
            } else {
                $('#published-at').addClass('d-none');
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

        $('#advanced').addClass('d-none');

        $('#advancedButton').on('click', function() {
            $('#advanced').removeClass('d-none');
        });

        // second button
        document.getElementById('button-image').addEventListener('click', (event) => {
          event.preventDefault();

          inputId = 'image_path';

          PopupCenter('/file-manager/fm-button','fm','900','500');
        });

        var ArticlePageSize = 10;
        var defaultTxtOnInit = 'a';
        $('#read_more').select2({
            tags: true,
            placeholder: 'Cari...',
            ajax: {
              url: '/magic/loadnews',
              dataType: 'json',
              delay: 250,
              data: function (params) {
                  params.page = params.page || 1;
                  return {
                      keyword: params.term ? params.term : defaultTxtOnInit,
                      pageSize: ArticlePageSize,
                      page: params.page
                  };
              },
              processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                  results:  $.map(data.data, function (item) {
                    return {
                      text: item.title,
                      id: item.id
                    }
                  }),
                  pagination: {
                      more: (params.page * ArticlePageSize) < data.Counts
                  }
                };
              },
              cache: false
            }
        });

        @if($formMode === 'edit')
        var newsId = '{{ isset($news->id) ? $news->id : 0 }}';
        var moreSelect = $('#read_more');

        $.ajax({
            type: 'GET',
            url: '/magic/loadnews/' + newsId
        }).then(function (data) {
            $.map(data, function (v) {
                var option = new Option(v.title, v.id, true, true);
                moreSelect.append(option).trigger('change');
            });

        });
        @endif
    });

// input
let inputId = '';

// set file link
function fmSetLink($url) {
    document.getElementById(inputId).value = $url;
}

</script>

@endsection