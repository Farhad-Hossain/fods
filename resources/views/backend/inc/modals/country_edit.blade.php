<!-- Edit Country Modal-->
<div class="modal fade" id="edit_country_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="row mt-5">
            </div>
            <form action="{{ route('backend.settings.edit_country') }}" method="POST" id="crop_image" enctype="multipart/form-data">
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="country_id" >
                        <div class="form-group">
                            <label>{!! __('ccc.country_name') !!}</label>
                            <input type="text" name="country_name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>{!! __('ccc.two_letter_iso_code') !!}</label>
                            <input type="text" name="two_letter_iso_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>{!! __('ccc.three_letter_iso_code') !!}</label>
                            <input type="text" name="three_letter_iso_code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>{!! __('ccc.country_code') !!}</label>
                            <input type="text" name="country_code" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{!! __('ccc.country_flag') !!}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input upload_image" accept="image/*" placeholder="Upload Image" target="country_flag"/>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('country_flag')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="country_flag" value="">
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold" id="addCountry">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
