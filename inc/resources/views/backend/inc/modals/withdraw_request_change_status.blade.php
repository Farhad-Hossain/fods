<!--  withdraw request change status Modal-->
<div class="modal fade" id="withdraw_request_change_status" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form action="{!! route('backend.wallet.changeStatusWithdrawRequestSubmit') !!}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="withdraw_request_id" value="">
                    <div class="h3 text-center">Select and submit</div>    
                    
                    <div class="form-group">
                        <select name="action_status_value" class="form-control" required>
                            <option value="1">Pending</option>
                            <option value="2">Approved</option>
                            <option value="3">Reject</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Remarks</label>
                        <textarea name="action_remarks" class="form-control" required></textarea>
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
