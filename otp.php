
<?php include_once 'header.php'; ?>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <form method="POST" action="change_pw_reset.php" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="number" class="form-control" placeholder="Enter OTP">
    </div>
    <div class="mb-3 style">
        <button style="margin-bottom:80%;"type="submit" class="btn btn-primary">Verify OTP</button>
    </div>
</form>
    </div>
    <div class="col-md-4"></div>
</div>
<?php include_once 'Footer.php'; ?>
