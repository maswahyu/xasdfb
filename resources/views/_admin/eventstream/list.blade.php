<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Thumbnail</th>
            <th>Name</th>
            <th>Event Date</th>
            <th>Status</th>
            <th>Live Chat</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($eventstream as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $eventstream->firstItem() }}</td>
            <td><img src="{{ imagethumb($item->thumbnail) }}" width="150"></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->event_date }}</td>
            <td><span class="badge badge-{{ (! $item->isPublished()) ? 'warning' : 'info' }}">{{ ($item->publish == 0) ? 'No' : 'Yes' }}</span></td>
            <td><span class="badge badge-{{ (! $item->isChatEnabled()) ? 'warning' : 'info' }}">{{ ($item->live_chat == 0) ? 'No' : 'Yes' }}</span></td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/eventstream/' . $item->id) }}" title="View eventstream"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/eventstream/' . $item->id . '/edit') }}" title="Edit eventstream"><i class="fa fa-edit"></i> Edit</a>

                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$eventstream->lastItem()}} of {{$eventstream->total()}} entries<br>
{!! $eventstream->appends(['search' => $keyword])->render() !!}
