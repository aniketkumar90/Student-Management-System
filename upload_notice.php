<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p_image">
            <h2 style="text-align:center">Add Notice</h2>

            <form action="php_database/upload_task.php" method="POST">
                <div>

                    <label for="notice_name" class="form-group">Notice Name:</label>
                    <input type="text" name="task_name" class="form-control">

                    <label for="notice" class="form-group form-label">Notice Description:</label>
                    <textarea class="form-control" name="task_description" aria-label="With textarea" rows="3"></textarea>

                    <label for="img" class="form-group">Choose File:</label>
                    <input type="file" name="img" class="form-control">

                    <input type="hidden" name="task_type" class="form-control" value="2">

                </div>
                <br>
                <p><button class="btn btn-primary up_profiles"  name="upload_task">Add Notice</button></p>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>