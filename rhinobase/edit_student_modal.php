<?php  include 'dbconnect.php' ?>

<<div class="modal fade" id="edit_student_modal" tabindex="-1" role="dialog" aria-labelledby="verticalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="update_student.php" method="post">
                    <input type="hidden" name="form_submitted" value="3">
                    <input type="hidden" id="edit_student_id" name="student_id" >

                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="s_name" id="edit_name" required />
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="s_email" id="edit_email"
                         required />
                    </div>
                    <div class="mb-3">
                        <label for="edit_department" class="form-label">Department</label>
                        <select type="text" class="form-control" name="s_department" id="edit_department" required >
                            <!-- <option value="none" selected >none</option> -->
                            <option value="BCA" >BCA</option>
                            <option value="BBA">BBA</option>
                            <option value="BCOM">BCOM</option>
                            <option value="BA" autofocus >BA</option>
                            <option value="BSC">BSC</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Semister</label>
                        <select type="text" class="form-control" name="s_year" id="edit_year" required>
                            <option value="">Select a year</option>
                            <option value="1st-Year">1st Year</option>
                            <option value="2nd-Year">2nd Year</option>
                            <option value="3rd-Year">3rd Year</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Session</label>
                        <select type="text" class="form-control" name="s_session" id="edit_Session">
                            <option value="">Select a Session</option>
                            <option value="2021-2024">2021-2024</option>
                            <option value="2022-2025">2022-2025</option>
                            <option value="2023-2026">2023-2026</option>
                            <option value="2021-2027">2021-2027</option>
                            <option value="2024-2028">2024-2028</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Fees" class="form-label">Fees</label>
                        <input type="text" name="s_fees" class="form-control" id="edit_fees"></input>
                    </div>
                    <div class="mb-3">
                        <label for="edit_gender" class="form-label">Gender</label>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s_gender" id="edit_male" value="Male" required >
                            <label class="form-check-label" for="edit_male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="s_gender" id="edit_female" value="Female" required >
                            <label class="form-check-label" for="edit_female">Female</label>
                        </div>
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
<script>
    document.getElementById("edit_department").addEventListener("change", calculateFee);
    document.getElementById("edit_year").addEventListener("change", calculateFee);
// Function to calculate the fee based on department and session
function calculateFee() {
    var department = document.getElementById("edit_department").value;
    var year = document.getElementById("edit_year").value;
    var fee = 0;
    // Define your fee calculation logic here
    // For example, you can use a switch statement
    switch (department) {
        case "BCA":
            if (year === "1st-Year") {
                fee = 25000;
            } else if (year === "2nd-Year") {
                fee = 26000;
            } // Add more cases for other sessions
             else if (year === "3rd-Year") {
                fee = 27000;
            } // Add more cases for other sessions
            break;
        case "BBA":
            // Add fee calculation logic for BBA department
            break;
            // Add cases for other departments
    }
    document.getElementById("edit_fees").value = fee + "RS"; // You can format this as needed
}

    // Display the calculated fee in the feeDisplay div
    // document.getElementById("feeDisplay").textContent = "Fees: " + fee + " USD"; // You can format this as needed 
    // Set the calculated fee as the value of the feeDisplay input field


// Listen for changes in the department and session select elements
// document.getElementById("s_dept").addEventListener("change", calculateFee);
// document.getElementById("s_Session").addEventListener("change", calculateFee);

// Initially, calculate the fee based on the default selected values (if any)
// calculateFee();
</script>