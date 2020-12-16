<!--begin::Form-->
<!--begin::Form-->
<form class="form" action="{!! route('backend.area_coverage.area_coverage_submit') !!}" method="POST"
      enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="form-group col-sm-12">
                <label>Select Restaurant</label>
                <select name="restaurant_id" class="form-control" id="rest_select_control">
                    <option>Select a restaurant</option>
                    @foreach ( $restaurants as $restaurant )
                        <option value="{!! $restaurant->id !!}">{!! $restaurant->name !!}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-12" id="form_container">
                
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success mr-2">Save Changes</button>
            <a  href="{!! URL::previous() !!}" type="button" class="btn btn-success mr-2">
                Cancel
            </a>
        </div>
<!--end::Form-->
</form>
