<!--begin: Datatable-->
<table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
    <thead>
        <tr>
            <th>#</th>
            <th>{!! __('rest_list.name') !!}</th>
            <th>{!! __('rest_list.owner') !!}</th>
            <th>{!! __('rest_list.city') !!}</th>
            <th>{!! __('rest_list.phone') !!}</th>
            <th>{!! __('rest_list.address') !!}</th>
            <th>{!! __('rest_list.open_status') !!}</th>
            <th>{!! __('rest_list.delivery_charge') !!}</th>
            <th>{!! __('rest_list.systmem_commision') !!}</th>
            <th>{!! __('rest_list.payment_method') !!}</th>
            
            @if( \App\Helpers\Helper::haveAccess('rest_edit') )
                <th>{!! __('rest_list.action') !!}</th>
            @endif
            
            

        </tr>
    </thead>
    <tbody>
        @foreach($rs as $r)
        <tr>
            <td>{!! $loop->iteration !!}</td>

            <td>{!! $r->name !!}</td>
            <td>{!! $r->owner['name'] !!}</td>
            <td>{!! $r->restCity->name !!}</td>
            <td>{!! $r->phone !!}</td>
            <td>{!! $r->address !!}</td>
            <td>{!! ($r->open_status == 1) ? 'Opened' : 'Closed' !!}</td>
            <td>{!! $r->delivery_charge !!}</td>
            <td>{!! $r->selling_percentage !!}</td>
            <td>{!! ($r->payment_method==1) ? 'Cash Only' : 'Card Only'  !!}</td>
            @if( \App\Helpers\Helper::haveAccess('rest_edit') )
            <td>
                <a href="{{ route('backend.restaurant.edit', $r->id) }}" class="text-primary mr-2">
                    <i class="far fa-edit text-primary"></i>
                </a>
                <a href="{!! route('backend.restaurant.delete', $r->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                    <i class="far fa-trash-alt text-danger"></i>
                </a>
            </td>
            @endif
            
        </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->
