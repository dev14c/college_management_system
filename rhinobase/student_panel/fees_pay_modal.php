<?php include '../dbconnect.php';?>


<div class="modal fade" id="fees_pay_modal" tabindex="-1" role="dialog" aria-labelledby="verticalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <!-- jello -->
                <form action="/rhinobase/student_panel/fees_pay.php" method="post">
                    <input type="hidden" name="form_submitted" value="1"> <!-- Add this submit button -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="s_name" id="s_name"
                            aria-describedby="emailHelp" />
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>d -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Adress</label>
                        <input type="email" class="form-control" name="s_mail" id="s_mail"
                            aria-describedby="emailHelp" />
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>d -->
                    </div>
                    
                    

                    <div class="mb-3">
                        <label for="Fees" class="form-label">Phone Number</label>
                        <input type="text" name="s_fees" class="form-control" id="feeDisplay"></input>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Choose a Installment</label>
                       
                        <select type="text" class="form-control" name="f_fees" id="" required>
                            <option value="">Select a year</option>
                            <option value="1st-installment">1st installment</option>
                            <option value="2nd-installment">2nd installment</option>
                            <option value="3rd-installment">3rd installment</option>
                            <option value="4th-installment">4th installment</option>
                            <option value="5th-installment">5th installment</option>
                            
                        </select>
                    </div>
        
                 
                    <!-- <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Joining Date</label>
                        <input type="date" class="form-control" name="t_date" id="exampleInputPassword1" />
                    </div> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Confirm & Pay</button>
                        <input type="hidden" name="form_submitted" value="1"> <!-- Add this submit button -->
                    </div>
            </div>
            </form>

        </div>

    </div>
</div>
</div>

