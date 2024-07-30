<?php 
    include("../config.php");
    $email = '';
    $password = '';
    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $chk = "SELECT * FROM users WHERE email = '$email'";
        $chkrun = mysqli_query($conn,$chk);
        $num= mysqli_num_rows($chkrun);
        if($num > 0){
        $user = mysqli_fetch_all($chkrun,MYSQLI_ASSOC);
        $pass = $user[0]['password'];
        $id = $user[0]['id'];
        $status = $user[0]['status'];
        if($pass == $password){
            if($status != 2){
            session_start();
            $_SESSION['id'] = $id;         
            $now = date('d-m-y,h:i');
            $subject = "LOGIN ALERT";
            //             $cont = "
            // ";
                        $fr = "support@surf-chain.net";
                        $to = $email;
                        $from = $fr; 
                        $fromName = 'Surfchain'; 
                        $htmlContent = " 
                <body style='text-align:left;background:#fafafa;font-family:arial;border-radius:5px;font-size:15px'> 
               
                   <div class='card z-depth-2' style='text-align:left;padding:10%;width:50%;margin:auto;border-radius:3px;background:white;'>
                   <br>
                   <img src='https://surfchain.net/img/logo.png' width='20%'> <h4 style='color:#3c9cf4'> SURFCHAIN</h4>
                   <br>
                
                   <div>
             Hi there,
             <br>
          Your account was just accessed.
            <br>
            <hr>
            <label>Login details:</label>
            <br>
           TIME: <b style='color:#3c9cf4'>$now</b><br>
 
            <br><hr>
           <p> Not you?<p> <br>
            <a style='background:#AA4A44;padding:10px;border-radius:4px;color:white' href='https://api.whatsapp.com/send?phone=YOUR_PHONE_NUMBER'>Report </a>
                </div>
                  <br>
                  <p></p>
                       </div> 
                       <br><br>
                </body>
            ";
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
            $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
            $mail=mail($to, $subject, $htmlContent, $headers);

            header('Location:index.php');
       
    }else{
        $error = "YOUR ACCOUNT HAS BEEN SUSPENDED <br> contact support <a href='../support.php'>HERE</a>";
    }
}else{
            $error = "PASSWORD IS INCORRECT";
    }
}else{

    $error = "EMAIL NOT FOUND <br> SWITCH TO SIGNUP <a href='signup.php'>HERE</a>";
}
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Surfchain - SignIn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="libs/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="libs/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="csss/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="csss/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="../index.php" class="">
                                <h5 class="text-primary text-white">
                                    <img src="../../img/logo.png" width="30px" alt="">
                                   Signin </h5>
                            </a>
                            <!-- <h5>Login</h5> -->
                        </div>
                        <?php 
                          if(isset($error)){
                            ?>
                        <div class="bg-danger text-white rounded-1 p-2">
                                <?php 
                              
                                    echo  $error;
                              ?>
                            </div>
                            <?php 
                        }
                        ?>
                        <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            <div class="mb-4">
                        <input type="checkbox" id="showPasswordCheckbox">
                            <label for="showPasswordCheckbox">Show/Hide password</label>
                        </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">No account yet? <a href="signup.php">Sign Up</a></p>
                        <br>
                        <a href="phrase-signin.php" class="btn btn-success py-3 w-100 mb-4">Login Using 12-phrase </a>
                        <div class="text-center">
                        <!-- <a href="">Forgot Password</a> -->
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
<script>
        const passwordInput = document.getElementById('floatingPassword');
  const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

  showPasswordCheckbox.addEventListener('change', function() {
    if (this.checked) {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });
</script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="libs/chart/chart.min.js"></script>
    <script src="libs/easing/easing.min.js"></script>
    <script src="libs/waypoints/waypoints.min.js"></script>
    <script src="libs/owlcarousel/owl.carousel.min.js"></script>
    <script src="libs/tempusdominus/js/moment.min.js"></script>
    <script src="libs/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="libs/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="jss/main.js"></script>
</body>

</html>