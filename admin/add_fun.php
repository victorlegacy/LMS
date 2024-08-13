<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
	  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php
    include('config.php');
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $cat = $_POST['cat'];
        $days = $_POST['days'];
        $price = $_POST['price'];
        $timestamp = time();
        $sql = "INSERT INTO product(name,category,price,inv_days,rem_days,stamp) VALUES('$name','$cat','$price','$days','$days','$timestamp')";
        mysqli_query($conn,$sql);
        $id = mysqli_insert_id($conn);
        $img_name = $_FILES['pic']['name'];
        $img_size = $_FILES['pic']['size'];
        $temp_name = $_FILES['pic']['tmp_name'];
        $error = $_FILES['pic']['error'];
        if($error == 0){
        if ($img_size>300000000000) {
            $error = "Picture is larger than 3mb, please use another picture";
        }else{
        $img_ex_lc = 'jpg';
        echo "<br />";
        $img_upload_path= "product/$id.jpg";
        $run = move_uploaded_file($temp_name, $img_upload_path);
            if(isset($run)){
        ?>
        <script>
        Toastify({
            text: "Added to products",
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
            setTimeout(function(){window.location = 'add.php'},1200)
        </script> 
            <?php }
            }
        }
        
    }
    ?>
      