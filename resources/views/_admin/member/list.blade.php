<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th><th>Name</th><th>Email</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($member as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $member->firstItem() }}</td>
            <td>{{ $item->name }}</td><td>{{ $item->email }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/member/' . $item->id) }}" title="View member"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/member/' . $item->id . '/edit') }}" title="Edit member"><i class="fa fa-edit"></i> Edit</a>
                         
                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>   
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$member->lastItem()}} of {{$member->total()}} entries<br>
{!! $member->appends(['search' => $keyword])->render() !!}