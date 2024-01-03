<div class="noticeboard">
    <div class="heading">
        <h3>Notice Board</h3>
        <button type="button" class="btn btn-primary btn-sm" id="addEvent" data-bs-toggle="modal" data-bs-target="#noticeModal">+</button>
    </div>
    <div class="inner-notice">
    <table id="noticeId">
        <tbody>
            <?php 
            $sql1 = "SELECT * FROM `noticeboard_table`";
            $result = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result) == 0)
            {
                echo '<div style="text-align:center;">No Data Available </div>';
            }
            else{
            while ($row = mysqli_fetch_assoc($result)) {
                $content = $row['n_content'];
                $id = $row['n_id'];
                $date = $row['n_date'];
                echo '
                <tr>
                <td class="notice_content">'.$content.'</td>
                <td class="datetable">'.$date.'</td>
                <td class="notice_btns" id="'.$id.'"><button class="delete"><i class="bx bxs-trash-alt"></i></button><button class="edit"><i class="bx bxs-edit"></i></button></td></tr>
                ';
            }
        }
            ?>
        </tbody>
    </table>
</div>
</div>