@extends('backend.master')
@section('custom_style')
    <link href="{{asset('backend')}}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.3" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{!! asset('frontend/plugins/wickedpicker/dist/wickedpicker.min.css') !!}">
    <style type="text/css">
        #time_table tr td {
            vertical-align: middle;
        }

        .wickedpicker__controls {
            padding: 0;
            margin: 0;
        }
    </style>
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
            <form class="form" action="{{ route('backend.food.add') }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="restaurant">Restaurant <span class="text-danger">*</span></label>
                        <select name="restaurant" id="restaurant" class="form-control" required>
                            <option value="">--Select Restaurant--</option>
                            @if(!empty($restaurants))
                                @foreach($restaurants as $restaurant)
                                    <option value="{!! $restaurant->id !!}" {!! (old('restaurant') == $restaurant->id)?'selected':'' !!}>{!! $restaurant->name !!}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('restaurant')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="food_category">Food Category <span class="text-danger">*</span></label>
                        <select name="food_category" id="food_category" class="form-control" required>
                            <option value="">--Select Food Category--</option>
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
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Food Category Name" name="name"
                               value="{{ old('name') }}" required/>
                        @error('name')
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
                    <div class="form-group">
                        <label for="price">Price <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control" placeholder="Enter Food Price" name="price"
                               value="{{ old('price') }}" required/>
                        @error('price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="discount_price">Discount Price <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control" placeholder="Enter Food Discount Price" name="discount_price"
                               value="{{ old('discount_price') }}" required/>
                        @error('discount_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" placeholder="Enter Description"
                                  class="form-control">{!! old('description') !!}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredients</label>
                        <textarea name="ingredients" id="ingredients" placeholder="Enter Ingredients"
                                  class="form-control">{!! old('ingredients') !!}</textarea>
                        @error('ingredients')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Food Unit" name="unit"
                               value="{{ old('unit') }}" required/>
                        @error('unit')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="package_count">Package Count <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" placeholder="Enter Number Of Item Per Package" name="package_count"
                               value="{{ old('package_count') }}" required/>
                        @error('package_count')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control" placeholder="Enter Food Weight Per Unit" name="weight"
                               value="{{ old('weight') }}" required/>
                        @error('weight')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="featured">Featured Food</label>
                        <input type="checkbox" name="featured" value="1">
                        @error('featured')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deliverable">Deliverable Food</label>
                        <input type="checkbox" name="deliverable" value="1">
                        @error('deliverable')
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
    <script>
        var options = {
            twentyFour: true,  //Display 24 hour format, defaults to false
        };
        $('.timepicker').wickedpicker(options);
    </script>
@endsection