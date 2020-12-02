<!--begin: Datatable-->
<table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
    <thead>
        <tr>
            <th>#</th>
            <th>Promo Code</th>
            <th>Discount Price</th>
            <th>Applicable For</th>
            <th>Limit</th>
            <th>Selling Count</th>
            <th>Available</th>
            <th>Valid From</th>
            <th>Valid Till</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($discount_coupons as $coupon)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$coupon->promo_code}}</td>
                <td>
                    <b>{{$coupon->discount_price}}</b>
                    @if($coupon->promo_type==1)
                        <b class="text-primary">(Flate rate)</b>
                    @else
                        <b class="text-primary">(Percentage)</b>
                    @endif
                </td>
                <td>
                    @if($coupon->applicable_for==1)
                        All Users
                    @else
                        New Users
                    @endif
                </td>
                <td>{{$coupon->promo_code_limit}}</td>
                <td>{{$coupon->selling_count}}</td>
                <td>{{$coupon->promo_code_limit-$coupon->selling_count}}</td>
                <td>
                    @if ( $coupon->valid_date_from == '2020-01-01' ) 
                        <b class="bg-success text-light px-2 rounded">Always</b> 
                    @else
                        <b class="bg-success text-light px-2 rounded">{!! $coupon->valid_date_from !!}</b> 
                    @endif
                <td>
                    @if($coupon->valid_date_to < now())
                        @if ( $coupon->valid_date_to == '2020-01-01' ) 
                            <b class="bg-success text-light px-2 rounded">Always</b>  
                        @else
                            <b class="bg-danger text-light px-2 rounded">{{$coupon->valid_date_to}}</b>
                        @endif
                    @else
                        <b class="bg-success text-light px-2 rounded">{{$coupon->valid_date_to}}</b>
                    @endif
                </td>
                <td>{!! $coupon->created_at !!}</td>
                <td>
                    <a href="{{route('backend.settings.edit_coupon_view', $coupon->id)}}" class="text-primary mr-2">
                        <i class="far fa-edit text-primary"></i>
                    </a>
                    <a href="{{route('backend.settings.delete_coupon_submit', base64_encode($coupon->id) )}}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                        <i class="far fa-trash-alt text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->
