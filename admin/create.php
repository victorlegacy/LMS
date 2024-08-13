<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LMS Sign Up</title>
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
      input::placeholder {
        color: grey !important; 
      }
      .content-wrapper{
        background-color: #10001F !important;
      }
    </style>
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-6 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="assets/images/logo-full.png" alt="logo" /><br><br>
                                <b>boost your learning experience</b>
                            </div>
                            <hr>
                            <h6 class="font-weight-light">Input Details to Create Account</h6>
                            <p id="error" class="bg-danger text-white"></p>
                            <form id="signupForm" class="pt-3">
                              <div class="row">
                                <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="firstname" name="firstname" required placeholder="First Name">
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="lastname" name="lastname" required placeholder="Last Name">
                                </div>
                                </div>
                              </div>
                               <div class="row">
                                <div class="col-6">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" required placeholder="Student Email">
                                </div>
                                </div>
                                <div class="col-6">
                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-lg" id="matricno" name="matricno" required placeholder="Matric Number">
                                </div>
                                </div>
                               </div>
                               <div class="row">
                               <div class="col-6">
                               <div class="form-group">
                                    <input type="text"  class="form-control form-control-lg" id="studID"  name="studID" required placeholder="Student ID">
                                </div>
                               </div>
                               <div class="col-6">
                               <div class="form-group">
                                    <input type="number" step="100" class="form-control form-control-lg" id="level" max="500" min="100" name="level" required placeholder="Level">
                                </div>
                               </div>
                             
                               </div>
                                
                               
                               
                                
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="button" onclick="create()" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a></div>
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
    <script>
      function create() {
        var fname = document.getElementById("firstname").value;
        var lname = document.getElementById("lastname").value;
        var email = document.getElementById("email").value;
        var matric = document.getElementById("matricno").value;
        var stud = document.getElementById("studID").value;
        var level = document.getElementById("level").value;
        var password = document.getElementById("password").value;
        
        if (fname === "" || lname === "" || email === "" || matric === "" || stud === "" || password === ""|| level === "") {
          document.getElementById("error").innerHTML = " Please complete all fields";
          return;
        }
        
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == 1) {
              Toastify({
                text: "Account created successfully!",
                duration: 2000,
                newWindow: true,
                close: true,
                gravity: "bottom",
                position: "center",
                stopOnFocus: true,
                style: { background: "#4caf50" },
              }).showToast();
              setTimeout(function() {
                window.location = 'login.php';
              }, 2000);
            } else {
              document.getElementById('error').innerHTML = 'Username or Email already used';
            }
          }
        };
        xhr.open("POST", "create_fun.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("fname=" + encodeURIComponent(fname) + "&lname=" + encodeURIComponent(lname) + "&email=" + encodeURIComponent(email) + "&matric=" + encodeURIComponent(matric) + "&stud=" + encodeURIComponent(stud) + "&level=" + encodeURIComponent(level) + "&password=" + encodeURIComponent(password));
        
        Toastify({
          text: "Creating Account...",
          duration: 2000,
          newWindow: true,
          close: true,
          gravity: "bottom",
          position: "center",
          stopOnFocus: true,
          style: { background: "#AE07BD" },
        }).showToast();
      }
    </script>
  </body>
</html>
