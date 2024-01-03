<?php
    session_start();
    session_unset();
    header("location: login_student.php");
    exit();
?>