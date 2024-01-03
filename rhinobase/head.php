<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sidebar.css">
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
        <img src="images/user.png" alt="">
      </div>
    </div>
    <div class="sidebar_">
      <div id="menu">
      <ul class="navlinks" id="nav">
        <li>
          <a href="sidebar.php" class="btn_ <?php if ($activeTab === 'sidebar') echo 'active'; ?>">
            <i class="bx bx-grid-alt"></i>
            <span class="link_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="teacher.php" class="btn_ <?php if ($activeTab === 'teacher') echo 'active'; ?>">
            <i class="bx bxs-user-circle"></i>
            <span class="link_name">Teachers</span>
          </a>
        </li>
        <li>
          <a href="events_calender.php" class="btn_ <?php if ($activeTab === 'events_calender') echo 'active'; ?>">
            <i class='bx bxs-calendar-event'></i>
            <span class="link_name">Events</span>
          </a>
        </li>
        <li>
          <a href="students.php" class="btn_ <?php if ($activeTab === 'students') echo 'active'; ?>">
            <i class="bx bxs-graduation"></i>
            <span class="link_name">Students</span>
          </a>
        </li>
       
        <li>
          <a href="time_table.php" class="btn_ <?php if ($activeTab === 'time_table') echo 'active'; ?>">
          <i class='bx bxs-time-five'></i>
            <span class="link_name">Time Table</span>
          </a>
        </li>
        <li>
          <a href="fees_structure.php" class="btn_ <?php if ($activeTab === 'fees') echo 'active'; ?>">
          <i class='bx bx-rupee' ></i>
            <span class="link_name">Fees</span>
          </a>
        </li>
        <li>
            <a href="uploads.php" class="btn_ <?php if ($activeTab === 'uploads') echo 'active'; ?>">
            <i class='bx bxs-cloud-upload'></i>
                <span class="link_name">Uploads</span>
            </a>
          </li>
        </ul>

        <!-- <div class="profile-details">
            <div class="profile-content">
                <img src="user.png" alt="" />
              </div>
              <div class="profile_name">Kartik Udenia</div>
              <i class='bx bxs-log-in'></i>
            </div> -->
            <div class="profile-details">
                <img src="images/user.png" alt="" />
                <div class="profile_name">
                  <span><?php echo $_SESSION['name']; ?></span>
                  <a href="logout_admin.php" class="btn_ ">
                    <i class='bx bxs-log-in'></i>
                    <span class="link_name">Logout</span>
                  </a>
                </div>
              </div>
      </div>
    </div>
    <script>
      // var btns = document.getElementsByClassName("btn_");
      // for (var i = 0; i < btns.length; i++) {
      //   btns[i].addEventListener("click", function () {
      //     var current = document.getElementsByClassName("active");
      //     // console.log(current)
      //     current[0].className = current[0].className.replace(" active");
      //     this.className = this.className + " active";
      //   });
      // }
      const tabLinks = document.querySelectorAll('nav a');

    // Add click event listeners to each tab link
    tabLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            // Prevent the default behavior of the link (prevent page reload)
            event.preventDefault();

            // Remove the 'active' class from all tab links
            tabLinks.forEach(link => {
                link.classList.remove('active');
            });

            // Add the 'active' class to the clicked tab link
            this.classList.add('active');

            // Redirect to the target PHP page
            const targetPage = this.getAttribute('href');
            window.location.href = targetPage;
        });
    });
    </script>
</body>
</html>
<?php include 'noticeModal.php' ?>