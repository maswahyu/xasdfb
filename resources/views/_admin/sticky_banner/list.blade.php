<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Publish</th>
            <th>Publish Day</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @php
    $dayOfWeek = [
        1 => 'Senin',
        2 => 'Selasa',
        3 => 'Rabu',
        4 => 'Kamis',
        5 => 'Jumat',
        6 => 'Sabtu',
        7 => 'Minggu',
    ];
    @endphp
    @foreach($stickyBanner as $items=>$item)
        <tr id="row_{{$item->id}}">
            <td>{{ $items + $stickyBanner->firstItem() }}</td>
            <td><img src="{{ imagethumb($item->image) }}" width="150"></td>
            <td>{{ $item->name }}</td>
            <td><span class="badge badge-{{ ($item->status == 0) ? 'warning' : 'info' }}">{{ ($item->status == 0) ? 'No' : 'Yes' }}</span></td>
            <td>{{ $dayOfWeek[$item->pub_day] }}</td>
            <td>{{ $item->created_at }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/magic/stickybanner/' . $item->id) }}" title="View Banner Wifi"><i class="fa fa-eye"></i> View</a>

                        <a class="dropdown-item" href="{{ url('/magic/stickybanner/' . $item->id . '/edit') }}" title="Edit Banner Wifi"><i class="fa fa-edit"></i> Edit</a>

                        <a class="dropdown-item copy-sticky" onclick="copyStickyBanner({{$item->id}})" data-id="{{ $item->id }}" href="javascript:void(0)" title="Edit Banner Wifi"><i class="fa fa-copy"></i> Copy</a>

                        <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
Showing {{$stickyBanner->lastItem()}} of {{$stickyBanner->total()}} entries<br>
{!! $stickyBanner->appends(['search' => $keyword])->render() !!}
