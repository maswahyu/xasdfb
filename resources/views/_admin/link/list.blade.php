<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th><th>Name</th><th>Url</th><th>Created At</th><th>Updated At</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($link as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $link->firstItem() }}</td>
            <td>{{ $item->name }}</td><td><a href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td><td>{{ $item->created_at }}</td><td>{{ $item->updated_at }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/link/' . $item->id) }}" title="View link"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/link/' . $item->id . '/edit') }}" title="Edit link"><i class="fa fa-edit"></i> Edit</a>
                         
                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>   
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$link->lastItem()}} of {{$link->total()}} entries<br>
{!! $link->appends(['search' => $keyword])->render() !!}