<div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Alert !</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 id="status_text">Are you sure you want to Deactive teacher ?</h4>
      <?php
      // $sql = "select t_status from teacher_table where t_id = $teacher_id";
      //   $result = mysqli_query($conn, $sql);
      //   $row = mysqli_fetch_assoc($result);
      //   if($row['t_status'] == 'Active')
      //     echo '<h4>Are you sure you want to Deactive teacher ?</h4>';
      //   else
      //     echo '<h4>Are you sure you want to Active teacher ?</h4>';
        ?>
        <form action="teacher.php" method="post">    
            <input type="hidden" name="form_submitted" value="2">
            <input type="hidden" id="del_teacher_id" name="teacher_id" >
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="Submit" class="btn btn-primary">Yes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>