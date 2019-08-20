<table class="table table-hover">
    <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                Name
            </th>
            <th>
                Subject
            </th>
            <th>
                Message
            </th>
            <th>
                Created At
            </th>
            <th>
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $datas=>$item)
            <tr id="row_{{$item->id}}">
                <td>
                    <center>
                        <input type="checkbox" id="checkbox" class="myCheckboxes" value="{{ $item->id }}">
                    </center>
                </td>
                <td>
                    @if(!$item->read_at)
                    <strong>{{ $item->name }}</strong>
                    @else
                    {{ $item->name }}
                    @endif
                </td>
                <td>
                    {{ $item->subject }}
                </td>
                <td>
                    <a href="{{action('Admin\ContactController@show', $item->id)}}">{{ $item->message }}</a>
                </td>
                <td>
                    {{ $item->created_at->diffForHumans() }}
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{action('Admin\ContactController@show', $item->id)}}"><i class="fa fa-eye"></i> View</a>
                            <a class="dropdown-item" onclick="user_action({{$item->id}}, 'destroy')" href="javascript:void(0)"><i class="fa fa-trash"></i> Delete </a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
Showing {{$data->lastItem()}} of {{$data->total()}} entries<br>
{!! $data->appends(['search' => $keyword])->render() !!}