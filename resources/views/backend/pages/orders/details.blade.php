@extends('backend.master')
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
                    <h3 class="card-label">{!! __('order.order_details') !!}</h3>
                </div>
                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    <table class="table table-hover">
                        <thead>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="2" class="text-center bg-light">Food Information</th>
                            <tr>
                                <th>{!! __('order.food_name') !!}</th>
                                <td>{!! $order->details->food->food_name !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('common.price') !!}</th>
                                <td>{!! $order->details->food->price !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('order.discount_price') !!}</th>
                                <td>{!! $order->details->food->discount_price !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('order.restaurant') !!}</th>
                                <td>{!! $order->details->restaurant->name !!}</td>
                            </tr>
                            
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                    </div>

                    <div class="col-sm-12 col-md-6">
                    <table class="table table-hover">
                        <thead>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <th colspan="2" class="text-center bg-light">{!! __('order.customer_info') !!}</th>
                            <tr>
                                <th>{!! __('order.customer_name') !!}</th>
                                <td>{!! $order->user->name !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('common.email') !!}</th>
                                <td>{!! $order->user->email !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('order.mobile_no') !!}</th>
                                <td>{!! $order->user->customer->phone_number !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('order.ip') !!}</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>{!! __('common.time') !!}</th>
                                <td>{!! $order->created_at !!}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                    </div>

                    <div class="col-sm-12 col-md-6">
                    <table class="table table-hover">
                        <thead>
                            
                        </thead>
                        <tbody>
                            <tr>
                               <th colspan="2" class="text-center bg-light">{!! __('order.payment_info') !!}</th> 
                            </tr>
                            <tr>
                                <th>{!! __('order.order_id') !!}</th>
                                <th>{!! $order->order_id !!}</th>
                            </tr>
                            <tr>
                                <th>{!! __('order.payment_type') !!}</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>{!! __('order.payment_amount') !!}</th>
                                <td>{!! $order->payable_amount !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('order.sub_total') !!}</th>
                                <td>{!! $order->sub_total !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('order.discount') !!}</th>
                                <td>{!! $order->total_discount !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('order.paid_amount') !!}</th>
                                <td>{!! $order->paid_amount !!}</td>
                            </tr>
                            <tr>
                                <th>{!! __('order.payment_status') !!}</th>
                                @if( $order->payment_status == 0 )
                                    <td><b class="badge badge-danger">Pending</b></td>
                                @elseif( $order->payment_status == 1 )
                                    <td><b class="badge badge-success">Paid</b></td>
                                @endif
                            </tr>
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                    </div>

                    <div class="col-sm-12 col-md-6">
                    <table class="table table-hover">
                        <thead>
                            
                        </thead>
                        <tbody>
                            <tr>
                               <th colspan="2" class="text-center bg-light">{!! __('common.action') !!}</th> 
                            </tr>
                            
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection