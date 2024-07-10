<?php 
  include('header.php');
  $sql = "SELECT * FROM product WHERE expired = 1";
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
          <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                <form class="d-flex align-items-center h-100" action="search.php" method="GET">
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                      </div>
                      <input type="text" name="term" class="form-control bg-transparent border-0" placeholder="Search products">
                      <div class="input-group-append bg-transparent">
                        <button type="submit" name="submit" class="btn btn-primary">GO</button>
                      </div>
                    </div>
                  </form>
                </span>
              </div>
            </div>
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
                          <h4 class="card-title">Expired products</h4>
                         
                          <table class="table table-striped">
                            <thead>
                              <tr>
                              <tr>
                                <th> Image </th>
                                <th> Product Name </th>
                                <th> Prodcut  Category </th>
                                
                                <th> Price </th>
                                <th>Upload Date</th>
                                <th> Date of Expiry</th>
                                <th> Delete</th>
                              </tr>
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
                                <td><?php 
                                $u_date = strtotime($prod['date_c']);
                               echo  date('F j, Y',$u_date)?></td>
                                <td> <?php 
                                $inv = $prod['inv_days'];
                                echo date ( 'F j, Y' , strtotime ( $prod['date_c'] . " + $inv days" ));
                                ?> </td>
                                <td>
                                  <a href="ex_delete.php?id=<?php echo $id ?>" class="btn bg-white text-danger">Delete</a>
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