<?php include_once 'php_database/config_db.php'; ?>
<?php
$sql1 = "SELECT * FROM task where task_type = 2;";
$result = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0) {
?>
    <div class="info">
        <h3>View Notice</h3>
        <table class="table table-striped table-hover table-border" height="100%" width="50%">
            <tr>
            <th>S.No</th>

                <th>Notice_Id</th>
                <th>Notice Name</th>
                <th>Notice Description</th>
                <th>Action</th>
            </tr>
        
            
             
            <?php
            $s_no = 1;
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                <td><?php echo $s_no++; ?></td>

                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['task_description'] ?></td>

                    <td>
                        <div class="btn" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $row['id']; ?>">
                                View
                            </button>

                            <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5"><?php echo $row['name']; ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <p><?php echo $row['task_description']; ?></p>

                                            <!-- <p> Time Table will be declare on 01 May 2024 </p> -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php }
    else{
        echo "<div><h3 style='color:red; margin-top: 18%; text-align:center;'> Any Notice not available!</h3></div>";

    } ?>
    </div>