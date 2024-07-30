<?php
session_start();
if (isset($_SESSION['studID'])) {
    $id = $_SESSION['id'];
    $studID = $_SESSION['studID'];
    $fName = $_SESSION['firstName'];
    $lName = $_SESSION['lastName'];
    $email = $_SESSION['email'];
    $matric = $_SESSION['matric'];
    include('config.php');
} else {
    header('Location: login.php');
    exit();
}

// Fetch user details
$sql = "SELECT * FROM student WHERE studID = '$studID'";
$rn = mysqli_query($conn, $sql);

if (!$rn) {
    die("Query failed: " . mysqli_error($conn));
}

$user_details = mysqli_fetch_all($rn, MYSQLI_ASSOC);

if (empty($user_details)) {
  header('Location: login.php');
}

$role = $user_details[0]['role'];
$full_name = $user_details[0]['firstName'] . ' ' . $user_details[0]['lastName'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EDT-LMS Dashboard</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <style>
      input::placeholder{
        color:grey !important;
      }
      .navbar.fixed-top + .page-body-wrapper {
    padding-top: 0px !important;
}
.icon-bg{
  background-color: white !important;
  
}
.menu-title{
  color:#f0f1f6 !important;
}
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo px-4" style="text-align:left" href="index.php">
            <img src="assets/images/logo-dark.png" style="width: 150px !important;height:40px" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="assets/images/favicon.png" alt="logo" />
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <button class="btn bg-white p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-calendar mr-1"></i><?php echo date('F j, Y, g:i a') ?>
            </button>
                   
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Upcoming Assignment</h6>
                    <p class="text-gray ellipsis mb-0"> ED 215 have been added to your courses by your  </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item " style="border-bottom: 2px solid grey;">
            <div class="mt-5" style="text-align: left;" >
                                    <img src="assets/images/faces/1.jpg" style="border:#AE07BD solid 2px;border-radius: 50%;" width="100px" alt="Face 1">
                                    <br><br>
                                <span class="text-light"> Welcome, <?php echo $fName ?> </span>
                                <br>
                                <span class="">
                                  <?php ?>
                                </span>
                                <br>
                                </div>
                                
            </li>
          
            <br><br>
            <!-- <li class="nav-item" style="border-top: 2px solid white;padding-top:10px">
              <a class="nav-link">
                <span class="icon-bg" style="color:#AE07BD"><i class="mdi mdi-account"></i></span>
                <span class="menu-title" style="color:white">Welcome, <?php echo $fName ?></span>
              </a>
            </li> -->
            <li class="nav-item" >
              <a class="nav-link" href="index.php">
                <span class="icon-bg"><i class="mdi mdi-home menu-icon" style="color:#AE07BD"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <?php if ($role === 'Instructor' || $role === 'Admin') { ?>
              <li class="nav-item">
                <a class="nav-link" href="add_course.php">
                  <span class="icon-bg"><i class="mdi mdi-plus menu-icon" style="color:#AE07BD"></i></span>
                  <span class="menu-title">Add Course</span>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#course-view" aria-expanded="false" aria-controls="course-view">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted-type menu-icon" style="color:#AE07BD"></i></span>
                <span class="menu-title">Courses</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="course-view">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="coursesActive.php">Active Courses</a></li>
                <li class="nav-item"> <a class="nav-link" href="coursesAvailable.php">Available Courses</a></li>
                <li class="nav-item"> <a class="nav-link" href="coursesArchived.php">Archived Courses</a></li>
                

                  <li class="nav-item"> <a class="nav-link" href="view_courses.php">Completed Courses</a></li>
                  
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <span class="icon-bg"><i class="mdi mdi-account-circle menu-icon" style="color:#AE07BD"></i></span>
                <span class="menu-title">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="logout()">
                <span class="icon-bg">
                  <i class="mdi mdi-lock menu-icon" style="color:#AE07BD"></i>
                </span>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <script>
          function logout(){
              if (window.XMLHttpRequest) {
                  xmlhttp = new XMLHttpRequest();
              } else {
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                             
                      Toastify({
                      text: "Logging Out...",
                      duration: 1000,
                      newWindow: true,
                      close: true,
                      gravity: "bottom",
                      position: "center",
                      stopOnFocus: true,
                      style: {
                      background: "#F76400",
                      },
                      onClick: function(){}
                      }).showToast();  
                       setTimeout(function(){window.location = 'login.php'},1500)
                  }
              };
              xmlhttp.open("GET","logout.php",true);
              xmlhttp.send();
          }
        </script>
