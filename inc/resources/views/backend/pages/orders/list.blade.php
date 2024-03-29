@extends('backend.master', ['title'=>'Orders'])
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet" type="text/css" />
@endsection
@section('main_content')
    <div class="container-fluid">
        @include('backend.message.flash_message')
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">{!! __('order.order_list') !!}</h3>
                </div>
                <div class="card-toolbar">
                    
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{!! __('order.order_id') !!}</th>
                            <th>{!! __('order.customer_name') !!}</th>
                            <th>{!! __('order.payable_amount') !!}</th>
                            <th>{!! __('order.delivery_address') !!}</th>
                            <th>{!! __('common.status') !!}</th>
                            <th>{!! __('common.action') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{!! $loop->iteration !!}</td>
                            <td>{!! $order->order_id !!}</td>
                            <td>{!! $order->user->name !!}</td>
                            <td>{!! $order->payable_amount !!}</td>
                            <td>{!! $order->cityArea->area_name ?? '' !!}  {!! $order->delivery_address !!}</td>
                            <td>
                                <b class="text-primary">
                                    @if ( $order->order_status == 1 ) 
                                        Order Recieved
                                    @elseif ( $order->order_status == 2 )
                                        Processing
                                    @elseif ( $order->order_status == 3 )
                                        Delivered
                                    @endif
                                </b>
                                <b class="badge badge-primary status_change_btn" oid="{!! $order->id !!}" status_name="{!! $order->status->status_name !!}" style="cursor: pointer;">
                                    Change
                                </b>
                            </td>
                            <td>
                                <a href="{!! route('backend.order.details', $order->id) !!}">
                                    <i class="fas fa-border-none text-primary mr-2"></i>
                                </a>
                                <a href="javascript:;" class="text-primary mr-2">
                                    <i class="far fa-edit text-primary"></i>
                                </a>
                                <a href="{!! route('backend.order.delete', $order->id) !!}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                    <i class="far fa-trash-alt text-danger"></i>
                                </a>
                                <a href="javascript:;" onclick="rise_assign_driver_modal(
                                {!! $order->id !!}
                                )">Assign Driver</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('modals')
    <!-- Payment Status modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="payment_status_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Payment Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{!! route('backend.order.change_payment_status') !!}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_order_id" value="">
                        <label class="radio radio-primary">
                            <input type="radio" checked="" name="payment_status" value="0" /> Pending
                            <span></span>
                        </label>
                        <br />
                        <br />
                        <label class="radio radio-primary">
                            <input type="radio" checked="unchecked" name="payment_status" value="1"/> Paid
                            <span></span>
                        </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- Sattus Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="status_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{!! route('backend.order.change_status') !!}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="">
                        <select class="form-control" name="order_status">
                            <option value="1">Order recieved</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- Asign driver modal  -->
    <div class="modal fade" tabindex="-1" role="dialog" id="assign_driver_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign a driver</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{!! route('backend.order.assign_driver') !!}" method="POST">
                        @csrf
                        <input type="hidden" name="order_id" value="">
                        <select class="form-control selectpicker" data-size="7" data-live-search="true" name="driver_id" required>
                            @foreach ( $drivers as $driver ) 
                                <option value="{!! $driver->id !!}">{!! $driver->user->name !!} - {!! $driver->phone !!}</option>
                            @endforeach
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Appoint</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
@endsection


@section('custom_script')
    <script type="text/javascript">
        function rise_assign_driver_modal(order_id)
        {
            $("#assign_driver_modal input[name='order_id']").val(order_id);
            $("#assign_driver_modal").modal();
        }
    </script>
    <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
    <script src="{!! asset('frontend') !!}/js/custom/weekedpicker.js"></script>
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
    <script src="{{asset('backend')}}/assets/js/customs/orders_list.js"></script>
@endsection
