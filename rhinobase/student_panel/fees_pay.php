<?php 

include '../dbconnect.php';
session_start();
// Check if the form is submitted
if(isset($_POST['form_submitted'])) {
    // Retrieve form data without sanitization (not recommended for security reasons)
    $name = $_POST['s_name'];
    $email = $_POST['s_email'];
    $installmentType = $_POST['f_fees']; // Assuming 'f_fees' contains the installment type

    // Determine the column to update based on the selected installment type
    $columnToUpdate = '';
    switch($installmentType) {
        case '1st-installment':
            $columnToUpdate = 'f_1';
            break;
        case '2nd-installment':
            $columnToUpdate = 'f_2';
            break;
        case '3rd-installment':
            $columnToUpdate = 'f_3';
            break;
        case '4th-installment':
            $columnToUpdate = 'f_4';
            break;
        case '5th-installment':
            $columnToUpdate = 'f_5';
            break;
        default:
            // Handle unknown or invalid installment types
            break;
    }

    // Update payment status to "Paid" for the selected installment in the database
    if(!empty($columnToUpdate)) {
        $sql = "UPDATE fees_table SET $columnToUpdate = 'Paid' WHERE f_name='$name'";
        if(mysqli_query($conn, $sql)) {
            // Payment status updated successfully
            echo "done";
            // You can redirect the user or display a success message
            header('Location: fees_pay.php');
            exit();
        } else {
            // Handle the update failure (e.g., display an error message)
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // Handle invalid or unknown installment types
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/sidebar.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
  .student_detail {
    border: 1px solid #eeeeee;
    margin-top: 20px;
    margin-left: 30px;
    padding: 10px;
    /* border-radius: 10px 10px; */
    /* height:100px; */
    /* width: 100%; */

  }

  .details {
    border: 1px solid #eeeeee;
    padding: 10px;

    /* border-radius: 10px 10px; */
    /* height: 600px; */
  }
</style>

<body>
  <?php 
  $activeTab = "fees_pay";
  include 'fees_pay_modal.php';
  include "sidebar.php"; ?>
  <div class="main_">
    <div class="container">
    <div class="student_detail">
      <p class="student_text" style="margin-bottom: 10px"> Student Detail</p>
      <div class="details">
        <span style="margin-bottom: 0px;font-weight: bold;">Name: </span>
        <h3><?php echo $_SESSION['sname']; ?></h3>
        <br>
        <span style="margin-bottom: 0px; font-weight: bold;">Section: </span>
        <h4><?php echo $_SESSION['sdept']." ".$_SESSION['ssemister']; ?></h4>
      </div>
    </div>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Installment</th>
              <th>Fee Status</th>
              <th>Action</th>
            </tr>
          </thead>
     
          <?php
// Loop through the installments and display them dynamically

$sql1 = "SELECT * FROM `fees_table` where f_id = ".$_SESSION['sid'];
$result = mysqli_query($conn, $sql1);

while ($row = mysqli_fetch_assoc($result)) {

    for ($i = 1; $i <= 5; $i++) {
        $installmentStatus = $row["f_" . $i]; // Assuming your database columns are named f_1, f_2, ..., f_5
        $paymentStatus = ($installmentStatus == 'Not Paid') ? 'Not paid' : 'Paid';
        echo '<tr>';
        echo '<td>' . $i . 'st Installment</td>';
        echo '<td>' . $paymentStatus . '</td>';
        echo '<td><button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#fees_pay_modal">
              <img src="Pay_now-removebg-preview.png" alt="" width="50px">
            </button></td>';
        echo '</tr>';
    }
}
?>

        </table>
      </div>
    </div>
  </div>
  
  <script>
    function openEditModal(teacherId) {
      // Set the teacher ID in a hidden input field inside the modal
      document.getElementById('edit_teacher_id').value = teacherId;

      // Open the edit modal
      var myModal = new bootstrap.Modal(document.getElementById('edit_teacher_modal'));
      myModal.show();
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>