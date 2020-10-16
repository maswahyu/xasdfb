<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>ID</th><td>{{ $eventstream->id }}</td>
            </tr>
            <tr>
                <th> Name </th>
                <td> {{ $eventstream->name }} </td>
            </tr>
            <tr>
                <th> Slug </th>
                <td> {{ $eventstream->slug }} </td>
            </tr>
            <tr>
                <th> Youtube Link </th>
                <td> {{ $eventstream->yt_link }} </td>
            </tr>
            <tr>
                <th> Thumbnail </th>
                <td> <img src="{{ imagethumb($eventstream->thumbnail) }}" width="200"> </td>
            </tr>
            <tr>
                <th> Event Date </th>
                <td> {{ $eventstream->event_date }} </td>
            </tr>
            <tr>
                <th> Periode </th>
                <td> {{ $eventstream->periode_start }} s/d {{ $eventstream->periode_end }} </td>
            </tr>
            <tr>
                <th> Live Chat </th>
                <td> <span class="badge badge-{{ ($eventstream->live_chat == 0) ? 'warning' : 'info' }}">{{ ($eventstream->live_chat == 0) ? 'No' : 'Yes' }}</span> </td>
            </tr>
            <tr>
                <th> Status </th>
                <td><span class="badge badge-{{ ($eventstream->publish == 0) ? 'warning' : 'info' }}">{{ ($eventstream->publish == 0) ? 'No' : 'Yes' }}</span></td>
            </tr>
            <tr>
                <th> Total View </th>
                <td><span class="badge badge-danger">{{ $eventstream->total_view }}</span></td>
            </tr>
            <tr>
                <th> Total Audience User </th>
                <td><span class="badge badge-success">{{ $total_audience['total_user'] }}</span></td>
            </tr>
            <tr>
                <th> Total Audience Guest </th>
                <td><span class="badge badge-success">{{ $total_audience['total_guest'] }}</span></td>
            </tr>
        </tbody>
    </table>
</div>
