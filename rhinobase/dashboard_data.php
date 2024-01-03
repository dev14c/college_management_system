<?php
    $sql = "select * from teacher_table";
    $result = mysqli_query($conn,$sql);
    $total_teachers = mysqli_num_rows($result);

    $sql = "select * from student_table";
    $result = mysqli_query($conn,$sql);
    $total_students = mysqli_num_rows($result);
?>