<!-- Add Country Modal-->
<div class="modal fade" id="add_country_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{!! __('ccc.add_country') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="row mt-5">
            </div>
            <form action="{{ route('backend.settings.add_country') }}" method="POST" id="crop_image" enctype="multipart/form-data">
                <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('ccc.country_name') !!}</label>
                                <input type="text" id="country_name" name="country_name" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('ccc.two_letter_iso_code') !!}</label>
                                <input type="text" id="two_letter_iso_code" name="two_letter_iso_code" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('ccc.three_letter_iso_code') !!}</label>
                                <input type="text" id="three_letter_iso_code" name="three_letter_iso_code" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('ccc.country_code') !!}</label>
                                <input type="text" id="country_code" name="country_code" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{!! __('ccc.country_flag') !!}</label>
                                <div class="custom-file">
                                        <input type="file"  target="upload_image" id="upload_image" class="image custom-file-input image" required>
                                    <label class="custom-file-label" for="upload_image">Choose file</label>
                                </div>
                                <input type="hidden" name="upload_image">
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>Status</label>
                                <select class="form-control" name="country_status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="country_flag" id="country_flag" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold" id="addCountry">Add Country</button>
                </div>
            </form>

        </div>
    </div>
</div>
