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
                    <h3 class="card-label">Add Driver</h3>
                </div>
                
            </div>
            <div class="card-body">
                
            </div>
        </div>
        <!--end::Card-->
    </div>


    <!-- Modal-->
    <div class="modal fade" id="cuisines_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cuisine_modal_title">{{ __('cuisines.modal__create_title') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    

                    <div class="card card-custom">
                     <!--begin::Form-->
                     <form class="form" action="{{ route('backend.restaurant.cuisines.add_submit') }}" method="post">
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
    
@endsection