<?php 
// session_start();
// $loggedin = false;
// if(!isset($_SESSION['s_loggedin']) && $_SESSION['s_loggedin'] != true)
// {
//   header("location: login_student.php");
//   exit;
// }
// else
// {
//   $loggedin = true;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="topbar_">
      <div class="logo-details">
        <!-- <img src="logo.jpg" alt="" /> -->
        <h2>EduPlus</h2>
        <!-- <span class="logo-name">Demo</span> -->
      </div>
      <div class="search_">
        <input type="text" name="" id="search" placeholder="search here">
        <label style="position: relative; right:35px;" for="search"><i class='bx bx-search' ></i></label>
      </div>  
      <!-- <box-icon type='solid' name='bell'></box-icon> -->
      <i class='bx bxs-bell'></i>
      <div class="user">
      <img src="<?php echo "../uploads/s_images/".$_SESSION['sphoto'] ?>"alt="" />
                
      </div>
    </div>
    <div class="sidebar_">
      <div>
      <ul class="navlinks" id="nav">
        <?php if(isset($activeTab)){ ?>
        <li>
          <a href="dashboard.php" class="btn_ <?php if ($activeTab === 'dashboard') echo 'active'; ?>">
            <i class="bx bx-grid-alt"></i>
            <span class="link_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="download.php" class="btn_ <?php if ($activeTab === 'download') echo 'active'; ?>">
            <i class='bx bxs-download'></i>
            <span class="link_name">Downloads</span>
          </a>
        </li>
        
        <li>
            <a href="events_calender.php" class="btn_ <?php if ($activeTab === 'events_calender') echo 'active'; ?> ">
              <i class='bx bxs-calendar-event'></i>
            <span class="link_name">Calender</span>
          </a>
        </li>
        <li>
            <a href="fees_pay.php" class="btn_ <?php if ($activeTab === 'fees_pay') echo 'active'; ?> ">
              <i class='bx bxs-calendar-event'></i>
            <span class="link_name">Fees</span>
          </a>
        </li>
        <li>
            <a href="timetable.php" class="btn_ <?php if ($activeTab === 'timetable') echo 'active'; ?> ">
            <i class='bx bxs-time-five'></i>
            <span class="link_name">Time Table</span>
          </a>
        </li>
        </ul>
        <?php } ?>
            <div class="profile-details">
                <img src="<?php echo "../uploads/s_images/".$_SESSION['sphoto'] ?>"alt="" />
                <div class="profile_name">
                  <span><?php echo $_SESSION['sname']; ?></span>
                  <a href="logout_student.php" class="btn_ ">
                    <i class='bx bxs-log-in'></i>
                    <span class="link_name">Logout</span>
                  </a>
                </div>
              </div>
      </div>
    </div>
   
    <script>
      var btns = document.getElementsByClassName("btn_");
      for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
          var current = document.getElementsByClassName("active");
          // console.log(current)
          current[0].className = current[0].className.replace(" active");
          this.className = this.className + " active";
        });
      }
    </script>
<?php
    include '../dbconnect.php';

?>
</body>
</html>