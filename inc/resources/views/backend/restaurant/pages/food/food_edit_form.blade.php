@extends('backend.master', ['title'=>'Edit Food info'])
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.css') !!}">
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
                    <h3 class="card-label">{!! __('food.edit_food') !!}</h3>
                </div>

            </div>

            <!--begin::Form-->
            <form class="form" action="{{ route('backend.restAdmin.food.edit_food_submit', $food->id) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="restaurant">{!! __('food.restaurant') !!} <span class="text-danger">*</span></label>
                            <select name="restaurant" id="restaurant" class="form-control" required>
                                <option value="">--Select Restaurant--</option>
                                @if(!empty($restaurants))
                                    @foreach($restaurants as $restaurant)
                                        <option value="{!! $restaurant->id !!}" {!! ($food->restaurant_id == $restaurant->id)?'selected':'' !!}>{!! $restaurant->name !!}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('restaurant')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="food_category">{!! __('food.food_category') !!} <span class="text-danger">*</span></label>
                            <select name="food_category" id="food_category" class="form-control" required>
                                <option value="">--Select Food Category--</option>
                                @if(!empty($food_categories))
                                    @foreach($food_categories as $food_category)
                                        <option value="{!! $food_category->id !!}" {!! ($food->food_category_id == $food_category->id)?'selected':'' !!}>{!! $food_category->name !!}</option>
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
                                   value="{!! $food->food_name !!}" required/>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="price">{!! __('common.price') !!} <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" placeholder="Enter Food Price" name="price"
                                   value="{{ $food->price }}" required/>
                            @error('price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <img src="{{asset('uploads')}}/{{$food->image1}}" style="height: 70px; width: 70px; display: block">
                            <label>Image 1</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="image/*" placeholder="Upload Image" name="image1"/>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('image1')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <img src="{{asset('uploads')}}/{{$food->image2}}" style="height: 70px; width: 70px; display: block">
                            <label>Image 2</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="image/*" placeholder="Upload Image" name="image2"/>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('image2')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-4">
                            <img src="{{asset('uploads')}}/{{$food->image3}}" style="height: 70px; width: 70px; display: block">
                            <label>Image 3</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="image/*" placeholder="Upload Image" name="image3"/>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('image3')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="discount_price">{!! __('admin_add_food.discount_price') !!} <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" placeholder="Enter Food Discount Price" name="discount_price"
                                   value="{{ $food->discount_price }}" required/>
                            @error('discount_price')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="description">{!! __('common.description') !!}</label>
                            <textarea name="description" id="description" placeholder="Enter Description"
                                      class="form-control">{!! $food->description !!}</textarea>
                            @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="ingredients">{!! __('admin_add_food.ingredients') !!}</label>
                            <textarea name="ingredients" id="ingredients" placeholder="Enter Ingredients"
                                      class="form-control">{!! $food->ingredients !!}</textarea>
                            @error('ingredients')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="unit">{!! __('common.unit') !!} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Food Unit" name="unit"
                                   value="{!! $food->unit !!}" required/>
                            @error('unit')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="package_count">{!! __('admin_add_food.package_count') !!} <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Number Of Item Per Package" name="package_count"
                                   value="{!! $food->package_count !!}" min="0" required/>
                            @error('package_count')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label for="weight">{!! __('common.weight') !!} <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" placeholder="Enter Food Weight Per Unit" name="weight"
                                   value="{!! $food->weight !!}" min="0.0" required/>
                            @error('weight')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label></label>
                            <div class="checkbook-inline">
                                <label class="checkbox">
                                    <input type="checkbox" name="featured" value="{!! $food->featured !!}" {!! $food->featured == 1 ? 'checked' : '' !!} >{!! __('admin_add_food.featured_food') !!}
                                    <span></span>
                                </label>
                                @error('featured')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <label class="checkbox">
                                    <input type="checkbox" name="deliverable" value="{!! $food->deliverable_food !!}" {!! $food->deliverable_food == 1 ? 'checked' : '' !!} /> {!! __('admin_add_food.deliverable_food') !!}
                                    <span></span>
                                </label>
                                @error('deliverable')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-6">
                            <label>Select Extra Foods</label>
                            <select multiple="" class="form-control selectpicker" required data-size="7" data-live-search="true" name="extra_foods[]" id="select_extra_food_input">
                                <option value="">Select Extra Food</option>
                                @foreach($extra_foods as $extra_food)
                                    <option value="{{$extra_food->id}}" {{ in_array($extra_food->id, $extra_foods_array) ? 'selected' : '' }}>{{$extra_food->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success mr-2">Save Changes</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
            <!--end::Form-->
    </div>
    <!--end::Card-->
    </div>
@endsection
@section('custom_script')
    <script src="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.js') !!}"></script>
@endsection
