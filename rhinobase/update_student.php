<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['s_name'];
    $department = $_POST['s_department'];
    $gender = $_POST['s_gender'];
    $session = $_POST['s_session'];
    $year = $_POST['s_year'];
    $fees = $_POST['s_fees'];
    $email = $_POST['s_email'];

    // Update the record in the database
    $sql = "UPDATE student_table SET
            s_name = '$name',
            s_mail = '$email',
            s_dept = '$department',
            s_gender = '$gender',
            s_fees = '$fees',
            s_Session = '$session'
            WHERE s_id = '$student_id' ";
    if(mysqli_query($conn, $sql)) {
        // Redirect back to the teacher.php page after successful update
        header("Location: students.php");
        exit();
    }
    else{
        // Handle the case when the update fails
        echo "Error: " . mysqli_error($conn);
    }
}
?>
