<?php 
    include("../config.php");
    $email = '';
    $password = '';
    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($conn,$_POST['email']);
   
        $chk = "SELECT * FROM users WHERE email = '$email'";
        $chkrun = mysqli_query($conn,$chk);
        $num= mysqli_num_rows($chkrun);
        if($num > 0){
        $user = mysqli_fetch_all($chkrun,MYSQLI_ASSOC);
        $temp = rand(999999999,99999999999);
        $qry = "UPDATE users SET password = '$temp' WHERE email = '$email'";
        $run = mysqli_query($conn,$qry);

        $status = $user[0]['status'];
         $name = $user[0]['name'];
            if($status != 2){
            $now = date('d-m-y,h:i');
            $subject = "PASSWORD RESET";
            //             $cont = "
            // ";
                        $fr = "support@surf-chain.net";
                        $to = $email;
                        $from = $fr; 
                        $fromName = 'Surfchain'; 
$htmlContent = "Hi $name,
  \r\n
Your new password is: 
\r\n
$temp
\r\n
PASSWORD CAN BE UPDATED UNDER THE 'settings' TAB ON YOUR DASHBOARD.
 \r\n
 TimeStamp: $now.
    ";
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
            $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
            $mail=mail($to, $subject, $htmlContent, $headers); 

       ?>
       <script>
           alert('Password reset instructions has been sent to your mail');
       </script>
       <?php
       
    }else{
        $error = "YOUR ACCOUNT HAS BEEN SUSPENDED <br> contact support <a href='../support.php'>HERE</a>";
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


              <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="../index.php" class="">
                                <h5 class="text-primary text-white">
                                    <img src="../../img/logo.png" width="30px" alt="">
                                   Password Reset </h5>
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
                        
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Reset</button>
                         
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