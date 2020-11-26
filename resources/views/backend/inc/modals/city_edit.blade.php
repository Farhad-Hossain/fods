<!-- Edit City Modal-->
<div class="modal fade" id="edit_city_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{!! route('backend.settings.edit_city') !!}" method="POST">
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="city_id" value="">
                        <div class="form-group">
                            <label>{!! __('ccc.select_country') !!}</label>
                            <select class="form-control" data-size="7" data-live-search="true" name="country_id" required>
                              <option value="">Select</option>
                              @foreach($countries as $country)
                                  <option value="{!! $country->id !!}">{!! $country->name !!}</option>
                              @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                            <label>{!! __('ccc.city_name') !!}</label>
                            <input type="text" name="city_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="city_status" class="form-control">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
