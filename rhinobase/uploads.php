<?php
include "dbconnect.php";
session_start();
  $loggedin = false;
  if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false)
  {
    header("location: index.php");
    exit;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_FILES["fileToUpload"])){
        $file_name = $_FILES['fileToUpload']['name']; // Specify the directory where you want to store uploaded files
        $file_tmp_name = $_FILES['fileToUpload']['tmp_name']; // Specify the directory where you want to store uploaded files
        $file_size = $_FILES['fileToUpload']['size']; // Specify the directory where you want to store uploaded files

        // Try to upload the file
        if (move_uploaded_file($file_tmp_name,"uploads/". $file_name)) {
            if(mysqli_query($conn,"INSERT INTO `uploads_table` (`f_id`, `f_name`, `f_size`) VALUES (NULL, '$file_name', '$file_size')"))
            {
                header("Location: uploads.php"); // Replace with the appropriate URL
                exit();
            }   
        }
        else{
            echo "error occured";
        }
    }
    if(isset($_POST['file_delete']))
    {
        $id = $_POST['file_id'];
        $sql = "select f_name from uploads_table where f_id = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $row=mysqli_fetch_assoc($result);
            $name = $row['f_name'];
            mysqli_query($conn,"DELETE FROM `uploads_table` WHERE `f_id` = '$id'");
            if(unlink("uploads/".$name))
            {
                echo "file deleted";
                header("Location: uploads.php"); // Replace with the appropriate URL
                exit();
            }
            else{
                echo "an error occured";
            }
        }
        else
        {
            echo mysqli_connect_error();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sidebar.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Uploads</title>
</head>
<body>
    <?php 
    $activeTab = "uploads";
    include "head.php";
     ?>
    <div class="main_ disp_flex">
        <div class="noticeboard" style="">
            <div class="heading">
                <h3>Uploads</h3>
                <button type="button" class="btn btn-primary btn-sm" id="" data-bs-toggle="modal" data-bs-target="#uploadfile">+</button>
            </div>
            <div class="inner-notice">
                <table>
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
                            <tr><td><a href="uploads/<?php echo $name ?>" target="_blank"><?php echo $name ?> </a></td>
                            <?php 
                            if($size >= 1048576)
                                echo '<td class="datetable">'.round(($size/1024/1024),2).' MB</td>';
                            else
                                echo '<td class="datetable">'.round(($size/1024),2).' KB</td>';
                            echo '<td class="notice_btns" id="'.$id.'"><button class="delete"><i class="bx bxs-trash-alt"></i></button></td></tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- upload file modal -->
    <div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="verticalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalLabel">Upload File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Modal content goes here -->
                    <form action="uploads.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="file_submit">
                        <div class="mb-3">
                        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="upload" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- delete upload modal -->
    <div class="modal fade" id="del_upload_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Alert !</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <h4 id="status_text">Are you sure you want to Delete <span id="del_name" style="font-style: italic;"></span> ?</h4>
                    <form action="uploads.php" method="post">    
                        <input type="hidden" name="file_delete" value="1">
                        <input type="hidden" id="file_id" name="file_id" >
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="Submit" class="btn btn-primary">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
          element.addEventListener('click', (e) =>{
            sno = e.target.parentNode.parentNode.id;
            // console.log(e.target.parentNode)
            // console.log(e.target.parentNode.parentNode)
            // console.log(e.target.parentNode.parentNode.parentNode)
            name = e.target.parentNode.parentNode.parentNode.firstElementChild.innerText;
            del_name.innerText = name;
            file_id.value = sno;
            $('#del_upload_modal').modal('toggle');
          })
        });
    </script>
</body>
</html>