<div class="row mb-2">
    <div class="col-md-8">
        <h5>Audience List</h5>
    </div>
    <div class="col-md-3 d-flex align-items-center">
        <span class="mr-1">Filter</span>
        <select name="" id="filter" class="form-control form-control-sm">
            <option value="" {{ ( (request()->get('type') == '' || request()->get('type') == null) ? 'selected' : '') }}>All</option>
            <option value="{{\App\AudienceEventStream::TYPE_GUEST}}" {{ request()->get('type') == \App\AudienceEventStream::TYPE_GUEST ? 'selected' : '' }}>Guest</option>
            <option value="{{\App\AudienceEventStream::TYPE_USER}}" {{ request()->get('type') == \App\AudienceEventStream::TYPE_USER ? 'selected' : '' }}>User</option>
        </select>
    </div>
    <div class="col-md-1">
        <button id="export" value="{{ $eventstream->id }}" class="btn btn-primary btn-sm">Export</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($audience as $items=>$item)
                    <tr>
                        <td>{{ $items + $audience->firstItem() }}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->type}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$audience->appends(['tab' => 'report'])->links()}}
        </div>
    </div>
</div>

@push('stack_js')
<script>
    $("#filter").change(function(e) {
        if($("#filter").val() == '') {
            document.location = "{!! url('magic/eventstream/' . $eventstream->id . '?tab=report') !!}";
            return;
        }
        document.location = "{!! url('magic/eventstream/' . $eventstream->id . '?tab=report&type=') !!}" + $("#filter").val();
    })

    $("#export").click(function(e) {
        if($("#filter").val() == '') {
            document.location = "{!! url('magic/export/audience-event-stream/' . $eventstream->id . '?tab=report') !!}";
            return;
        }
        document.location = "{!! url('magic/export/audience-event-stream/' . $eventstream->id . '?tab=report&type=') !!}" + $("#filter").val();
    })
</script>
@endpush
