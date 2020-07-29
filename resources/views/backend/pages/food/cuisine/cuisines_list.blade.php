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
                        
                    </div>
                    <!--end::Dropdown-->
                    <!--begin::Button-->
                    <a href="#" class="btn btn-primary font-weight-bolder" onclick="clear_value_and_rise_modal()" data-toggle="modal" data-target="#cuisines_modal">
                        <i class="la la-plus"></i>Add Cuisine
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
                                <a href="" data-toggle="modal" data-target="#cuisines_modal" onclick="set_value_and_rise_modal(
                                                                             '{{ $cuisine->id }}',
                                                                             '{{ $cuisine->name }}'
                                )"><i class="far fa-edit text-primary"></i></a> | 
                                <a href="{{ route('backend.food.cuisines.delete', $cuisine->id) }}" onclick="return confirm('Are you sure want to delete ?')"><i class="far fa-trash-alt text-danger ml-2"></i></a>
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
