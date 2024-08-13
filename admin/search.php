<?php 
  include('header.php');
   $term = $_GET['term'];
  $sql = "SELECT * FROM product WHERE name LIKE '%$term%'";
  $run = mysqli_query($conn,$sql);
  if(mysqli_num_rows($run) > 0){
     $product = mysqli_fetch_all($run,MYSQLI_ASSOC);
  }else{
    $none = 0;
  }
?>
<style>
  .w3-modal-content{
    width: 30% !important;
    border-radius: 10px;
  }
  .ex{
    border-radius: 3px;
  }
</style>
     <link rel="stylesheet" href="assets/css/w3.css">
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="d-xl-flex justify-content-between align-items-start">
            
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                 
                <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
                
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border ">
               
                   
                </div>
                <div class="row">
                  <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Showing search results for: <span class="text-primary"><?php echo $term ?></span></h4>
                         
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th> ID </th>
                                <th> Product Name </th>
                                <th> Prodcut  Category </th>
                                
                                <th> Price </th>
                                <th>Upload Date</th>
                                <th> Check Expiry</th>
                                <th> Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                              <?php
                              if(!isset($none)){
                                foreach($product as $prod){
                                   $id = $prod['id'];
                              ?>
                              <tr>
                                <td class="py-1">
                                  <img src="product/<?php echo $prod['id']?>.jpg" alt="image" />
                                </td>
                                <td> <?php echo $prod['name']?> </td>
                                <td>
                                  <!-- <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div> -->
                                  <b><?php echo $prod['category']?></b>
                                </td>
                                <td> ₦ <?php echo $prod['price']?> </td>
                                <td> <?php 
                                  $stamp = $prod['stamp'];
                                  date_default_timezone_set('Africa/Lagos');
                                $day = date('F j, Y',$stamp);
                                echo $day;
                                ?> </td>
                                <td>
                                  
                                  <?php 
                                  $stamp = $prod['stamp'];
                                  $now = time();
                                  $days_gone = $now - $stamp;
                                  date('d',$days_gone);
                                  $days_int = intval(date('d',$days_gone));
                                  $days = $days_int - 1;

                                  ?>
                                  <div id="show<?php echo $id?>" class="w3-modal">
                                    <div class="w3-modal-content w3-card-4 w3-animate-top">
                                      <div class="w3-container text-center">
                                        <span onclick="document.getElementById('show<?php echo $id?>').style.display='none'"
                                        class="w3-button w3-display-topright">&times;</span>
                                        <br><br>
                                        <p>This product will expire in</p>
                                        <h1 class="text-primary text-bold"><?php echo  $exp= $prod['inv_days'] - $days?></h1>
                                        <p>Days</p>
                                      </div>
                                    </div>
                                  </div>
                                  <?php if($exp > 1){?>
                                  <a onclick="document.getElementById('show<?php echo $id?>').style.display='block'" class="btn btn-primary">Check</a>
                                  <?php }else{?>
                                      <label for="" class="bg-danger p-1 ex text-white">Expired</label>
                                    <?php } ?>
                                </td>
                                <td>
                                  <a href="delete.php?id=<?php echo $id ?>" class="btn bg-white text-danger">Delete</a>
                                </td>
                              </tr>
                              <?php }?>
                              <?php }else{?>
                        <tr>
                        <td colspan="7" class=" text-center">No Records Found</td>
                            <?php } ?>
                            </tr>        
                            </tbody>
                                
                          </table>
                          <br>
                        <a href="index.php" class="btn btn-primary">End Search</a>
                        </div>
                      </div>
                  </div>
                  </div>

              </div>
            </div>
          </div>
          <?php 
  include('footer.php');
?>