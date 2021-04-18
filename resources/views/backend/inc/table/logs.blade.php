<!--begin: Datatable-->
<table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
    <thead>
        <tr>
            <th>#</th>
            <th>Log Type</th>
            <th>Time</th>
            <th>Details</th>
            <th>Ip address</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$log->type}}</td>
                <td>{{$log->created_at->diffForHumans()}}</td>
                <td>{{$log->detail_message}}</td>
                <td>{{$log->client_info['ip_address']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->

