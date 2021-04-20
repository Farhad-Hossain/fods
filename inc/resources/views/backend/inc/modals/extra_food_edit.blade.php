<!-- Edit modal-->
<div class="modal fade" id="extra_food_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{!! __('extra_food.edit_modal_title') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="edit_form" action="{!! route('backend.food.extra_food.edit') !!}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="row">
                        {{--
                        <div class="form-group col-sm-12 col-md-6">
                            <label>{!! __('common.restaurant') !!}</label>
                            <select name="restaurant" id="restaurant" class="form-control selectpicker" required data-size="7" data-live-search="true">
                                @if(!empty($restaurants))
                                    @foreach($restaurants as $restaurant)
                                        <option value="{!! $restaurant->id !!}" {!! (old('restaurant') == $restaurant->id)?'selected':'' !!}>{!! $restaurant->name !!}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        --}}
                        
                        <div class="form-group col-sm-12 col-md-6">
                            <label>{!! __('common.name') !!}</label>
                            <input type="text" name="name" required class="form-control">
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label>Photo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input upload_image" accept="image/*" placeholder="Upload Image" target="photo"  />
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <input type="hidden" name="photo" value="">
                            </div>
                            @error('photo')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label>{!! __('common.category') !!}</label>
                            <select class="form-control" name="category" required>
                                <option value="">-Select a category-</option>
                                <option value="1">Vegiterian</option>
                                <option value="2">Non Vegiterian</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <label>{!! __('common.price') !!}</label>
                            <input type="number" class="form-control" name="price" required min="0.1" step="0.001" max="100">
                        </div> 

                        <div class="form-group col-sm-12 col-md-6">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>     


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">{!! __('extra_food.edit_btn') !!}</button>
                </div>
            </form>
        </div>
    </div>
</div>
