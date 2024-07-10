<?php
  session_start();
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    include('config.php');
  }else{
    header('Location:login.php');
  }
  $sql = "SELECT * FROM admin WHERE username = '$user'";
  $rn = mysqli_query($conn,$sql);
  $admin = mysqli_fetch_all($rn,MYSQLI_ASSOC);
  $phone = $admin[0]['phone'];
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ProStore Inventory</title>
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
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo px-4" style="text-align:left" href="index.php">
            <img src="assets/images/logo-dark.png" style="width: 150px !important;height:20px" alt="logo" />
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
            <button class="btn bg-white  p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-calendar mr-1"></i><?php echo date('F j, Y, g:i a') ?> </button>
                   
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline" ></i>
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
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
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
            <br><br>
            
          <li class="nav-item">
              <a class="nav-link">
                <span class="icon-bg"><i class="mdi mdi-account"></i></span>
                <span class="menu-title">Welcome, <?php echo $user ?></span>
              </a>
            </li>
            
            <!-- <li class="nav-item nav-category">Main</li> -->
            <hr style="color: grey;">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon" style="color:#F76400"></i></span>
                <span class="menu-title">Home</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add.php">
                <span class="icon-bg"><i class="mdi mdi-plus menu-icon" style="color:#F76400"></i></span>
                <span class="menu-title">Add Product</span>
              </a>
            </li>
  
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-format-list-bulleted-type menu-icon" style="color:#F76400"></i></span>
                <span class="menu-title">View Products</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="product.php">All Products </a></li>
                  <li class="nav-item"> <a class="nav-link" href="expired.php">Expired Products</a></li>
                </ul>
              </div>
            </li>
           
            <li class="nav-item documentation-link">
              <a class="nav-link" onclick="logout()">
                <span class="icon-bg">
                  <i class="mdi mdi-lock menu-icon"></i>
                </span>
                <span class="menu-title">Logout</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create.php" >
                  <span class="icon-bg"><i class="mdi mdi-account-plus"></i></span>
                  <span class="menu-title">Create an account </span>
                  
                </a>
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
                      // destination: "https://github.com/apvarun/toastify-js",
                      newWindow: true,
                      close: true,
                      gravity: "bottom", // `top` or `bottom`
                      position: "center", // `left`, `center` or `right`
                      stopOnFocus: true, // Prevents dismissing of toast on hover
                      style: {
                      background: "#F76400",
                      },
                      onClick: function(){
                          // window.location = 'cart.php';
                      } // Callback after click
                      }).showToast();  
                       setTimeout(function(){window.location = 'login.php'},1500)
                  }
              };
              xmlhttp.open("GET","logout.php",true);
              xmlhttp.send();
          }
        </script>
