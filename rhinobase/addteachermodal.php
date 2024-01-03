<?php include 'dbconnect.php';?>
<div class="modal fade" id="addteachermodal" tabindex="-1" role="dialog"
    aria-labelledby="verticalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalLabel">Add Teachers</h5>
                <button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <!-- jello -->
                <form action="/rhinobase/teacher.php" method="post">
                    <!-- <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post"> -->
                    <input type="hidden" name="form_submitted" value="1">
                    <!-- Add this submit button -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control"
                            name="t_name" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required >
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>d -->
                    </div>
                    <div class="mb-3">
                        <label for="dept"
                            class="form-label">Department</label>
                            <select class="form-control" name="t_department" id="dept" required>
                                <!-- <option value="none" selected >none</option> -->
                                <option value="BCA" >BCA</option>
                                <option value="BBA">BBA</option>
                                <option value="BCOM">BCOM</option>
                                <option value="BA" autofocus >BA</option>
                                <option value="BSC">BSC</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1"
                            class="form-label">Subject</label>
                        <input type="text" class="form-control"
                            name="t_subject" id="exampleInputPassword1" required >
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"
                                name="t_gender" id="male" value="Male" required >
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio"
                                name="t_gender" id="female" value="Female" required >
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1"
                            class="form-label">Joining Date</label>
                        <input type="date" class="form-control"
                            name="t_date" id="exampleInputPassword1" required >
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1"
                            class="form-label">Salary</label>
                        <input type="text" class="form-control"
                            name="t_salary" id="exampleInputPassword1" required >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save
                            changes</button>
                        <input type="hidden" name="form_submitted"
                            value="1"> <!-- Add this submit button -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>