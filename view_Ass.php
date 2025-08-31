<?php include_once 'php_database/config_db.php'; ?>
<?php
$sql = "SELECT * FROM `sms_lsc` . `task` WHERE `task_type` = 1;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
?>

    <div class="info">
        <h3>View Assignment</h3>
        <table class="table table-striped table-hover table-border" height="100%" width="50%">
            <tr>
                <th>S.No</th>
                <th>Assignment Id</th>
                <th>Assignment Name</th>
                <th>Assignment Description</th>
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
                            <!-- <a href="files/assignment_c.pdf" download>
                                <button class="btn btn-primary">
                                    Download
                                </button>
                            </a> -->


                            <div class="modal fade" id="<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5"><?php echo $row['name'] ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo $row['task_description'] ?></p>

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
    <?php } else {
    echo "<div><h3 style='color:red; margin-top: 18%; text-align:center;'> Any Assignment not available!</h3></div>";
}
    ?>
    </div>