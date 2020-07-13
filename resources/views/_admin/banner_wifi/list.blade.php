<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Publish</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bannerWifi as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $bannerWifi->firstItem() }}</td>
            <td><img src="{{ imagethumb($item->image) }}" width="150"></td>
            <td>{{ $item->title }}</td>
            <td><span class="badge badge-{{ ($item->publish == 0) ? 'warning' : 'info' }}">{{ ($item->publish == 0) ? 'No' : 'Yes' }}</span></td>
            <td>{{ $item->created_at }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/bannerwifi/' . $item->id) }}" title="View Banner Wifi"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/bannerwifi/' . $item->id . '/edit') }}" title="Edit Banner Wifi"><i class="fa fa-edit"></i> Edit</a>

                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$bannerWifi->lastItem()}} of {{$bannerWifi->total()}} entries<br>
{!! $bannerWifi->appends(['search' => $keyword])->render() !!}
