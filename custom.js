$(document).ready(function () {
  $(".sub-btn").click(function () {
    $(this).next(".sub-menu").slideToggle();
  });

  //for admin

  $("#approved-teacher").click(function () {
    $("#loader").show();
    $(".admin_display_data").load("tcr_approved.php", function () {
      $("#loader").hide();
    });
  });
  $("#pending-teacher").click(function () {
    $("#loader").show();
    $(".admin_display_data").load("tcr_pending.php", function () {
      $("#loader").hide();
    });
  });
  $("#rejected-teacher").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("tcr_rejected.php", function () {
      $("#loader").hide();
    });
  });

  $("#a_approved_student").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("a_approved_stu.php", function () {
      $("#loader").hide();
    });
  });
  $("#a_pending_student").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("a_pending_stu.php", function () {
      $("#loader").hide();
    });
  });
  $("#a_rejected_student").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("a_rejected_stu.php", function () {
      $("#loader").hide();
    });
  });

  $("#view_assignment_admin").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("view_Ass.php", function () {
      $("#loader").hide();
    });
  });

  $("#upload_assignment_admin").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("upload_Ass.php", function () {
      $("#loader").hide();
    });
  });

  $("#view_notice").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("view_notice.php", function () {
      $("#loader").hide();
    });
  });
  $("#upload_notice").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("upload_notice.php", function () {
      $("#loader").hide();
    });
  });

  // for all user

  $("#view_profile").click(function () {
    $("#loader").show();

    $(".admin_display_data").load("profile.php", function () {
      $("#loader").hide();
    });
  });

  $("#update_profile_admin").click(function () {
    $("#loader").show();
    $(".admin_display_data").load("update_profile.php", function () {
      $("#loader").hide();
    });
  });
});

$("#change_pw").click(function () {
  $("#loader").show();

  $(".admin_display_data").load("change_pw.php", function () {
    $("#loader").hide();
  });
});
// for teacher

$("#t_approved_stu").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("t_approved_stu.php", function () {
    $("#loader").hide();
  });
});

$("#t_pending_stu").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("t_pending_stu.php", function () {
    $("#loader").hide();
  });
});
$("#t_rejected_stu").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("t_rejected_stu.php", function () {
    $("#loader").hide();
  });
});

$("#view_assignment_teacher").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("view_Ass.php", function () {
    $("#loader").hide();
  });
});
$("#upload_assignment_teacher").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("upload_Ass.php", function () {
    $("#loader").hide();
  });
});

$("#view_notice_teacher").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("view_notice.php", function () {
    $("#loader").hide();
  });
});
$("#upload_notice_teacher").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("upload_notice.php", function () {
    $("#loader").hide();
  });
});

$("#view_profile_teacher").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("profile_teacher.php", function () {
    $("#loader").hide();
  });
});
$("#update_profile_teacher").click(function () {
  $("#loader").show();

  $(".teacher_display_data").load("update_profile.php", function () {
    $("#loader").hide();
  });
  //change after created
});

//for student

$("#view_assignment_student").click(function () {
  $("#loader").show();

  $(".student_display_data").load("view_Ass.php", function () {
    $("#loader").hide();
  });
});
$("#upload_assignment_student").click(function () {
  $("#loader").show();

  $(".student_display_data").load("upload_Ass.php", function () {
    $("#loader").hide();
  });
});

$("#view_notice_student").click(function () {
  $("#loader").show();

  $(".student_display_data").load("view_notice.php", function () {
    $("#loader").hide();
  });
});

$("#view_profile_student").click(function () {
  $("#loader").show();

  $(".student_display_data").load("profile_student.php", function () {
    $("#loader").hide();
  });
});
$("#update_profile_student").click(function () {
  $("#loader").show();

  $(".student_display_data").load("update_profile.php", function () {
    $("#loader").hide();
  });
  //change after created
});
$("#update_profile_student").click(function () {
  $("#loader").show();

  $(".student_display_data").load("update_profile.php", function () {
    $("#loader").hide();
  });
  //change after created
});

// For conformation message to reject.
$(document).on("click", ".reg_btn .reject-link", function (e) {
  e.preventDefault();

  var rejectUrl = $(this).attr('href');

  Swal.fire({
    title: "Are you sure?",
    text: "Once you reject this user, you can also approve from rejected list!",
    icon: "question",

  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, Reject it!"

}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "Rejected!",
      text: "User has been rejected.",
      icon: "success"
    }).then(() => {
        window.location.href = rejectUrl; 
      });
   } else if (
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire({
      title: "Cancelled",
      text: "User is not rejected",
      icon: "error"
    });
  }
});
});
// For conformation message to approve.
$(document).on("click", ".a_pprove .approve-link", function (e) {
  e.preventDefault();
  var approveUrl = $(this).attr('href'); 

  Swal.fire({
    title: "Are you sure?",
    text: "Once you approve this user, you can also reject from approved list!",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Approve it!"
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Approved!",
        text: "User has been approved.",
        icon: "success"
      }).then(() => {
        window.location.href = approveUrl; 
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire({
        title: "Cancelled",
        text: "User is not approved.",
        icon: "error"
      });
    }
  });
});


// $(".sub-item").click(function(){
//   $(this).addClass("active");
// });
// });

//for change page url

// $(".admin_display_data").change(function () {
//   $.ajax({
//     url: "<?php echo sms.com/dashboard.php; ?>categories/brand/<?= $link_brand; ?>?l=<?= $l; ?>&h=<?= $h; ?>&city=<?= $city; ?>&city_name=<?= $city_name; ?>&ket=view",
//     type: "POST",
//     data: "admin_display_data=" + $(".admin_display_data").val(),
//     success: function (data) {
//       $("#result").html(data);
//       window.history.pushState(
//         "Details",
//         "Title",
//         "<?php echo sms.com/dashboard.php; ?>/tcr_approved.php"
//       );
//     },
//   });
// });

// $(".urut").change(function () {
//   $.ajax({
//     url: "<?php echo base_url(); ",
//     type: "POST",
//     data: "urut=" + $(".urut").val(),
//     success: function (data) {
//       $("#result").html(data);
//       window.history.pushState(
//         "Details",
//         "Title",
//         "<?php echo base_url(); ?>/yourNewPage"
//       );
//     },
//   });
// });

// send mail

$("#send_otp").click(function () {
  $("#loader").show();

  $(".verify_otp").load("otp.php", function () {
    $("#loader").hide();
  });
});
