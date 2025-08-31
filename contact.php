<?php include_once 'header.php'; ?>
<?php include_once 'navigation.php'; ?>



<div class="row">
    <div class="col-md-12">
        <div class="images_bg5 img-fluid">
            <img src="images/shape-5.png" alt="image" class="side_img">
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-md-12">
        <div class="images_bg2 img-fluid">
            <img src="images/shape-7.png" alt="image" class="side_img">
        </div>
    </div>
</div> -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="log_image">
                <img class="img-fluid" src="images/contact.png" alt="about">
            </div>
        </div>
        <div class="col-md-6 log_data">
            <div class="row">
                <div class="col-3"></div>

                <section class="contact">
                    <h2 class="contact">Contact us:</h2>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <h3> General Inquiries </h3>
                    <p>
                        Email: <a href="mailto:sms.edu@gmail.com" class="g_mail">sms.edu@gmail.com</a></p>
                    <p> Phone: +91 1234567890 </p>
                </div>

                <div class="col-md-6">
                    <h3> Technical Support </h3>
                    <p>
                        Email: <a href="sms@edu.com" class="g_mail">sms@edu.com</a></p>
                    <p>
                        Phone: +91 1234567890 </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h3> Feedback </h3>
                    <p>
                        Email: <a href="mailto:feedbacksms.edu.com" class="g_mail">feedbacksms.edu@gmail.com</a>
                    </p>
                    <p> Phone: +91 1234567890 </p>
                </div>
                <div class="col-md-6">
                    <h3> Address </h3>
                    <a> SMS Office,Near by Ls College,Muzaffarpur,842001 </a>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="container-fluid message">
    <div class="row">

        <div class="col-6 sign">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <section class="login">
                        <h2>Message</h2>
                        <form method="POST" action="index.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Name" required>

                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email ID" required>

                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" placeholder="Mobile No" required>

                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="You Message" id="exampleFormControlTextarea1" rows="3" required></textarea>

                            </div>

                            <div class="mb-3 style">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="log_image">
                <img class="img-fluid" src="images/message.svg" alt="message_img" width="80%">
            </div>
        </div>
    </div>
</div>




<?php include_once 'Footer.php'; ?>