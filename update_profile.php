<?php
session_start();

// if (!isset($_SESSION['email'])) {
    // header("Location: login.php");
    // exit();
// }



$name = $_SESSION['name'];
$email = $_SESSION['email'];
$dob = $_SESSION['dob'];
$address = $_SESSION['address'];
$user_type = $_SESSION['user_type'];


?>



<div class="container container-fluid admin-profile">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p_image">
            <h2 style="text-align:center">Update Admin Profile</h2>
            <div class="card">
                <!-- <img src="images/RG_Logo.png" alt="profile_pic"> -->
                <form action="php_database/update_profile_db.php" method="POST">
                    <div>
                        <label for="f_name" class="form-group">Father's Name:</label>
                        <input type="text" name="f_name" class="form-control">
                    </div>
                    <div>
                        <label for="m_name" class="form-group">Mother's Name:</label>
                        <input type="text" name="m_name" class="form-control">
                    </div>
                    <div>
                        <label for="dob" class="form-group">Date Of Birth:</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div>
                        <label for="address" class="form-group">Address:</label>
                        <textarea name="address" rows="3" cols="5" class="form-control"> </textarea>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="up_profiles btn btn-primary">Update Profile</button>
                        </div>
                       
                    </div>
                    
                </form>

            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


<!-- Teacher Profile  -->

<!-- 
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 p_image">
            <h2 style="text-align:center">Teacher Profile</h2>
            <div class="card">
                <img src="images/navin.png" alt="profile_pic" width="50px">
                <h1>Navin Kumar</h1>
                <p>Email Id:- <span>nav_dev@sms.com</span></p>
                <p>D.O.B:- <span>01/01/2000</span></p>
                <p>Address:- <span>Muzaffarpur, Bihar</span></p>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div> 
-->












<!-- <div class="container"> -->
<!-- </div> -->