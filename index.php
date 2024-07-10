<?php 
  include('header.php');
  $sql = "SELECT * FROM product";
  $num_prod = mysqli_num_rows(mysqli_query($conn,$sql));
  $sql = "SELECT * FROM product WHERE expired = 1";
  $ex_num_prod = mysqli_num_rows(mysqli_query($conn,$sql));

  $g_num_prod = $num_prod - $ex_num_prod;
  $sql = "SELECT * FROM admin";
  $rn = mysqli_query($conn,$sql);
  $num_admin =  mysqli_num_rows($rn);

  $sql = "SELECT * FROM product WHERE expired = 0";
  $run = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($run,MYSQLI_ASSOC);
  $now = time();
  $ex_prods = array();
  foreach($prod as $pr){
    $id =  $pr['id'];   
  $stamp = $pr['stamp'];
  $days_gone = $now - $stamp;
  $days_gone = $days_gone/86400;
  $days = floor($days_gone);
  $inv = $pr['inv_days'];
  if($days >= $inv){
    $id =  $pr['id'];
    $qry = "UPDATE product SET expired = 1 WHERE id = '$id'";
    mysqli_query($conn,$qry);
  }
   $inv = $pr['inv_days'];
   $rem_days = $inv - $days;
    if($rem_days < 15){
      $sql = "SELECT * FROM product WHERE id = '$id'";
      $run = mysqli_query($conn,$sql);
      $prod = mysqli_fetch_all($run,MYSQLI_ASSOC);
      $name = $prod[0]['name'];
      $name = $name.' - '.$rem_days.'day(s) remaining ';
      array_push($ex_prods,$name);
    }
  }
  $exp = count($ex_prods);
  if($exp > 0){ 
      include('tip.php');
}
?>
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
              <h2  class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                 
                <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
                
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border ">
               
                   
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                              <div><i style="font-size: 40px;" class="text-light mdi mdi-format-list-bulleted-type icon-md"></i></div>
                            <hr>
                            <h4 class="mb-2 text-primary font-weight-bold">Total Products </h4>
                            <h2 class="mb-2 text-primary font-weight-bold"><?php echo $num_prod?> </h2>
                            <!-- <div><i style="font-size: 40px;" class="text-light mdi mdi-pill icon-md"></i></div>
                            <br> -->
                            <hr>
                            <p class="">Available Products in the inventory</p>
                            <a href="product.php" class="btn btn-dark ">
                              View More 
                            </a>
                            <!-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">5443</h3> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-check icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Fresh Products </h4>
                          <h2 class="mb-2 text-primary font-weight-bold"><?php echo $g_num_prod?></h2>
                          <!-- <div><i style="font-size: 40px;" class="text-light mdi mdi-pill icon-md"></i></div>
                          <br> -->
                          <hr>
                          <p class="">These are non-valid Products</p>
                          <a href="product.php" class="btn btn-dark ">
                            View Products
                          </a>
                          <!-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">5443</h3> -->
                        </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-window-close icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Expired Products </h4>
                          <h2 class="mb-2 text-primary font-weight-bold"><?php echo $ex_num_prod?></h2>
                          <!-- <div><i style="font-size: 40px;" class="text-light mdi mdi-pill icon-md"></i></div>
                          <br> -->
                          <hr>
                          <p class="">Products past their expiry date</p>
                          <a href="expired.php" class="btn btn-dark ">
                            View More 
                          </a>
                          <!-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">5443</h3> -->
                        </div>
                        </div>
                      </div>
                      <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-account icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Admin Users  </h4>
                          <h2 class="mb-2 text-primary font-weight-bold"><?php echo $num_admin?></h2>
                          <!-- <div><i style="font-size: 40px;" class="text-light mdi mdi-pill icon-md"></i></div>
                          <br> -->
                          <hr>
                          <p class="">Total number of Admin Users  </p>
                          <a href="logout.php" class="btn btn-dark ">
                            logout
                          </a>
                          <!-- <h3 class="mb-0 font-weight-bold mt-2 text-dark">5443</h3> -->
                        </div>
                        </div>
                      </div>
                    
                    </div>
              
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php 
        include('footer.php')
      ?>