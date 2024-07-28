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
                <img src="assets/images/logo-full.png" alt="logo" />
                <br><br>
               <b>boost your learning experience</b> 
                </div>
      <hr>
                <h6 class="font-weight-light">Input Details to Continue</h6>
                <p id="error" class=" bg-danger text-white"></p>
                <form class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="username" placeholder="Username">
                  </div>
                   
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" placeholder="Password">
                  </div>
                  
                  <div class="mt-3">
                    <a onclick="login()" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">CONTINUE</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light">No account yet? <a href="create.php" class="text-primary">Create one</a>
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
    function login() {
      var username = document.getElementById("username").value;
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
                setTimeout(function(){window.location = 'create_ses.php?username='+username},3000)
                }else if(res == 2){
                  document.getElementById('error').innerHTML = 'Password is incorrect';
                }else{
                  document.getElementById('error').innerHTML = 'Account not found';
                }
            }
        };
        xmlhttp.open("GET","login_fun.php?username="+username+"&&password="+pass,true);
        xmlhttp.send();
    }
    Toastify({
      text: "Confirming...",
      duration: 2000,
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
}

  </script>
  </body>
</html>