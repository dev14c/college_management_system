<div class="modal fade" id="edit_notice_modal" tabindex="-1" role="dialog" aria-labelledby="verticalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalLabel">Add Notices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <form action="sidebar.php" method="post">
                    <input type="hidden" name="notice_edit">
                    <input type="hidden" id="n_id" name="n_id">
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="" id="notice_content" name="n_content" rows="7"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>