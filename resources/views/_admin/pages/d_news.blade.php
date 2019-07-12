<table class="table m-0">
    <thead>
        <th>Title</th>
        <th>Date</th>
    </thead>
    <tbody>
        @foreach ($data as $datas=>$item)
            <tr> 
                <td> 
                    {{ $item->title }} 
                </td>
                <td>
                    {{ $item->published_date }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>