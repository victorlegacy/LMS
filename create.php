<?php
  // include('config.php');
  // $sql = "INSERT INTO admin(username,email,level,password) VALUES('$username','$email','$level','$password')";
  // if(mysqli_query($conn,$sql)){

  // }
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                <img  src="assets/images/logo1-alt.png" alt="logo" /><br>
               <b>Inventory Management System</b> 
                </div>
      <hr>
                <h6 class="font-weight-light">Input Details to Create Account</h6>
                <p id="error" class=" bg-danger text-white"></p>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="username" required placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" required placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="tel" class="form-control form-control-lg" id="phone" required placeholder="Phone Number">
                  </div>
                  <div class="form-group">
                    <select class="form-control form-control-lg" required id="level">
                        <option style="color:grey">Select Business Type</option>
                      <option value="doctor">Pharmacueticals</option>
                      <option value="nurse">Fruits & Vegetables</option>
                      <option value="pharmacist">Meat & Fish </option>
                      <option value="consultant">Dairy Products</option>
                  
                    </select>
                  </div>
                  <div class="form-group" >
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Password">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input required type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <a onclick="create()" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
       
      </div>
   
    </div>
    
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
 
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    
  </body>
  <script>
    function create() {
      var username = document.getElementById("username").value;
      var email = document.getElementById("email").value;
      var phone = document.getElementById("phone").value;
      var level = document.getElementById("level").value;
      var pass = document.getElementById("password").value; 
    if (username == "") {
        document.getElementById("txtHint").innerHTML = "Please complete all fields";
        return;
    } else {
      
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {          
              var res = xmlhttp.responseText;
                if(res == 1){
                  setTimeout(function(){ window.location = 'create_ses.php?username='+username},3000)
                }else{
                  document.getElementById('error').innerHTML = 'Username or Email already used';
                }
               
            }
        };
        xmlhttp.open("GET","create_fun.php?username="+username+"&&email="+email+"&&phone="+phone+"&&level="+level+"&&password="+pass,true);
        xmlhttp.send();
    }
    Toastify({
      text: "Creating User...",
      duration: 2000,
      // destination: "https://github.com/apvarun/toastify-js",
      newWindow: true,
      close: true,
      gravity: "bottom", // `top` or `bottom`
      position: "center", // `left`, `center` or `right`
      stopOnFocus: true, // Prevents dismissing of toast on hover
      style: {
      background: "#F76400 ",
      },
      onClick: function(){
          // window.location = 'cart.php';
      } // Callback after click
      }).showToast();  
}

  </script>
</html>