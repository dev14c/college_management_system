<?php session_start(); 
if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false)
{
  header("location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Data</title>
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
    $activeTab = 'fees';
    include 'head.php';?>
    <?php include 'dbconnect.php'?>;
    <div class="main_">
        <div class="card">
            <div class="card-header">Fees Data</div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>1st Installment</th>
                            <th>2nd Installment</th>
                            <th>3rd Installment</th>
                            <th>4th Installment</th>
                            <th>5th Installment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1="SELECT s_id,s_name,s_fees FROM `student_table`";
                        $result=mysqli_query($conn,$sql1);
                        while($row=mysqli_fetch_assoc($result)){
                            // -- $noresult=false;
                            $name = $row['s_name'];
                            $id = $row['s_id'];
                            $fees = (float)$row['s_fees'];
                            // $department = $row['s_subject'];
                    
                            // Calculate the installment amount
                            $installmentAmount = $fees / 5;
                        echo '
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$installmentAmount.'
                            <div class="font-size13 text-light-gray">Not paid</div>
                            </td>
                            <td>'.$installmentAmount.'</td>
                            <td>'.$installmentAmount.'</td>
                            <td>'.$installmentAmount.'</td>
                            <td>'.$installmentAmount.'</td>   
                        </tr>';
                        }
                        // After successfully saving the data
                        // $_SESSION['success_message'] = "Data saved successfully.";?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });

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
    </div>
</body>
</html>