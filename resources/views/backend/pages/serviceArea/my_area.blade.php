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
                    <h3 class="card-label">Coverage Area</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Form-->
                <!--begin::Form-->
                <form class="form" action="" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="driver_id">
                    
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label>City</label>
                            <select name="city_id" class="form-control">
                                @foreach($cities as $c)
                                    <option value="{!! $c->id !!}" {!! $c->id == $city->id ? 'selected' : '' !!} >{!! $c->name !!}</option>
                                @endforeach
                            </select>
                        </div>  
                        
                        <div class="col-sm-12 col-md-6"></div>

                        @foreach( $areas as $area )
                        <div class="col-sm-2">
                            <label class="checkbox checkbox-outline checkbox-primary w-100 mb-2">
                                <input type="checkbox" name="areas[]"/> {!! $area->area_name !!}
                                <span></span>
                            </label>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                        <a  href="{!! URL::previous() !!}" type="button" class="btn btn-success mr-2">
                            Cancel
                        </a>
                    </div>
                <!--end::Form-->
                </form>
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    <script type="text/javascript" src="{{asset('backend/assets/js/customs/')}}/role_manage.js"></script>
@endsection
