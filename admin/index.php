<?php 
  include('header.php');

   
?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-8">
              </div>
    
            </div><br><br>
            <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Overview Dashboard </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
                <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex justify-content-between align-items-center transparent-tab-border">
                </div>
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="dashboard-1" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                              <div><i style="font-size: 40px;" class="text-light mdi mdi-format-list-bulleted-type icon-md"></i></div>
                            <hr>
                            <h4 class="mb-2 text-primary font-weight-bold"><?php echo $level ?>lvl Courses</h4>
                            <h2 class="mb-2 text-secondary font-weight-bold"><?php echo $numCourses ?> </h2>
                            <hr>
                            <p class=""></p>
                            <a href="coursesActive.php" class="btn btn-dark">
                              VIEW COURSES 
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-check icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold"><?php echo $level ?>lvl Students</h4>
                          <h2 class="mb-2 text-secondary font-weight-bold"><?php echo $numStudent?></h2>
                          <hr>
           
                          <a href="coursesAvailable.php" class="btn btn-dark">
                          VIEW STUDENTS
                          </a>
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
