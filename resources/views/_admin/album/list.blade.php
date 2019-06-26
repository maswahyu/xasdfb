<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th><th>Name</th><th>Created At</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($album as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $album->firstItem() }}</td>
            <td>{{ $item->name }}</td><td>{{ $item->created_at }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/album/' . $item->id) }}" title="View album"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/album/' . $item->id . '/edit') }}" title="Edit album"><i class="fa fa-pencil"></i> Edit</a>
                         
                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>   
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$album->lastItem()}} of {{$album->total()}} entries<br>
{!! $album->appends(['search' => $keyword])->render() !!}