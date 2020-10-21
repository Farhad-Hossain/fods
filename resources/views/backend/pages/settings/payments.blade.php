@extends('backend.master', ['title'=>'Payment Settings'])
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
                    <h3 class="card-label">Payment Methods</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="javascript:;" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#addPaymentModal">
                        <i class="la la-plus"></i>Add Payment method
                    </a><!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="datatable_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Method Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($methods as $method)
                        <tr>
                           <td>{{$loop->iteration}}</td> 
                           <td>{{$method->method_name}}</td>
                           <td>
                               @if($method->status == 1)
                                {{'Active'}}
                               @else
                                {{'Inactive'}}
                               @endif
                           </td>
                           <td>
                               <a href="javascript:;" class="text-primary mr-2" data-toggle="modal" data-target="#editPaymentMethodModal" onclick="setValueAndRiseModal('{{$method->id}}', '{{$method->method_name}}')">
                                   <i class="far fa-edit text-primary"></i>
                               </a>
                               <a href="{{route('backend.settings.paymentMethodDeleteSubmit', $method->id)}}" class="text-danger" onclick="return confirm('Are you sure want to delete ??')">
                                   <i class="far fa-trash-alt text-danger"></i>
                               </a>
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
    <!-- Edit Modal-->
    <div class="modal fade" id="editPaymentMethodModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tag_modal_title">Payment method </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-custom">
                     <!--begin::Form-->
                     <form class="form" action="{{route('backend.settings.editPaymentMethod')}}" method="post">
                        @csrf
                        
                      <div class="card-body">
                        <input type="hidden" name="id" id="editMethodIdField">
                       <div class="form-group">
                        <label>Method's name</label>
                        <input type="text" class="form-control"  placeholder="Payment method Name" name="name" required id="editMethodNameField" />
                       </div>
                      </div>
                      <div class="card-footer">
                       <button type="submit" class="btn btn-success mr-2">Save changes</button>
                       <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                     </form>
                     <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal-->
    <div class="modal fade" id="addPaymentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tag_modal_title">Payment method </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-custom">
                     <!--begin::Form-->
                     <form class="form" action="{{route('backend.settings.addPaymentMethod')}}" method="post">
                        @csrf
                        <input type="hidden" name="id">
                      <div class="card-body">
                       <div class="form-group">
                        <label>Method's name</label>
                        <input type="text" class="form-control"  placeholder="Payment method Name" name="name" required />
                       </div>
                      </div>
                      <div class="card-footer">
                       <button type="submit" class="btn btn-success mr-2">Create Method</button>
                       <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      </div>
                     </form>
                     <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/datatable.js"></script>
    <script type="text/javascript">
        function setValueAndRiseModal(id, name)
        {
            $("#editMethodIdField").val('');
            $("#editMethodIdField").val(id);

            $("#editMethodNameField").val('');
            $("#editMethodNameField").val(name);



        }        
    </script>
@endsection
