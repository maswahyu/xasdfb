<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Is Featured</th>
            <th>Publish</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($slide as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $slide->firstItem() }}</td>
            <td><a href="{{ $item->url }}" target="_blank"><img src="{{ imagethumb($item->image) }}" width="200"></a></td>
            <td><span class="badge badge-{{ ($item->is_featured == '0') ? 'warning' : 'info' }}">{{ ($item->is_featured == '0') ? 'No' : 'Yes' }}</span></td>
            <td><span class="badge badge-{{ ($item->publish == '0') ? 'warning' : 'info' }}">{{ ($item->publish == '0') ? 'No' : 'Yes' }}</span></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/slide/' . $item->id) }}" title="View slide"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/slide/' . $item->id . '/edit') }}" title="Edit slide"><i class="fa fa-edit"></i> Edit</a>
                         
                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>   
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$slide->lastItem()}} of {{$slide->total()}} entries<br>
{!! $slide->appends(['search' => $keyword])->render() !!}