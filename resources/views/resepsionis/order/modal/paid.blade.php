<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 pt-0">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Is this room has been paid?</h1>
                    <p>If this room has been paid please edit this order to has been paid</p>
                </div>

                <div class="alert alert-warning" role="alert">
                    <h6 class="alert-heading">Warning!</h6>
                    <div class="alert-body">
                        By editing this you might change the statistic of room sell
                    </div>
                </div>

                <form class="row edit-paid">
                    <div class="col-sm-9">
                        <input type="hidden" name='id' value="" />
                        <label class="form-label">Has been paid?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="is_paid">
                            <label class="form-check-label" for="inlineRadio2">Yes/No</label>
                        </div>
                    </div>
                    <div class="col-sm-3 ps-sm-0">
                        <button type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
