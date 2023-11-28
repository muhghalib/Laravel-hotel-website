<div class="modal fade" id="editRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 pt-0">
                <div class="text-center mb-2">
                    <h1 class="mb-1">Edit Role</h1>
                    <p>Edit role as per your requirements.</p>
                </div>

                <div class="alert alert-warning" role="alert">
                    <h6 class="alert-heading">Warning!</h6>
                    <div class="alert-body">
                        By editing role, you might change the user permission
                    </div>
                </div>

                <form class="row edit-role">
                    <input type="hidden" name="id" value="" />
                    <div class="col-sm-9">
                        <label class="form-label" for="modalEditUserStatus">Role</label>
                        <select id="modalEditUserStatus" class="form-select" aria-label="Default select example"
                            name="role">
                            <option value="admin">Admin</option>
                            <option value="tamu">Tamu</option>
                            <option value="resepsionis">Resepsionis</option>
                        </select>
                    </div>
                    <div class="col-sm-3 ps-sm-0">
                        <button type="submit" class="btn btn-primary mt-2" data-bs-dismiss="modal">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
