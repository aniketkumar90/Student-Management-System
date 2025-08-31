<?php include_once 'header.php'; ?>
<?php include_once 'navigation.php'; ?>

<div class="row">
  <div class="col-md-12">
    <div class="images_bg img-fluid">
      <img src="images/hero-bg.png" alt="image">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md containt">
    <p>Welcome To <br><span>Student</span> <br>Management System</p>
  </div>
  <div class="col-md">
    <img class="img-fluid Image_img2" src="images/img33.jpg " alt="Image">
  </div>
</div>
</div>
<div>

  <div class="container text-center">
    <div class="row">
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img src="images/1 (1).png" class="card-img-top" alt="Marks">
          <div class="card-body">
            <p class="card-text">Student Corner</p>
            <div class="btn btn-primary" data-bs-target="#student_corner" data-bs-toggle="modal">Click Here</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img src="images/1 (2).png" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">Teacher Corner</p>
            <div class="btn btn-primary" data-bs-target="#Teacher_corner" data-bs-toggle="modal">Click Here</div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
          <img src="images/1 (3).png" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">Student Marks Management</p>
            <div class="btn btn-primary" data-bs-target="#marks_management" data-bs-toggle="modal">Click Here</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- Modal  Student Corner-->
<div class="modal fade" id="student_corner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Student Corner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>"Student Corner" often refers to a designated space or platform dedicated to students within educational institutions, online communities, or events. It serves as a hub for learning, interaction, and personal development.</p> <br>
        <p>1. Interactive Learning. </p>
        <p>2. Academic Support guides. </p>
        <p>3. Peer Networking</p>
        <p>4. Career Development.</p>
        <p>5. Events and Workshops</p>
        <p>6. Notice & Many More...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary modal_log"><a href="login.php">Login</a></button>
      </div>
    </div>
  </div>
</div>


<!-- Modal  Teacher Corner-->
<div class="modal fade" id="Teacher_corner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher Corner</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>"A "Teacher Corner" serves as a dedicated space or platform for educators, designed to foster professional growth, collaboration, and resource sharing. It plays a crucial role in supporting teachers' professional development and enhancing their classroom practices. Here's an overview of what a Teacher Corner encompasses.</p> <br>
        <p>1. Professional Development </p>
        <p>2. Resource Sharing </p>
        <p>3. Peer Collaboration</p>
        <p>4. Teaching Tools and Technology</p>
        <p>5. Classroom Management Strategies</p>
        <p>6. Access Notice & Many More...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary modal_log"><a href="login.php">Login</a></button>
      </div>
    </div>
  </div>
</div>


<!-- Modal  Marks Management-->
<div class="modal fade" id="marks_management" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Student Marks Management</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="images/soon.gif" alt="" style="width:400px;height:auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary modal_log"><a href="login.php">Login</a></button> -->
      </div>
    </div>
  </div>
</div>
<?php include_once 'Footer.php'; ?>