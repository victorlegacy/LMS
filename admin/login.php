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
        background: #151722;
      }
      .auth-form-light{
        background: #2e2b37 !important;
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
                                <img src="assets/images/favicon-1.png" alt="logo" /><br><br>
                                <b>boost your learning experience</b>
                            </div>
                            <hr>
                            <h6 class="font-weight-light">Input Details to login as ADMIN</h6>
                            <p id="error" class="bg-danger text-white"></p>
                            <form id="signupForm" class="pt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="username" name="username" style="color:white" required placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" style="color:white" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="button" onclick="adminLog()" class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
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
    <script>
      function adminLog() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        
        if (username === "" || password === "") {
          document.getElementById("error").innerHTML = "Please complete all fields";
          return;
        }
        
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response == 1) {
              Toastify({
                text: "Admin Login successfully!",
                duration: 2000,
                newWindow: true,
                close: true,
                gravity: "bottom",
                position: "center",
                stopOnFocus: true,
                style: { background: "#AE07BD" },
              }).showToast();
              setTimeout(function() {
                window.location = 'index.php';
              }, 2000);
            } else {
              document.getElementById('error').innerHTML = 'ERROR';
            }
          }
        };
        xhr.open("POST", "login_fun.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));
        
      //   Toastify({
      //     text: "Creating Account...",
      //     duration: 2000,
      //     newWindow: true,
      //     close: true,
      //     gravity: "bottom",
      //     position: "center",
      //     stopOnFocus: true,
      //     style: { background: "#AE07BD" },
      //   }).showToast();
       }
    </script>
  </body>
</html>
