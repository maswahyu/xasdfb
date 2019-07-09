<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Image</th>
            <th>Publish</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($event as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $event->firstItem() }}</td>
            <td>{{ $item->title }}</td>
            <td><img src="{{ imagethumb($item->image) }}" width="150"> </td>
            <td><span class="badge badge-{{ ($item->publish == 0) ? 'warning' : 'info' }}">{{ ($item->publish == 0) ? 'No' : 'Yes' }}</span></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/event/' . $item->id) }}" title="View event"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/event/' . $item->id . '/edit') }}" title="Edit event"><i class="fa fa-edit"></i> Edit</a>
                         
                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>   
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$event->lastItem()}} of {{$event->total()}} entries<br>
{!! $event->appends(['search' => $keyword])->render() !!}