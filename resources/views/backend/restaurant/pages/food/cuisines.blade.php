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
                    <h3 class="card-label">{{ __('cuisines.cuisines') }}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline mr-2">
                        <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i>Export</button>
                        <!--begin::Dropdown Menu-->
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav flex-column nav-hover">
                                <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an option:</li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-print"></i>
                                        <span class="nav-text">Print</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-copy"></i>
                                        <span class="nav-text">Copy</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-excel-o"></i>
                                        <span class="nav-text">Excel</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-text-o"></i>
                                        <span class="nav-text">CSV</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon la la-file-pdf-o"></i>
                                        <span class="nav-text">PDF</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--end::Dropdown Menu-->
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="#" class="btn btn-primary font-weight-bolder" onclick="clear_value_and_rise_modal()" data-toggle="modal" data-target="#cuisines_modal">
                        <i class="la la-plus"></i>New Record
                    </a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="restaurant_table" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('cuisines.name') }}</th>
                            <th>{{ __('cuisines.status') }}</th>
                            <th>{{ __('cuisines.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cuisines as $cuisine)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $cuisine->name }}</td>
                            
                            @if( $cuisine->status == 1 )
                               <td><b class="text-success">Active</b></td>
                            @else
                                <td><b class="text-danger">Disabled</b></td>
                            @endif

                            <td>
                                
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


    <!-- Modal-->
    <div class="modal fade" id="cuisines_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cuisine_modal_title">{{ __('cuisines.modal_create_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    

                    <div class="card card-custom">
                     <!--begin::Form-->
                     <form class="form" action="{{ route('backend.food.cuisines.add_submit') }}" method="post">
                        @csrf
                      <div class="card-body">
                        <input type="hidden" name="id">
                       <div class="form-group">
                        <label>{{ __('cuisines.name') }}</label>
                        <input type="text" class="form-control"  placeholder="Cuisines Name" name="name" required />
                       </div>
                      </div>
                      <div class="card-footer">
                       <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                       <button type="reset" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
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
    <script type="text/javascript" src="{{asset('backend')}}/assets/js/customs/cuisine_list_page.js"></script>
@endsection