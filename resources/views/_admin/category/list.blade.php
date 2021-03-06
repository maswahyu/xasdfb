<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Publish</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($category as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $category->firstItem() }}</td>
            <td><img src="{{ imagethumb($item->image) }}" width="150"></td>
            <td>{{ $item->name }}</td>
            <td>{{ ($item->parent_id == 0) ? "Top Parent" : optional($item->parent)->name }}</td>
            <td><span class="badge badge-{{ ($item->publish == 0) ? 'warning' : 'info' }}">{{ ($item->publish == 0) ? 'No' : 'Yes' }}</span></td>
            <td>{{ $item->created_at }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/category/' . $item->id) }}" title="View category"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/category/' . $item->id . '/edit') }}" title="Edit category"><i class="fa fa-edit"></i> Edit</a>
                         
                        {{-- <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a> --}}   
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$category->lastItem()}} of {{$category->total()}} entries<br>
{!! $category->appends(['search' => $keyword])->render() !!}