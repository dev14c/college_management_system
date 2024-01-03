<?php
include 'dbconnect.php';

// Start the session
session_start();
  if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true)
  {
    header("location: index.php");
    exit;
  }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form for adding teachers was submitted
    if (isset($_POST['form_submitted']) && $_POST['form_submitted'] == 1) {
        // Form for adding teachers has been submitted
        $name = $_POST['t_name'];
        $department = $_POST['t_department'];
        $subject = $_POST['t_subject'];
        $gender = $_POST['t_gender'];
        $date = $_POST['t_date'];
        $salary = $_POST['t_salary'];

        $sql = "INSERT INTO teacher_table (t_name, t_department, t_subject, t_gender, t_date, t_salary) VALUES ('$name', '$department', '$subject', '$gender', '$date', '$salary')";

        if (mysqli_query($conn, $sql)) {
            header("Location: teacher.php"); // Replace with the appropriate URL
            exit();
            // Data inserted successfully, you can set a success message if needed
            // $_SESSION['success_message'] = "Data saved successfully.";
        } else {
            // Error during insertion
            echo "Error: " . mysqli_error($conn);
        }
    } 
    elseif (isset($_POST['form_submitted']) && $_POST['form_submitted'] == 2) {
        // Form for deleting teachers was submitted
        // Get the teacher's ID from the form
        $teacher_id = $_POST['teacher_id'];
        $sql = "select t_status from teacher_table where t_id = $teacher_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['t_status'] == 'Active')
            $delete_query = "update teacher_table set t_status = 'Deactive' where t_id = $teacher_id";
        else
            $delete_query = "update teacher_table set t_status = 'Active' where t_id = $teacher_id";
        if (mysqli_query($conn, $delete_query)) {
            header("Location: teacher.php"); // Replace with the appropriate URL
            exit();
            // Record deleted successfully, you can optionally set a success message
            // $_SESSION['success_message'] = "Teacher record deleted successfully.";
        } else {
            // Error during deletion
            echo "Error: " . mysqli_error($conn);
        }
    } 
    elseif (isset($_POST['form_submitted']) && $_POST['form_submitted'] == 3) {
        $teacher_id = $_POST['id'];
        // Fetch the record's details from the database
        $sql = "SELECT * FROM teacher_table WHERE t_id = $teacher_id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Store the fetched data in variables
            $name = $row['t_name'];
            $department = $row['t_department'];
            $subject = $row['t_subject'];
            $gender = $row['t_gender'];
            $date = $row['t_date'];
            $salary = $row['t_salary'];
        } else {
            // Handle the case when the record with the provided ID doesn't exist
            echo "Record not found.";
            // exit();  
        }
    } 
    else {
        // Handle the case when the ID is not provided in the URL
        echo "Teacher ID is missing.";
        // exit();
    }
}
// Check if the teacher ID is provided in the URL
// Redirect back to the teacher.php page after form submission
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css?v=<?=$version?>">
    <link rel="stylesheet" href="evo-calendar.min.css?v=<?=$version?>">
    <link rel="stylesheet" href="evo-calendar.midnight-blue.min.css?v=<?=$version?>">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="evo-calendar.min.css"> -->
    <!-- <link rel="stylesheet" href=""> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Teachers</title>
        <style>
            .table-striped>tbody>tr:nth-of-type(odd)>* {
                --bs-table-color-type: #black;
                --bs-table-bg-type: rgb(245, 250, 255);
            }

            .dt-no-padding {
                /* padding: 100px; Adjust the padding as needed */
            }

            .addbtn {
                margin-top: 10px;
                margin-left: 10px;
            }
        </style>
</head>
<body>
    <?php
    
    $activeTab = 'teacher';
    include 'head.php';
    include 'addteachermodal.php';
    include 'edit_teacher_modal.php'; 
    include 'del_teach_modal.php'; ?>
    <!-- The rest of your HTML code here -->
    <div class="main_">
        <div class="card">
            <div class="card-header">Teacher Table</div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Subject</th>
                            <th>Gender</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * FROM `teacher_table`";
                        $result = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_assoc($result)) {
                            // -- $noresult=false;
                            $name = $row['t_name'];
                            $id = $row['t_id'];
                            $department = $row['t_department'];
                            $subject = $row['t_subject'];
                            $gender = $row['t_gender'];
                            $date = $row['t_date'];
                            $salary = $row['t_salary'];
                            $status = $row['t_status'];
                            echo '
                                <tr>
                                    <td>' . $id . '</td>
                                    <td>' . $name . '</td>
                                    <td>' . $department . '</td>
                                    <td>' . $subject . '</td>
                                    <td>' . $gender . '</td>
                                    <td>' . $date . '</td>
                                    <td>' . $salary . '</td>
                                    <td>' . $status . "</td>
                                    <td><button class='edit btn btn-sm btn-primary' id= ".$id.">Edit</button> <button class='delete btn btn-sm btn-primary'>Change Status</button></td></tr>";
                        }
                        // After successfully saving the data
                        // $_SESSION['success_message'] = "Data saved successfully.";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="addbtn">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addteachermodal">
                Add teachers
            </button>
        </div>
    </div>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
          element.addEventListener('click', (e) => {
            // console.log('edit ',e);
            // console.log(e.target);
            // console.log(e.target.id);
            tr = e.target.parentNode.parentNode;
            temp = tr.getElementsByTagName('td');
            edit_teacher_id.value = temp[0].innerText;
            edit_name.value = temp[1].innerText;
            console.log(temp[2].innerText);
            edit_department.value = temp[2].innerText;
            edit_subject.value = temp[3].innerText;
            if(temp[4].innerText == "Male")
                edit_male.checked = true;
            else if(temp[4].innerText == "Female")
                edit_female.checked = true;
            edit_date.value = temp[5].innerText;
            edit_salary.value = temp[6].innerText;
            // edit_name.value = temp[5].innerText;
            $('#edit_teacher_modal').modal('toggle');
          })
        });
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
          element.addEventListener('click', (e) =>{
            
            tr = e.target.parentNode.parentNode;
            t = tr.getElementsByTagName('td');
            sn = t[0].innerText;
            // temp = e.target.parentNode.previousElementSibling;
            temp = t[7].innerText;
            console.log(temp);
            del_teacher_id.value = sn;
            if(temp == 'Active')
                status_text.innerText = "Are you sure you want to Deactivate teacher ?";
            else
                status_text.innerText = "Are you sure you want to Activate teacher ?";
            $('#delModal').modal('toggle');
          })
        });
        // function openEditModal(teacherId) {
        //     // Set the teacher ID in a hidden input field inside the modal
        //     document.getElementById('edit_teacher_id').value = teacherId;
            
        //     // Open the edit modal
        //     var myModal = new bootstrap.Modal(document.getElementById('edit_teacher_modal'));
        //     myModal.show();
        // } 
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>