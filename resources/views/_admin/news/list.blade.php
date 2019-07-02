<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Image</th>
            <th>Summary</th>
            <th>Publish</th>
            <th>Featured</th>
            <th>Highlight</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($news as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $news->firstItem() }}</td>
            <td><a href="{{ $item->url }}" target="_blank">{{ $item->title }}</a></td>
            <td>{{ optional($item->category)->name }}</td>
            <td><img src="{{ imagethumb($item->image) }}" width="150"> </td><td>{{ $item->summary }}</td>
            <td>
                <span class="badge badge-{{ ($item->publish == '0') ? 'warning' : 'info' }}">{{ ($item->publish == '0') ? 'No' : 'Yes' }}</span>
            </td>
            <td>
                <span class="badge badge-{{ ($item->is_featured == '0') ? 'warning' : 'info' }}">{{ ($item->is_featured == '0') ? 'No' : 'Yes' }}</span>
            </td>
            <td>
                <span class="badge badge-{{ ($item->is_highlight == '0') ? 'warning' : 'info' }}">{{ ($item->is_highlight == '0') ? 'No' : 'Yes' }}</span>
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