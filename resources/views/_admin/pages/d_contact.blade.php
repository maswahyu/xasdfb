<table class="table m-0">
    <thead>
        <th>Name</th>
        <th>Message</th>
        <th>Date</th>
    </thead>
    <tbody>
        @foreach ($data as $datas=>$item)
            <tr> 
                <td>
                    @if(!$item->read_at)
                    <strong>{{ $item->name }}</strong>
                    @else
                    {{ $item->name }}
                    @endif
                </td>
                <td>
                    <a href="{{action('Admin\ContactController@show', $item->id)}}">{{ str_limit($item->message, 40) }}</a>
                </td>
                <td>
                    {{ $item->created_at->diffForHumans() }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>