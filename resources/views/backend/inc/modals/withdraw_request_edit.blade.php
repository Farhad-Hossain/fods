<!-- Edit withdraw request Modal-->
<div class="modal fade" id="edit_withdraw_request" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{!! route('backend.wallet.editWithdrawalRequestSubmit') !!}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="withdraw_request_id" value="">
                    <div class="form-group">
                        <label>Payment method</label>
                        <select class="form-control" name="payment_method">
                            <option value="Cash">Cash</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Amount</label>
                        <input type="number" name="requested_amount" class="form-control" min="1">
                    </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
