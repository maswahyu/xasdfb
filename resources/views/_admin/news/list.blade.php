<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Image</th>
            <th>Summary</th>
            <th>Views Count</th>
            <th>Publish</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($news as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $news->firstItem() }}</td>
            <td><a href="{{ $item->url }}" target="_blank">{{ $item->title }}</a></td>
            <td>{{ optional($item->category)->name }}</td>
            <td><img src="{{ imagethumb($item->image) }}" width="150"> </td>
            <td>{{ $item->summary }}</td>
            <td>{{ $item->view_count }}</td>
            <td>{!! $item->publishBadge !!}</td>
            <td>
                @if(($item->is_highlight == 1))
                    <span class="badge badge-success">Highlight</span><br>
                @endif
                @if(($item->is_mustread == 1))
                    <span class="badge badge-info">Must Read</span><br>
                @endif
            </td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/news/' . $item->id) }}" title="View news"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/news/' . $item->id . '/edit') }}" title="Edit news"><i class="fa fa-edit"></i> Edit</a>

                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$news->lastItem()}} of {{$news->total()}} entries<br>
{!! $news->appends(['search' => $keyword])->render() !!}
