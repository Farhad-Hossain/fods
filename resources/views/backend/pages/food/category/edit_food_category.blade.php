@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/assets/css/custom/weekedpicker.css">
@endsection

@section('main_content')
    <div class="container-fluid">
    @include('backend.message.flash_message')
    <!--begin::Card-->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-heart-rate-monitor text-primary"></i>
                    </span>
                    <h3 class="card-label">{!! __('backend_menus.add_food_category') !!}</h3>
                </div>

            </div>

            <!--begin::Form-->
            <form class="form" action="{{ route('backend.food.category.edit', $category->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{!! $category->id !!}">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Food Category Name" name="name"
                               value="{{ $category->name }}" required/>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="description" placeholder="Enter Description"
                                  class="form-control">{!! $category->description !!}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" accept="image/*" placeholder="Upload Image" name="image"/>
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!--  -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success mr-2">Add</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Card-->
    </div>
@endsection
@section('custom_script')
    <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
    <script src="{{asset('backend')}}/assets/js/customs/weekedpicker.js"></script>
@endsection
