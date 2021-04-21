@extends('backend.master', ['title'=>'Edit Restaurant'])
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
                    <h3 class="card-label">Restaurant - Edit</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ route('backend.restaurant.list') }}" class="btn btn-primary font-weight-bolder">
                        Restaurant list
                    </a>
                    <!--end::Button-->
                </div>
            </div>
            <!--begin::Form-->
            @include( 'backend.inc.form.restaurant_edit', array(
                'form_action'=> route('backend.restaurant.edit', $r->id),
                'form_method'=>'post',
                ))
                            
        </div>
        <!--end::Card-->
    </div>
@endsection
