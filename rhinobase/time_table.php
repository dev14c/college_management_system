<?php include 'dbconnect.php';
session_start();
?>
<?php

$error_message = ""; // Initialize the error message variable
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form for adding teachers was submitted
    if (isset($_POST['form_submitted']) && $_POST['form_submitted'] == 1) {
        // Form for adding teachers has been submitted
        
        $day = $_POST['selectedDay'];
        $time9 = $_POST['t_9'];
        $time10 = $_POST['t_10'];
        $time11 = $_POST['t_11'];
        $time12 = $_POST['t_12'];
        $time1 = $_POST['t_1'];

        // Check if a day is selected
        if (empty($day)) {
            $error_message = "Please select a day.";
        } else {
            // Proceed with database insertion
            $sql = "
                    UPDATE `time_table` SET `time_9` = '$time9', `time_10` = '$time10', `time_11` = '$time11', `time_12` = '$time12', `time_1` = '$time1' WHERE `t_day` = '$day'";

            if (mysqli_query($conn, $sql)) {
                header("Location: time_table.php"); // Replace with the appropriate URL
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
// Fetch data from the database
$sql1 = "SELECT * FROM `time_table`";
$result = mysqli_query($conn, $sql1);

// Initialize variables to store time values for each day
// $mondayTime_9 = "";
// $mondayTime_10 = "";
// $mondayTime_11 = "";
// $mondayTime_12 = "";
// $mondayTime_1 = "";

while ($row = mysqli_fetch_assoc($result)) {
    $day = $row['t_day'];

    switch ($day) {
        case 'Monday':
            $mondayTime_9 = $row['time_9'];
            $mondayTime_10 = $row['time_10'];
            $mondayTime_11 = $row['time_11'];
            $mondayTime_12 = $row['time_12'];
            $mondayTime_1= $row['time_1'];
            break;
        case 'Tuesday':
            $tuesdayTime_9 = $row['time_9'];
            $tuesdayTime_10 = $row['time_10'];
            $tuesdayTime_11 = $row['time_11'];
            $tuesdayTime_12 = $row['time_12'];
            $tuesdayTime_1= $row['time_1'];
            break;
        case 'Wednesday':
            $wednesdayTime_9 = $row['time_9'];
            $wednesdayTime_10 = $row['time_10'];
            $wednesdayTime_11 = $row['time_11'];
            $wednesdayTime_12 = $row['time_12'];
            $wednesdayTime_1= $row['time_1'];
            break;
        case 'Thursday':
            $thursdayTime_9 = $row['time_9'];
            $thursdayTime_10 = $row['time_10'];
            $thursdayTime_11 = $row['time_11'];
            $thursdayTime_12 = $row['time_12'];
            $thursdayTime_1= $row['time_1'];
            break;
        case 'Friday':
            $fridayTime_9 = $row['time_9'];
            $fridayTime_10 = $row['time_10'];
            $fridayTime_11 = $row['time_11'];
            $fridayTime_12 = $row['time_12'];
            $fridayTime_1= $row['time_1'];
            break;
        case 'Saturday':
            $saturdayTime_9 = $row['time_9'];
            $saturdayTime_10 = $row['time_10'];
            $saturdayTime_11 = $row['time_11'];
            $saturdayTime_12 = $row['time_12'];
            $saturdayTime_1= $row['time_1'];
            break;
        default:
            break;
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table</title>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/time_table.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   
</head>
<body>
    <?php 
    $activeTab = 'time_table';
    include 'head.php';?>
    <div class="main_">
    <?php if (!empty($error_message)){?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php }?>
        <div class="container">
            <div class="timetable-img text-center">
                <img src="img/content/timetable.png" alt="">
            </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Day</th>
                                <th class="text-uppercase">9:00 AM</th>
                                <th class="text-uppercase">10:00 AM</th>
                                <th class="text-uppercase">11:00 AM</th>
                                <th class="text-uppercase">12:00 PM</th>
                                <th class="text-uppercase">1:00 AM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="align-middle">Monday</th>
                                <td>
                                <?php
                                if ($mondayTime_9 !== "") {
                                    echo '
                                    <div>'.$mondayTime_9.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($mondayTime_10 !== "") {
                                
                                    echo '
                                    <div>'.$mondayTime_10.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($mondayTime_11 !== "") {
                                    echo '
                                    <div>'.$mondayTime_11.'</div>
                                     ';
                                }
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($mondayTime_12 !== "") {
                                
                                    echo '
                                    <div>'.$mondayTime_12.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($mondayTime_1 !== "") {
                                    echo '
                                    <div>'.$mondayTime_1.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Tuesday</th>
                                <td>
                                <?php
                                if ($tuesdayTime_9 !== "") {
                                    echo '
                                    <div>'.$tuesdayTime_9.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($tuesdayTime_10 !== "") {
                                
                                    echo '
                                    <div>'.$tuesdayTime_10.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($tuesdayTime_11 !== "") {
                                    echo '
                                    <div>'.$tuesdayTime_11.'</div>
                                     ';
                                }
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($tuesdayTime_12 !== "") {
                                
                                    echo '
                                    <div>'.$tuesdayTime_12.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($tuesdayTime_1 !== "") {
                                    echo '
                                    <div>'.$tuesdayTime_1.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Wednesday</th>
                                <td>
                                <?php
                                if ($wednesdayTime_9 !== "") {
                                    echo '
                                    <div>'.$wednesdayTime_9.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($wednesdayTime_10 !== "") {
                                
                                    echo '
                                    <div>'.$wednesdayTime_10.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($wednesdayTime_11 !== "") {
                                    echo '
                                    <div>'.$wednesdayTime_11.'</div>
                                     ';
                                }
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($wednesdayTime_12 !== "") {
                                
                                    echo '
                                    <div>'.$wednesdayTime_12.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($wednesdayTime_1 !== "") {
                                    echo '
                                    <div>'.$wednesdayTime_1.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Thursday</th>
                                <td>
                                <?php
                                if ($thursdayTime_9 !== "") {
                                    echo '
                                    <div>'.$thursdayTime_9.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($thursdayTime_10 !== "") {
                                
                                    echo '
                                    <div>'.$thursdayTime_10.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($thursdayTime_11 !== "") {
                                    echo '
                                    <div>'.$thursdayTime_11.'</div>
                                     ';
                                }
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($thursdayTime_12 !== "") {
                                
                                    echo '
                                    <div>'.$thursdayTime_12.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($thursdayTime_1 !== "") {
                                    echo '
                                    <div>'.$thursdayTime_1.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Friday</th>
                                <td>
                                <?php
                                if ($fridayTime_9 !== "") {
                                    echo '
                                    <div>'.$fridayTime_9.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($fridayTime_10 !== "") {
                                
                                    echo '
                                    <div>'.$fridayTime_10.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($fridayTime_11 !== "") {
                                    echo '
                                    <div>'.$fridayTime_11.'</div>
                                     ';
                                }
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($fridayTime_12 !== "") {
                                
                                    echo '
                                    <div>'.$fridayTime_12.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($fridayTime_1 !== "") {
                                    echo '
                                    <div>'.$fridayTime_1.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="align-middle">Saturday</th>
                                <td>
                                <?php
                                if ($saturdayTime_9 !== "") {
                                    echo '
                                    <div>'.$saturdayTime_9.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($saturdayTime_10 !== "") {
                                
                                    echo '
                                    <div>'.$saturdayTime_10.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($saturdayTime_11 !== "") {
                                    echo '
                                    <div>'.$saturdayTime_11.'</div>
                                     ';
                                }
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($saturdayTime_12 !== "") {
                                
                                    echo '
                                    <div>'.$saturdayTime_12.'</div>
                                     ';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                                <td>
                                <?php
                                if ($saturdayTime_1 !== "") {
                                    echo '
                                    <div>'.$saturdayTime_1.'</div>';}
                                else
                                {
                                    echo '<div class="gray-txt">No data</div>';
                                }
                                ?>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
                <div class="addbtn">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#timetable_addmodal">Add New Schedule</button>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>
</html>
<?php include 'timetable_addmodal.php' ?>