<?php
include 'dbconnect.php';

// Start the session
session_start();
$loggedin = false;
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true)
{
    header("location: index.php");
    exit;
}
$error_message = ""; // Initialize the error message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form for adding students was submitted
    if (isset($_POST['form_submitted']) && $_POST['form_submitted'] == 1) {
        // Form for adding students has been submitted
        $name = $_POST['s_name'];
        $department = $_POST['s_dept'];
        $semister = $_POST['s_year'];
        $session = $_POST['s_Session'];
        $fees = $_POST['s_fees'];
        $gender = $_POST['s_gender'];
        $mail = $_POST['s_mail'];
        $pass = $_POST['s_pass'];
        
        $img_name = $_FILES['s_photo']['name']; // uploaded image name
        $tmp_name = $_FILES['s_photo']['tmp_name']; // temporary name used to save file
        // Check if a session is selected
        if (empty($session)) {
            $error_message = "Please select a session";
            // exit();
            
        } 
        elseif (empty($department)) {
            $error_message = "Please select a dept";

            # code...
        }
        elseif (empty($semister)) {
            $error_message = "Please select a dept";

            # code...
        }
        else{
            

            $hash_pass=password_hash($pass,PASSWORD_DEFAULT);
            $sql1="INSERT INTO `fees_table` (`f_id`, `f_name`,`smail`,`f_fees`, `f_1`, `f_2`, `f_3`, `f_4`, `f_5`) VALUES (NULL, '$name','$mail','$fees', 'Not Paid', 'Not Paid', 'Not Paid', 'Not Paid', 'Not Paid')";  
            $new_imgname = time().$img_name;
            if(move_uploaded_file($tmp_name,"uploads/s_images/".$new_imgname)){ 
            $sql = "INSERT INTO `student_table` (`s_id`,`s_name`,`s_mail`,`s_pass`, `s_dept`,`s_semister`,`s_Session`,`s_fees`,`s_gender`,`s_photo`) VALUES (NULL, '$name','$mail','$hash_pass','$department','$semister', '$session', '$fees','$gender','$new_imgname')";

            if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
                header("Location: students.php"); // Replace with the appropriate URL
                exit();
                // Data inserted successfully, you can set a success message if needed
                // $_SESSION['success_message'] = "Data saved successfully.";
            } else {
                // Error during insertion
                echo "Error: " . mysqli_error($conn);
            }
        }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Students</title>
    <style>
        .table-striped>tbody>tr:nth-of-type(odd)>* {
            --bs-table-color-type: #black;
            --bs-table-bg-type: rgb(245, 250, 255);
        }

        .dt-no-padding {
            /* padding: 100px; Adjust the padding as needed */
        }
    </style>
</head>
<body>
    <?php
    $activeTab = 'students';
    include 'head.php';
    include 'add_students_modal.php';
    include 'edit_student_modal.php'; ?>
    <!-- The rest of your HTML code here -->
    <div class="main_">
        <div class="card">
            <?php if (!empty($error_message)){ // Replace with the appropriate URL
            ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
            <div class="card-header">Students Table</div>
            <div class="card-body">
                <table id="datatable" class="ta ble table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Semister</th>
                            <th>Gender</th>
                            <th>Session</th>
                            <th>Fees</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    $sql1="SELECT * FROM `student_table`";
    $result=mysqli_query($conn,$sql1);
    while($row=mysqli_fetch_assoc($result)){
        // -- $noresult=false;
       $name = $row['s_name'];
       $id = $row['s_id'];
        // $department = $row['s_subject'];
        $department = $row['s_dept'];
        $semister= $row['s_semister'];
        $session = $row['s_Session'];
        $fees = $row['s_fees'];
        $gender = $row['s_gender'];
        $mail = $row['s_mail'];
        
    echo '
    <tr>
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$mail.'</td>
        <td>'.$department.'</td>
        <td>'.$semister.'</td>
        <td>'.$gender.'</td>
        <td>'.$session.'</td>
        <td>'.$fees."</td>
        <td><button class='edits btn btn-sm btn-primary'>Edit</td></tr>";
        // </button> <button class='delete btn btn-sm btn-primary' id = ".$id.">Change Status</button>
    }
            // After successfully saving the data
            // $_SESSION['success_message'] = "Data saved successfully.";
                ?>
                    </tbody>
                </table>        
            </div>
        </div>
        <div class="addbtn">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addstudentmodal">
                Add Students
            </button>
            <a href="demo.php">Add</a>
        </div>

    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
        // deletes = document.getElementsByClassName('delete');
        // Array.from(deletes).forEach((element) => {
        //   element.addEventListener('click', (e) =>{
        //       sno = e.target.id;
        //     //   console.log(sno)
            
        //       console.log(e.target.id.parentNode);
        //     temp =  e.target.parentNode.previousElementSibling;
        //     del_teacher_id.value = sno;
        //     if(temp.innerText == 'Active')
        //         status_text.innerText = "Are you sure you want to Deactivate teacher ?";
        //     else
        //         status_text.innerText = "Are you sure you want to Activate teacher ?";
        //     $('#delModal').modal('toggle');
        //   })
        // });
        edits = document.getElementsByClassName('edits');
        Array.from(edits).forEach((element) => {
          element.addEventListener('click', (e) => {
            tr = e.target.parentNode.parentNode;
            temp = tr.getElementsByTagName('td');
            edit_student_id.value = temp[0].innerText;
            edit_name.value = temp[1].innerText;
            edit_email.value = temp[2].innerText;
            edit_department.value = temp[3].innerText;
            edit_year.value = temp[4].innerText;
            if(temp[5].innerText == "Male")
                edit_male.checked = true;
            else if(temp[5].innerText == "Female")
                edit_female.checked = true;
            edit_Session.value = temp[6].innerText;
            edit_fees.value = temp[7].innerText;
            $('#edit_student_modal').modal('toggle');
          })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
    </div>
</body>
</html>