<?php  include 'dbconnect.php' ?>

<<div class="modal fade" id="edit_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="verticalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalLabel">Edit Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Edit teacher form 
                <form action="update_teacher.php" method="post">
                    <input type="hidden" name="form_submitted" value="3">
                    <input type="hidden" id="edit_teacher_id" name="teacher_id" >

                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="t_name" id="edit_name" required />
                    </div>
                    <div class="mb-3">
                        <label for="edit_department" class="form-label">Department</label>
                        <select type="text" class="form-control" name="t_department" id="edit_department" required >
                            <option value="none" selected >none</option>
                            <option value="BCA" >BCA</option>
                            <option value="BBA">BBA</option>
                            <option value="BCOM">BCOM</option>
                            <option value="BA" autofocus >BA</option>
                            <option value="BSC">BSC</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="t_subject" id="edit_subject" required />
                    </div>

                    <div class="mb-3">
                        <label for="edit_gender" class="form-label">Gender</label>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="t_gender" id="edit_male" value="Male" required >
                            <label class="form-check-label" for="edit_male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="t_gender" id="edit_female" value="Female" required >
                            <label class="form-check-label" for="edit_female">Female</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_date" class="form-label">Joining Date</label>
                        <input type="date" class="form-control" name="t_date" id="edit_date" required/>
                    </div>

                    <div class="mb-3">
                        <label for="edit_salary" class="form-label">Salary</label>
                        <input type="text" class="form-control" name="t_salary" id="edit_salary" required />
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
