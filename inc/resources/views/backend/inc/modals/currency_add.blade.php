<!-- Add Currency Modal-->
<div class="modal fade" id="add_currency_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{!! __('ccc.add_currency') !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{!! route('backend.settings.add_currency') !!}" method="POST">
                <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>{!! __('ccc.select_country') !!}</label>
                            <select class="form-control" name="country_id" required>
                                <option value="">-Select a country-</option>
                                @foreach($countries as $country)
                                    <option value="{!! $country->id !!}">{!! $country->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{!! __('ccc.currency_name') !!}</label>
                            <input type="text" name="currency_name" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Add Currency</button>
                </div>
            </form>
        </div>
    </div>
</div>
