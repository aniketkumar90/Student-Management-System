<?php

session_start();

if (!isset($_SESSION["email"])) {
    header("Location:login.php");
    exit();
}

?>

<?php include_once 'header.php'; ?>
<?php include_once 'navigation.php'; ?>

<?php include_once 'side_nav.php'; ?>

<?php

include_once 'php_database/config_db.php';
?>
<?php

$user_type = $_SESSION['user_type'];

?>


<div class="col-md-10 admin_display_data">
    <h3 style="text-align: center"> Welcome <?php echo $_SESSION['name']; ?></h3>
    <img id="loader" src="images/loader.png" width="100px">

    <?php

    // print_r($_SESSION);
    ?>



    <!-- For Teacher -->
    <?php
    $count_a_t = "SELECT COUNT(status) FROM `sms_lsc` .`users` WHERE `user_type` = 1 and `status`=2;";
    $count_p_t = "SELECT COUNT(status) FROM `sms_lsc` . `users` WHERE `user_type` = 1 and `status`=1;";
    $count_r_t = "SELECT COUNT(status) FROM `sms_lsc` . `users` WHERE `user_type` = 1 and `status`=3;";

    $sql_a_t = mysqli_query($conn, $count_a_t);
    $row1 = mysqli_fetch_array($sql_a_t);
    $sql_p_t = mysqli_query($conn, $count_p_t);
    $row2 = mysqli_fetch_array($sql_p_t);
    $sql_r_t = mysqli_query($conn, $count_r_t);
    $row3 = mysqli_fetch_array($sql_r_t);

    ?>
    <!-- For Student -->
    <?php
    $count_a_s = "SELECT COUNT(status) FROM `sms_lsc` . `users` WHERE `user_type` = 2 and `status`=2;";
    $count_p_s = "SELECT COUNT(status) FROM `sms_lsc` . `users` WHERE `user_type` = 2 and `status`=1;";
    $count_r_s = "SELECT COUNT(status) FROM `sms_lsc` . `users` WHERE `user_type` = 2 and `status`=3;";

    $sql_a_s = mysqli_query($conn, $count_a_s);
    $row4 = mysqli_fetch_array($sql_a_s);
    $sql_p_s = mysqli_query($conn, $count_p_s);
    $row5 = mysqli_fetch_array($sql_p_s);
    $sql_r_s = mysqli_query($conn, $count_r_s);
    $row6 = mysqli_fetch_array($sql_r_s);

    ?>



    <div class="container">
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-6">
            <?php
            if ($user_type == 3) : ?>
                <div class="col">
                    <div class="card h-60 rounded-4 shadow-lg gradient1 dash_card">
                        <div class="h-100 pb-3 text-white text-shadow-1">
                            <h4>All Approved Teachers</h4>
                            <h1><?php echo $row1['0']; ?></h1>




                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-60 rounded-4 shadow-lg gradient1 dash_card">
                        <div class="h-100 pb-3 text-white text-shadow-1">
                            <h4>All Pending Teachers</h4>

                            <h1><?php echo $row2['0']; ?> </h1>




                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-60 rounded-4 shadow-lg gradient1 dash_card">
                        <div class="h-100 pb-3 text-white text-shadow-1">
                            <h4>All Rejected Teachers</h4>


                            <h1><?php echo $row3['0']; ?></h1>



                        </div>
                    </div>
                </div>

            <?php
            endif; ?>

            <?php

            if ($user_type == 1 or $user_type == 3) : ?>

                <div class="col">
                    <div class="card h-60 rounded-4 shadow-lg gradient1 dash_card">
                        <div class="h-100 pb-3 text-white text-shadow-1">
                            <h4>All Approved Students</h4>

                            <h1><?php echo $row4['0']; ?></h1>



                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-60 rounded-4 shadow-lg gradient1 dash_card">
                        <div class="h-100 pb-3 text-white text-shadow-1 ">
                            <h4>All Pending Students</h4>

                            <h1><?php echo $row5['0']; ?></h1>




                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-60 rounded-4 shadow-lg gradient1 dash_card">
                        <div class="h-100 pb-3 text-white text-shadow-1">
                            <h4>All Rejected Students</h4>

                            <h1><?php echo $row6['0']; ?></h1>

                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <!-- </div> -->

<?php
    endif; 
?>

<?php
if ($user_type == 2) : ?>
    <div class="container">
        <div class="row student_dash">


            <h2> <b> Design is where science and art break even. </b> </h2>

        </div>
        </div>
    </div>
</div>
</div>
</div>



<?php
endif; 
?>


<script>
    $(document).ready(function() {
        var page = window.location.href.split("#")[1];
        if (page) {
            $(".admin_display_data").load(page);
        }
    });
</script>

<!-- // $(document).ready(function() {
    //     page = window.location.href.split("#")[1];
    //     //window.history.pushState("Details", "Title", page);
    //     console.log(window.location.href.split("#"));

    //     // console.log(page);

    //     $(".admin_display_data").load(page);
    // }); -->


<!-- <script>
    $(document).ready(function() {
        page = window.location.href.split("#")[1];
        if (page == [1]) {
            // page = window.location.href.split("#")[1];
            $(".admin_display_data").load(page);
        }
        //window.history.pushState("Details", "Title", page);
    });
</script> -->





<?php include_once 'Footer.php'; ?>