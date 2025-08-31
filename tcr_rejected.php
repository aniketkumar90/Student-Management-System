<?php

session_start();
?>

<div class="info">
    <h3>All Rejected Teachers</h3>

    <?php include_once 'php_database/config_db.php'; ?>

    <?php
    $sql = "SELECT * FROM `sms_lsc` . `users` WHERE `users` . `user_type` = 1 and `users` . `status` = 3";
    $result = mysqli_query($conn, $sql) or die("No Data Found");

    if (mysqli_num_rows($result) > 0) {
    ?>


        <table class="table table-striped table-hover table-border" height="100%" width="50%">
            <tr>
                <th>S.No</th>

                <th>Id</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Action</th>
            </tr>

            <?php
            $s_no = 1;
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $s_no++; ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td>
                        <div>

                            <button class="btn btn-success  a_pprove"><a style="text-decoration: none;color:white;" href='php_database/all_approved.php?id=<?php echo $row['id'] ?>&user_type=<?php echo $row['user_type'] ?>' class="approve-link"> Approve</a></button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php } else {
        echo "<div>
        <h3 style='color:red; margin-top: 18%;'>No Any Rejected Teacher Data Found!</h3>
        </div>";
    }
    ?>
</div>