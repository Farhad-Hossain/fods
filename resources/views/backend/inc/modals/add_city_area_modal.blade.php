<!-- Add City Area Modal-->
<div class="modal fade" id="add_city_area_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add city area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{!! route('backend.settings.addCityArea') !!}" method="POST">
                <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control selectpicker" data-size="7" data-live-search="true" name="city_id" required>
                              <option value="">Select</option>
                              @foreach( $cities as $city )
                                <option value="{!! $city->id !!}">{!! $city->name !!}</option>
                              @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                            <label>Area name</label>
                            <input type="text" name="city_area_name" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Add Area</button>
                </div>
            </form>
        </div>
    </div>
</div>
