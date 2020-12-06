<!--begin: Datatable-->
<table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
    <thead>
        <tr>
            <th colspan="2">Total Credit: </th>
            <th class="text-primary">{!! $total_credit !!}</th>

            <th>Total Debit: </th>
            <th class="text-warning">{!! $total_debit !!}</th>

            <th>Present Wallet:</th>
            <th class="text-success">{!! ($total_credit - $total_debit) !!}</th>
        </tr>

        <tr>
            <th>#</th>
            <th>Transaction Type</th>
            <th>Transaction ID</th>
            <th>Transaction Method</th>
            <th>Amount</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            
            @foreach( $transactions as $transaction )
            <tr>
                <td>{!! $loop->iteration !!}</td>
                <td>
                    @if ( $transaction->credit_debit == 1 ) 
                        <b class="text-success">Credit</b>
                    @else
                        <b class="text-danger">Debit</b>
                    @endif
                </td>
                <td>{!! $transaction->transaction_id !!}</td>
                <td>{!! $transaction->method !!}</td>
                <td>
                    @if ( $transaction->credit_debit == 1 ) 
                        <b class="text-success">+{!! $transaction->transaction_amount !!}</b>
                    @else
                        <b class="text-danger">-{!! $transaction->transaction_amount !!}</b>
                    @endif
                </td>
                <td>{!! $transaction->created_at !!}</td>
                <td>
                    <a href="" class="text-primary mr-2">
                        <i class="far fa-edit text-primary"></i>
                    </a>
                    <a href="" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                        <i class="far fa-trash-alt text-danger"></i>
                    </a>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
<!--end: Datatable-->
