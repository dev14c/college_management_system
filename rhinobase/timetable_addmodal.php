<?php include 'dbconnect.php';?>


<div class="modal fade" id="timetable_addmodal" tabindex="-1" role="dialog" aria-labelledby="verticalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalLabel">Add New Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <!-- jello -->
                <!-- <form action="/rhinobase/students.php" method="post"> -->
                <form action="time_table.php" method="post">
                <input type="hidden" name="form_submitted" value="1"> <!-- Add this submit button -->


                <div class="mb-3">
        
                            <select id="daySelect" name="selectedDay">
                                <option value="">Select a Day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
            
                        </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">9:00-10:00</label>
                        <input type="text" class="form-control" name="t_9" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required/>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>d -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">10:00-11:00</label>
                        <input type="text" class="form-control" name="t_10" id="exampleInputPassword1" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">11:00-12:00</label>
                        <input type="text" class="form-control" name="t_11" id="exampleInputPassword1" required/>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">12:00-01:00</label>
                        <input type="text" class="form-control" name="t_12" id="exampleInputPassword1" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">01:00-02:00</label>
                        <input type="text" class="form-control" name="t_1" id="exampleInputPassword1" required />
                    </div>               
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <input type="hidden" name="form_submitted" value="1"> <!-- Add this submit button -->
                    </div>
            </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
        function validateForm() {
            const selectedDay = document.getElementById('daySelect').value;

            // Check if a valid day is selected
            if (selectedDay === '') {
                alert('Please select a valid day.');
                return false; // Prevent form submission
            }

            // You can proceed to save the selected day to your database here
            alert(`You have selected: ${selectedDay}`);

            // Close the modal
            $('#myModal').modal('hide');

            return true; // Allow form submission
        }
    </script>