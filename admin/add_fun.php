<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php
    include('config.php');
    if(isset($_POST['submit'])){
        $code = $_POST['code'];
        $name = $_POST['name'];
        $descrip = $_POST['descrip'];
        $level = $_POST['level'];
        $sql = "INSERT INTO courses(courseName,courseCode,courseDesc,level) VALUES('$name','$code','$descrip','$level')";
        mysqli_query($conn,$sql);
        $id = mysqli_insert_id($conn);
        $img_name = $_FILES['pic']['name'];
        $img_size = $_FILES['pic']['size'];
        $temp_name = $_FILES['pic']['tmp_name'];
        $error = $_FILES['pic']['error'];
        if($error == 0){
        if ($img_size>3000000000000000) {
            $error = "File is larger than 3mb, please use another picture";
        }else{
        $img_ex_lc = 'pdf';
        echo "<br />";
        $img_upload_path= "../courses/$code.pdf";
        $run = move_uploaded_file($temp_name, $img_upload_path);
            if(isset($run)){
        ?>
        <script>
        Toastify({
            text: "Added to Courses",
            duration: 1000,
            // destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
            background: "#AE07BD",
            },
            onClick: function(){
                // window.location = 'cart.php';
            } // Callback after click
            }).showToast();  
            setTimeout(function(){window.location = 'addCourse.php'},1200)
        </script> 
            <?php }
            }
        }
        
    }
    ?>
      