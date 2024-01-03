<?php
  $showError = false;
  $login = false;
  // On the login page
    session_start();
    if (isset($_SESSION['s_loggedin']) && $_SESSION['s_loggedin'] == true) {
        // Redirect to the dashboard or another authorized page
        header("Location: dashboard.php");
        exit;
    }
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    require "../dbconnect.php";

    $email = $_POST['email'];
    $password = $_POST['pass'];
    // $sql = "select * from users where username='$username' AND password='$password'";
    $sql = "select * from student_table where s_mail='$email'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
      while($rows = mysqli_fetch_assoc($result))
      {
        if(password_verify($password,$rows['s_pass']))
        {
          $login = true;
          session_start();
          $_SESSION['s_loggedin'] = true;
          $_SESSION['sname'] = $rows['s_name'];
          $_SESSION['sdept'] = $rows['s_dept'];
          $_SESSION['ssemister'] = $rows['s_semister'];
          $_SESSION['sid'] = $rows['s_id'];
          $_SESSION['sphoto'] = $rows['s_photo'];
          header("location: dashboard.php");
        }
        else
        {
          $showError = "Wrong Password";
          // echo "Password match nahi hua ";
        }
      }
    }
    else
    {
      echo mysqli_connect_error();
      // echo "email nahi mila";
      $showError = "User Not Found";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login_page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 
</head>
<body>
      <?php
      if ($showError){ 
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error ! </strong>'.$showError.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      } ?>
    <div class="outer_box">
        <div class="inner_box">
            <div class="demo">
                <!-- <img src="../images/logo.webp" alt="eroor accourred"> -->
                <span>EduPlus</span>
            </div>
            <header class="login_header">
                <h2>Login to your student account</h2>
            </header>
            <main class="login_body">
                <form action="login_student.php" method="post">
                    <p>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="enter email address" required>
                    </p>
                    <p>
                        <label for="password">Password</label>
                        <input type="password" name="pass" id="pswrd" placeholder="Enter your password" required>
                        <img src="../images/visible.png" alt="error" onclick="toggleVisibility()" id="eye">
                    </p>
                    <p>
                        <input type="submit" value="Login" id="submit">
                    </p>
                </form>
            </main>
            <footer class="login_footer">
                <p>Admin Account login<a href="../index.php">Login</a></p>
            </footer>
        </div>  
    </div>
<script>  
    function toggleVisibility() {  
      var getPasword = document.getElementById("pswrd"); 
      var eye = document.getElementById("eye"); 
      if (getPasword.type === "password") {  
        getPasword.type = "text";
        eye.src = "images/hidden.png"
      } else {  
        getPasword.type = "password";
        eye.src = "images/visible.png"  
      }  
    }  
    </script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>