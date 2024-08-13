<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];
    include('config.php');
} else {
    header('Location: login.php');
    exit();
}

// Fetch user details
$sql = "SELECT * FROM admin WHERE username = '$username'";
$rn = mysqli_query($conn, $sql);

if (!$rn) {
    die("Query failed: " . mysqli_error($conn));
}

$user_details = mysqli_fetch_all($rn, MYSQLI_ASSOC);


//available COURSES
$sql = "SELECT * FROM courses WHERE level = '$level'";
$rn = mysqli_query($conn,$sql);
$numCourses = mysqli_num_rows($rn);
$courses = mysqli_fetch_all($rn,MYSQLI_ASSOC);

$sql = "SELECT * FROM student WHERE level = '$level'";
$rn = mysqli_query($conn,$sql);
$numStudent = mysqli_num_rows($rn);
$student = mysqli_fetch_all($rn,MYSQLI_ASSOC);



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
    padding-top: 20px !important;
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
            <i class="mdi mdi-calendar mr-1"></i><span id="currentTime"><?php echo date('F j, Y, g:i:s a') ?></span>
          </button>

          <script>
          function updateTime() {
              const now = new Date();
              const options = { 
                  year: 'numeric', 
                  month: 'long', 
                  day: 'numeric', 
                  hour: 'numeric', 
                  minute: 'numeric', 
                  second: 'numeric', 
                  hour12: true 
              };
              const formattedDate = now.toLocaleString('en-US', options);
              document.getElementById('currentTime').textContent = formattedDate;
          }

          // Update time immediately and then every 1 seconds
          updateTime();
          setInterval(updateTime, 1000);
          </script>
                   
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.php -->
        <nav class="sidebar sidebar-offcanvas sidebar-right" id="sidebar">
          <ul class="nav">
            <li class="nav-item " style="border-bottom: 2px solid grey;">
            <div class="mt-5" style="text-align: left;" >
                                    <img src="assets/images/<?php echo $level?>.png" style="border-radius: 50%;" width="100px" alt="Face 1">
                                    <br><br>
                                <span class="text-light"> <?php echo $username ?> </span>
                                <br>
                                <span class="">
                                  <?php ?>
                                </span>
                                <br>
                                </div>
                                
            </li>
          
            <br><br>
           
            <li class="nav-item" >
              <a class="nav-link" href="index.php">
                <span class="icon-bg"><i class="mdi mdi-home menu-icon" style="color:#AE07BD"></i></span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <?php //if ($role === 'Instructor' || $role === 'Admin') { ?>
              <!-- <li class="nav-item">
                <a class="nav-link" href="add_course.php">
                  <span class="icon-bg"><i class="mdi mdi-plus menu-icon" style="color:#AE07BD"></i></span>
                  <span class="menu-title">Add Course</span>
                </a>
              </li> -->
            <?php //} ?>
            <li class="nav-item">
              <a class="nav-link" href="addCourse.php">
                <span class="icon-bg"><i class="mdi mdi-plus menu-icon" style="color:#AE07BD"></i></span>
                <span class="menu-title">Add Courses</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="students.php">
                <span class="icon-bg"><i class="mdi mdi-account-circle menu-icon" style="color:#AE07BD"></i></span>
                <span class="menu-title">Students</span>
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
                      background: "#AE07BD",
                      },
                      onClick: function(){}
                      }).showToast();  
                       setTimeout(function(){window.location = 'login.php'},1500)
                  }
              };
              xmlhttp.open("GET","logout.php",true);
              xmlhttp.send();
          }

          function unarch(course){
              if (window.XMLHttpRequest) {
                  xmlhttp = new XMLHttpRequest();
              } else {
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                             
                      Toastify({
                      text: "Archiving...",
                      duration: 1000,
                      newWindow: true,
                      close: true,
                      gravity: "bottom",
                      position: "center",
                      stopOnFocus: true,
                      style: {
                      background: "#AE07BD",
                      },
                      onClick: function(){}
                      }).showToast();  
                       setTimeout(function(){window.location = 'coursesActive.php?id='+course},1500)
                  }
              };
              xmlhttp.open("GET","unArchFun.php?course="+course,true);
              xmlhttp.send();
          }
        </script>
