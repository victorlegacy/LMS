<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php
    include('config.php');
        $id = $_GET['id'];
        $sql = "DELETE FROM product WHERE id = '$id'";
        $run = mysqli_query($conn,$sql);
        if(isset($run)){
        ?>
        <body onload="toast()">
            
        <script>
            function toast(){
        Toastify({
            text: "Deleted from products",
            duration: 1000,
  
            newWindow: true,
            close: true,
            gravity: "bottom", 
            position: "center", 
            stopOnFocus: true, 
            style: {
            background: "#F76400",
            },
            onClick: function(){
                // window.location = 'cart.php';
            }   
            }).showToast();  
            setTimeout(function(){window.location = 'product.php'},1500)
            }
        </script> 
            <?php }
           
    ?>
      
      </body>