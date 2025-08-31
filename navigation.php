
<?php

//  session_start();
$email=@$_SESSION['email'];

if (!isset($_SESSION["email"])) {
    // header("Location:Index.php");
    // exit();
}

else{
    // header("Location:Index.php");
}
?>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Index.php"><i class="bi bi-house"></i> Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="about.php"><i class="bi bi-file-person-fill"></i> About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php"><i class="bi bi-telephone"></i> Contact</a>
        </li>
        <li>&emsp;&emsp;&emsp;</li>


        <?php if (!isset($_SESSION['email'])) : ?>
            <li class="nav-item" id="login">
                <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            <li class="nav-item" id="signup">
                <a class="nav-link" href="Signup.php"><i class="bi bi-box-arrow-in-left"></i> SignUp</a>
            </li>
        <?php else : ?>

            <li class="nav-item dropdown" id="profile_pic">
                <a href="dashboard.php" class="profile-picture">
                    <img src="profile/<?php echo $email;?>.png" alt="Profile Picture" style="width:40px;height:40px;border-radius:50%;">
                </a>
                <div class="dropdown-content">
                    <!-- <a href="profile.php">Profile</a> -->
                    <!-- <a href="logout.php">Logout</a> -->
                </div>
            </li>
        <?php endif; ?>


    </ul>
</div>
</div>
</nav>
</div>
</header>
</div>
</div>