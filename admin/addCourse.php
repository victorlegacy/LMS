<?php 
        include('header.php')
      ?>
     
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center purchase-popup">
                  <h2  class="text-primary font-weight-bold mb-2">
                    <i class="mdi mdi-plus text-primary menu-icon"></i> Add New Course </h2>
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
                  <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
<!--                        
                        <p class="card-description"> Product Name</p> -->
                        <form class="forms-sample" action="add_fun.php" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="name">Course Code</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="ex. EDT 121">
                          </div>
                          <div class="form-group">
                            <label for="name">Course Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder=" ">
                          </div>
 
                          <div class="form-group">
                          <label for="exampleInputshelf">Inventory Days </label>
                            <input type="range" step="1" name="days" id="rangeInput" value="1" max="30" class="form-control">
                            <p id="rangeValue"></p>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Product Price</label>
                            <input type="number" name="price" class="form-control" id="price" min="0" placeholder="">
                           
                          </div>
                          <div class="form-group">
                            <label for="file">Product Image</label>
                            <input type="file" name="pic" class="form-control" id="file">
                          </div>
                          
                          <button type="submit" name="submit" class="w-100 btn btn-large btn-primary mr-2 ">Add Product</button>
                        
                        </form>
                      </div>
                    </div>
                  </div>
                  </div>

              </div>
            </div>
          </div>
          <script>
              var rangeInput = document.getElementById('rangeInput');
              var rangeValueParagraph = document.getElementById('rangeValue');

              
              function updateRangeValue() {
                  rangeValueParagraph.textContent =  rangeInput.value + ' Day(s)' ;
              }

               
              rangeInput.addEventListener('input', updateRangeValue);

               
              updateRangeValue();
          </script>
          <?php 
        include('footer.php')
      ?>