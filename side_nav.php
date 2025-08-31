<?php

// session_start();
$user_type = @$_SESSION['user_type'];

?>

<div class="row">
    <div class="col-md-12">
        <div class="images_bg5 img-fluid">
            <img src="images/shape-5.png" alt="image">
        </div>
    </div>
</div>
<!-- <div class="container-fluid"> -->
<div class="row">
    <div class="col-md-2">
        <div class="side-bar">
            <a href="dashboard.php">
                <h3><i class="bi bi-upc"></i>Dashboard</h3>
            </a>
            <div class="menu">

                <?php
                // print_r($_SESSION);
                ?>

                <?php
                if ($user_type == 3) : ?>


                    <div class="item">
                        <a class="sub-btn"><i class="bi bi-person icon"></i>Teacher </a>
                        <div class="sub-menu">
                            <a href="#tcr_approved.php" id="approved-teacher" class="sub-item">Approved</a>
                            <a href="#tcr_pending.php" id="pending-teacher" class="sub-item">Pending</a>
                            <a href="#tcr_rejected.php" id="rejected-teacher" class="sub-item">Rejected</a>
                        </div>
                    </div>
                <?php
                endif; ?>

                <?php
                if ($user_type == 1 or $user_type == 3 ) : ?>
                    <div class="item">
                        <a class="sub-btn"><i class="bi bi-person icon"></i>Student </a>
                        <div class="sub-menu">
                            <a href="#a_approved_stu.php" id="a_approved_student" class="sub-item">Approved</a>
                            <a href="#a_pending_stu.php" id="a_pending_student" class="sub-item">Pending</a>
                            <a href="#a_rejected_stu.php" id="a_rejected_student" class="sub-item">Rejected</a>
                        </div>
                    </div>
                <?php
                endif; ?>

                <div class="item">
                    <a class="sub-btn"><i class="bi bi-border-width"></i>Assignment </a>
                    <div class="sub-menu">
                        <a href="#view_Ass.php" id="view_assignment_admin" class="sub-item">View</a>
                        <?php
                        if ($user_type != 2) : ?>

                            <a href="#upload_Ass.php" id="upload_assignment_admin" class="sub-item">Add</a>
                        <?php
                        endif; ?>
                    </div>
                </div>
                <div class="item">
                    <a class="sub-btn"><i class="bi bi-newspaper"></i>Notice </a>
                    <div class="sub-menu">
                        <a href="#view_notice.php" id="view_notice" class="sub-item">View</a>
                        <?php
                        if ($user_type != 2) : ?>
                            <a href="#upload_notice.php" id="upload_notice" class="sub-item">Add</a>
                        <?php

                        endif; ?>

                    </div>
                </div>
                <div class="item">
                    <a href="#profile.php" id="view_profile"><i class="bi bi-newspaper"></i>Profile </a>
                    <!-- <div class="sub-menu">
                        <a class="sub-btn"><i class="bi bi-person-vcard-fill"></i>Profile </a>
                            <a id="view_profile_admin" class="sub-item">View Profile</a>
                            <a id="update_profile_admin" class="sub-item">Update</a>
                        </div> -->
                </div>
                <div class="item"><a href="logout.php"><i class="bi bi-upc"></i>Sign Out</a></div>
            </div>
        </div>
    </div>


    <!-- for teacher -->


    <!--     
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="side-bar">
                <h3><i class="bi bi-upc"></i>Dashboard</h3>
                <div class="menu">
                    <div class="item">
                        <a class="sub-btn"><i class="bi bi-person icon"></i>Student </a>
                        <div class="sub-menu">
                            <a href="#" id="t_approved_stu" class="sub-item">Approved</a>
                            <a href="#" id="t_pending_stu" class="sub-item">Pending</a>
                            <a href="#" id="t_rejected_stu" class="sub-item">Rejected</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="sub-btn"><i class="bi bi-border-width"></i>Assignment </a>
                        <div class="sub-menu">
                            <a href="#" id="view_assignment_teacher" class="sub-item">View</a>
                            <a href="#" id="upload_assignment_teacher" class="sub-item">Add</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="sub-btn"><i class="bi bi-newspaper"></i>Notice </a>
                        <div class="sub-menu">
                            <a href="#" id="view_notice_teacher" class="sub-item">View</a>
                            <a href="#" id="upload_notice_teacher" class="sub-item">Add</a>
                        </div>
                    </div>
                    <div class="item">
                        <a href="#" class="sub-btn" id="view_profile_teacher"><i class="bi bi-newspaper"></i>Profile </a>
                        <div class="sub-menu">
                            <a id="view_profile_teacher" class="sub-item">View Profile</a>
                            <a id="update_profile_teacher" class="sub-item">Update Profile</a>
                        </div> 
                    </div>
                    <div class="item"><a href="logout.php"><i class="bi bi-upc"></i>Sign Out</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-10 teacher_display_data">
            <h2 style="text-align: center"> Welcome Navin</h2>

        </div>
    </div>
</div> -->



    <!-- for student -->


    <!-- 

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="side-bar">
                <h3><i class="bi bi-upc"></i>Dashboard</h3>
                <div class="menu">
                    <div class="item">
                        <a class="sub-btn"><i class="bi bi-border-width"></i>Assignment </a>
                        <div class="sub-menu">
                            <a id="view_assignment_student" class="sub-item">View</a>
                            <a id="upload_assignment_student" class="sub-item">Submit</a>

                        </div>
                    </div>
                    <div class="item">
                        <a class="sub-btn"><i class="bi bi-newspaper"></i>Notice </a>
                        <div class="sub-menu">
                            <a id="view_notice_student" class="sub-item">View</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="sub-btn" id="view_profile_student"><i class="bi bi-newspaper"></i>Profile </a>
                       <div class="sub-menu">
                            <a id="view_profile_student" class="sub-item">View Profile</a>
                            <a id="update_profile_student" class="sub-item">Update Profile</a>
                        </div> 
                    </div>
                    <div class="item"><a href="logout.php"><i class="bi bi-upc"></i>Sign Out</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-10 student_display_data">
            <h2 style="text-align: center"> Welcome Muskan</h2>

        </div>
    </div>
</div>
 -->