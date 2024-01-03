<?php 
session_start();
$loggedin = false;
if(!isset($_SESSION['s_logged']) && $_SESSION['s_loggedin'] != true)
{
  header("location: login_student.php");
  exit;
}
else
{
  $loggedin = true;
}
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
  <?php 
  $activeTab = "download";
  include "sidebar.php"; ?>
  <div class="main_ disp_flex">
  <div class="noticeboard">
      <div class="heading">
        <h3 style="padding-top: 10px;">Downloads</h3>
      </div>
      <div class="inner-notice">
        <table id="noticeId">
          <tbody>
            <?php 
              $sql1 = "SELECT * FROM `uploads_table`";
              $result = mysqli_query($conn, $sql1);
              if(mysqli_num_rows($result) == 0)
              {
                  echo '<div style="text-align:center;">No Data Available</div>';
              }
              else{
              while ($row = mysqli_fetch_assoc($result)) {
                  $name = $row['f_name'];
                  $id = $row['f_id'];
                  $size = $row['f_size'];
                  ?>
                  <tr><td><a download = "<?php echo $name; ?>" href="../uploads/<?php echo $name; ?>" target="_blank"><?php echo $name; ?> </a></td>
                  <?php 
                  if($size >= 1048576)
                      echo '<td class="datetable">'.round(($size/1024/1024),2).' MB</td>';
                  else
                      echo '<td class="datetable">'.round(($size/1024),2).' KB</td>';
                  // echo '<td class="notice_btns" id="'.$id.'"><button class="delete"><i class="bx bxs-trash-alt"></i></button></td></tr>';
                  }
              }
              ?>
          </tbody>
        </table>
      </div>
  </div>
</body>
</html>