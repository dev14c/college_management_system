<?php
  session_start();
  $loggedin = false;
  if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true)
  {
    header("location: index.php");
    exit;
  }
  else
  {
    $loggedin = true;
  }
?>
<?php
include 'dbconnect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Check if the form for adding teachers was submitted
  if (isset($_POST['notice_submit']) ) {
      // Form for adding teachers has been submitted
      $data = $_POST['n_content'];
    
      $sql = "INSERT INTO `noticeboard_table` (`n_id`, `n_content`, `n_date`) VALUES (NULL, '$data', current_timestamp());";
      
      if (mysqli_query($conn, $sql)) {
        header("Location: sidebar.php"); // Replace with the appropriate URL
        exit();
        // Data inserted successfully, you can set a success message if needed
        // $_SESSION['success_message'] = "Data saved successfully.";
      } else {
        // Error during insertion
        echo "Error: " . mysqli_error($conn);
      }
    } 
    if (isset($_POST['notice_edit'])) {
      // Form for adding teachers has been submitted
      $data = $_POST['n_content'];
      $id = $_POST['n_id'];
      
      $sql = "UPDATE `noticeboard_table` SET `n_content` = '$data' WHERE `n_id` = '$id';";
      if (mysqli_query($conn, $sql)) {
          header("Location: sidebar.php"); // Replace with the appropriate URL
          exit();
          // Data inserted successfully, you can set a success message if needed
          // $_SESSION['success_message'] = "Data saved successfully.";
      } else {
          // Error during insertion
          echo "Error: " . mysqli_error($conn);
      }
  } 
  if (isset($_POST['notice_delete'])) {
      // Form for adding teachers has been submitted
      $id = $_POST['notice_id'];

      $sql = "delete from noticeboard_table where n_id = '$id'";

      if (mysqli_query($conn, $sql)) {
          header("Location: sidebar.php"); // Replace with the appropriate URL
          exit();
          // Data inserted successfully, you can set a success message if needed
          // $_SESSION['success_message'] = "Data saved successfully.";
      } else {
          // Error during insertion
          echo "Error: " . mysqli_error($conn);
      }
  } 
}
?>
 <?php


// SQL queries to count male and female students
$sqlMale = "SELECT COUNT(s_gender) as maleCount from student_table where `s_gender`='Male'";
$sqlFemale = "SELECT COUNT(s_gender) as femaleCount from student_table where `s_gender`='Female'";

// Execute the queries
$resultMale = mysqli_query($conn, $sqlMale);
$resultFemale = mysqli_query($conn, $sqlFemale);

// Check for query execution errors
if (!$resultMale || !$resultFemale) {
    die("Error in SQL query: " . mysqli_error($conn));
}

// Fetch counts
$rowMale = mysqli_fetch_assoc($resultMale);
$rowFemale = mysqli_fetch_assoc($resultFemale);

// Store counts in variables
$maleCount = $rowMale['maleCount'];
$femaleCount = $rowFemale['femaleCount'];

// Output the counts (you can remove this in your actual code)


// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <title>Home</title>
    <style>
    .tab {
    padding: 10px 20px;
    text-decoration: none;
    background-color: #ccc;
    margin-right: 10px;
}

.tab.active {
    background-color: #007bff;
    color: #fff; /* Change text color for better contrast */
}
    </style>
  </head>
  <body>
    <?php 
    $activeTab = 'sidebar';
    include 'dbconnect.php';
    include 'head.php';
    include 'edit_notice.php';
    include 'del_notice.php';
    include 'dashboard_data.php';
    $name_parts = explode(" ",$_SESSION['name']);
    ?>
    <!-- hello -->
    <div class="main_">
      <h2 class="disp_flex head "><?php echo "Welcome, ".$name_parts[0]." !"; ?></h2>
      <section class="total_calc">
        <div class="total_students">
          <div class="circle_total">
            <span class="icon_total"
              ><img src="images/students.png" class="img_icon" alt=""
            /></span>
            <!-- Replace this with your desired icon -->
          </div>

          <p style="color: black; font-weight: 600; margin-left: 20px">
            Total Students
          </p>

          <p><?php echo $GLOBALS['total_students']; ?></p>
        </div>
        <div class="total_students">
          <div class="circle_total">
            <span class="icon_total"
              ><img src="images/teachers.png" class="img_icon" alt=""
            /></span>
            <!-- Replace this with your desired icon -->
          </div>

          <p style="color: black; font-weight: 600; margin-left: 20px">
            Total Teachers
          </p>

          <p><?php echo $GLOBALS['total_teachers']; ?></p>
        </div>
        <div class="total_students">
          <div class="circle_total">
            <span class="icon_total"
              ><img src="images/teachers.png" class="img_icon" alt=""
            /></span>
            <!-- Replace this with your desired icon -->
          </div>

          <p style="color: black; font-weight: 600; margin-left: 20px">
            Total Employee
          </p>
          <p>25</p>
        </div>
      </section>
      <div class="disp_flex">
     


        <!-- circle -->
        <div class="chartgender">

          <div style="font-weight: bold">Total students By gender</div>

          <div id="chartContainer" style="height: 300px; width: 300px; position: relative; left: 8px;"></div>
          <!-- <span class="blue-rectangle"></span><span style="position: relative;bottom: -260px;left: 150px;">Boys:1500</span> -->
          
          <span class="light_blue-rectangle"></span>
          <span style="position: relative; right: -150px; bottom: -30px">Girls:<?php echo  $femaleCount;?></span>
          <span class="blue-rectangle"></span>
          <span style="position: relative; left: -130px">Boys:<?php echo  $maleCount;?></span>
        </div>
          <?php include 'noticeboard.php'; ?>
      </div>
    <!-- <?php include "calender.html" ?> -->
    <script
      type="text/javascript"
      src="https://cdn.canvasjs.com/canvasjs.min.js"
    ></script>
    <script>
      // var btnContainer = document.getElementById('nav');
      window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
          title: {
            text: "",
          },
          data: [
            {
              type: "doughnut",
              dataPoints: [
                { y: <?php echo $maleCount;?>, color: "rgb(77, 139, 249)" },
                { y: <?php echo $femaleCount;?>, color: "rgb(31, 230, 209)" },
              ],
            },
          ],

          // content: "Text 2500"
        });

        chart.render();
      };
    </script>
    <script>
      deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
          element.addEventListener('click', (e) =>{
            sno = e.target.parentNode.parentNode.id;
            console.log(notice_id)
            notice_id.value = sno;
            $('#del_notice_Modal').modal('toggle');
          })
        });
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
          element.addEventListener('click', (e) => {
            notice_data = e.target.parentNode.parentNode.parentNode.firstElementChild;
            // console.log(e.target)
            // console.log(e.target.parentNode)
            // console.log(e.target.parentNode.parentNode)
            // console.log(e.target.parentNode.parentNode.parentNode)
            // console.log(e.target.parentNode.parentNode.parentNode.firstElementChild)
            
            // console.log(notice_data)
            notice_content.value = notice_data.innerText;
            sno = e.target.parentNode.parentNode.id;
            n_id.value = sno;
            console.log(n_id)
            $('#edit_notice_modal').modal('toggle');
          })
        });
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>
