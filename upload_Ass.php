<?php
// include_once 'config_db.php';
// @session_start();

// if (!isset($_SESSION["email"])) {
//     header("Location: ../login.php");
//     exit();

?>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p_image">
            <h2 style="text-align:center">Add Assignment</h2>

            <form action="php_database/upload_task.php" method="POST">
                <div>
                    <label for="ass_name" class="form-group">Assignment Name:</label>
                    <input type="text" name="task_name" class="form-control">

                    <label for="uploadd_ass" class="form-group form-label">Assignment Description:</label>
                    <textarea class="form-control" type="text" name="task_description" aria-label="With textarea" rows="3"></textarea>


                    <label for="img" class="form-group">Choose File:</label>
                    <input type="file" name="img" class="form-control">

                    <input type="hidden" name="task_type" class="form-control" value="1">

                </div>

                <br>
                <button class="btn btn-primary up_profiles" name="upload_task">Upload</button>

            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>