<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teacher_id = $_POST['teacher_id'];
    $name = $_POST['t_name'];
    $department = $_POST['t_department'];
    $subject = $_POST['t_subject'];
    $gender = $_POST['t_gender'];
    $date = $_POST['t_date'];
    $salary = $_POST['t_salary'];

    // Update the record in the database
    $sql = "UPDATE teacher_table SET
            t_name = '$name',
            t_department = '$department',
            t_subject = '$subject',
            t_gender = '$gender',
            t_date = '$date',
            t_salary = '$salary'
            WHERE t_id = $teacher_id";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the teacher.php page after successful update
        header("Location: teacher.php");
        exit();
    } else {
        // Handle the case when the update fails
        echo "Error: " . mysqli_error($conn);
    }
}
?>
