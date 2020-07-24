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
                    <h3 class="card-label">{!! __('food.add_food') !!}</h3>
                </div>
                
            </div>
            <div class="card-body">
                <!--begin::Form-->
                            <form class="form" action="{{ route('backend.restAdmin.food.add') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="restaurant" value="{!! Auth::user()->restaurant->id !!}">  
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="food_category">{!! __('admin_add_food.food_category') !!} <span class="text-danger">*</span></label>
                                            <select name="food_category" id="food_category" class="form-control selectpicker" required data-size="7" data-live-search="true">
                                                <option value="">Select</option>
                                                @if(!empty($food_categories))
                                                    @foreach($food_categories as $food_category)
                                                        <option value="{!! $food_category->id !!}" {!! (old('food_category') == $food_category->id)?'selected':'' !!}>{!! $food_category->name !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('food_category')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="name">{!! __('common.name') !!}<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Food Name" name="name"
                                                   value="{{ old('name') }}" required/>
                                            @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{!! __('common.image') !!}</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" accept="image/*" placeholder="Upload Image" name="image"/>
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="price">{!! __('common.price') !!} <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" class="form-control" placeholder="Enter Food Price" name="price"
                                                   value="{{ old('price') }}" required/>
                                            @error('price')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="discount_price">{!! __('admin_add_food.discount_price') !!} <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" class="form-control" placeholder="Enter Food Discount Price" name="discount_price"
                                                   value="{{ old('discount_price') }}" required/>
                                            @error('discount_price')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="description">{!! __('common.description') !!}</label>
                                            <textarea name="description" id="description" placeholder="Enter Description"
                                                      class="form-control">{!! old('description') !!}</textarea>
                                            @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="ingredients">{!! __('admin_add_food.ingredients') !!}</label>
                                            <textarea name="ingredients" id="ingredients" placeholder="Enter Ingredients"
                                                      class="form-control">{!! old('ingredients') !!}</textarea>
                                            @error('ingredients')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="unit">{!! __('common.unit') !!} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Food Unit" name="unit"
                                                   value="{{ old('unit') }}" required/>
                                            @error('unit')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="package_count">{!! __('admin_add_food.package_count') !!} <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" placeholder="Enter Number Of Item Per Package" name="package_count"
                                                   value="{{ old('package_count') }}" min="0" required/>
                                            @error('package_count')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label for="weight">{!! __('common.weight') !!} <span class="text-danger">*</span></label>
                                            <input type="number" step="0.01" class="form-control" placeholder="Enter Food Weight Per Unit" name="weight"
                                                   value="{{ old('weight') }}" min="0.0" required/>
                                            @error('weight')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label></label>
                                            <div class="checkbook-inline">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="featured" value="1">{!! __('admin_add_food.featured_food') !!}
                                                    <span></span>
                                                </label>
                                                @error('featured')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror

                                                <label class="checkbox">
                                                    <input type="checkbox" name="deliverable" value="1" /> {!! __('admin_add_food.deliverable_food') !!}
                                                    <span></span>
                                                </label>
                                                @error('deliverable')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success mr-2">Add Food</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    
                                    <a  href="{!! URL::previous() !!}" type="button" class="btn btn-success mr-2">
                                        Cancel
                                    </a>
            
                            </form>
                            <!--end::Form-->
            </div>
        </div>
        <!--end::Card-->
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.3"></script>
    <script src="{{asset('backend')}}/assets/js/pages/crud/datatables/advanced/column-visibility.js?v=7.0.3"></script>
    <script type="text/javascript">
        $("#restaurant_table").dataTable();
    </script>
@endsection