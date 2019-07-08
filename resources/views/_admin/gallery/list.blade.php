<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th><th>Value</th><th>Title</th><th>Album</th><th>Type</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($gallery as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $gallery->firstItem() }}</td>
            <td>
                @if($item->type == 'photo')
                    <img src="{{ imagethumb($item->value) }}" width="150">
                @else 
                    <img src="https://img.youtube.com/vi/{{ $item->youtube_id }}/mqdefault.jpg" width="150">
                @endif
            </td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->album->name }}</td>
            <td>
                <span class="badge badge-{{ ($item->publish == 0) ? 'warning' : 'info' }}">{{ ($item->publish == 0) ? 'No' : 'Yes' }}</span>
                @if(($item->is_featured == 1))
                    <span class="badge badge-primary">Featured</span><br>
                @endif
            </td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/gallery/' . $item->id) }}?type={{ $type }}" title="View gallery"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/gallery/' . $item->id . '/edit') }}?type={{ $type }}" title="Edit gallery"><i class="fa fa-edit"></i> Edit</a>
                         
                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>   
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$gallery->lastItem()}} of {{$gallery->total()}} entries<br>
{!! $gallery->appends(['search' => $keyword])->render() !!}