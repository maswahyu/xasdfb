<div class="row mb-2">
    <div class="col-md-8">
        <h5>Chat Message</h5>
    </div>
    <div class="col-md-3 d-flex align-items-center">
        <span class="mr-1">Filter</span>
        <select name="" id="filter" class="form-control form-control-sm">
            <option value="" {{ ( (request()->get('type_chat') == '' || request()->get('type_chat') == null) ? 'selected' : '') }}>All</option>
            <option value="excel" {{ (request()->get('type_chat') == 'excel' || request()->get('type_chat') == '')  ? 'selected' : '' }}>Excel</option>
            <option value="txt" {{ request()->get('type_chat') == 'txt' ? 'selected' : '' }}>Txt</option>
        </select>
    </div>
    <div class="col-md-1">
        <button id="exportChat" value="{{ $eventstream->id }}" class="btn btn-primary btn-sm">Export</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th width="50px">Time</th>
                        <th width="150px">Name</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chats as $items=>$item)
                    <tr>
                        <td>{{ $item->chatTime }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->message }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$chats->appends(['tab' => 'chat'])->links()}}
        </div>
    </div>
</div>

@push('stack_js')
<script>
    $("#exportChat").click(function(e) {
        if($("#filter").val() == '') {
            document.location = "{!! url('magic/export/chat-event-stream/' . $eventstream->id . '?tab=report') !!}";
            return;
        }
        document.location = "{!! url('magic/export/chat-event-stream/' . $eventstream->id . '?tab=report&type_chat=') !!}" + $("#filter").val();
    })
</script>
@endpush
