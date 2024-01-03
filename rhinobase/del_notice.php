<div class="modal fade" id="del_notice_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Alert !</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 id="status_text">Are you sure you want to Delete notice ?</h4>
        <form action="sidebar.php" method="post">    
            <input type="hidden" name="notice_delete" value="1">
            <input type="hidden" id="notice_id" name="notice_id" >
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="Submit" class="btn btn-primary">Yes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>