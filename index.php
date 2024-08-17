<?php 
  include('header.php');

   
?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-8">
              </div>
              <div class="col-4">
                <span class="d-flex align-items-center search-popup">
                  <!-- <form class="d-flex align-items-center h-100" action="search.php" method="GET">
                    <div class="input-group">
                      <div class="input-group-prepend bg-white">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                      </div>
                      <input type="text" name="term" class="form-control bg-white border-0" placeholder="Search courses">
                      <div class="input-group-append bg-white">
                        <button type="submit" name="submit" class="btn btn-primary">Search</button>
                      </div>
                    </div>
                  </form> -->
                </span>
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
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                              <div><i style="font-size: 40px;" class="text-light mdi mdi-format-list-bulleted-type icon-md"></i></div>
                            <hr>
                            <h4 class="mb-2 text-primary font-weight-bold">Your Active Courses</h4>
                            <h2 class="mb-2 text-secondary font-weight-bold"><?php echo $numActiveCourses ?> </h2>
                            <hr>
                            <p class=""> Courses you have started</p>
                            <a href="coursesActive.php" class="btn btn-dark">
                              VIEW COURSES 
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-check icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Your Available Courses</h4>
                          <h2 class="mb-2 text-secondary font-weight-bold"><?php echo $numCourses?></h2>
                          <hr>
                          <p class=""> Courses ready to be started </p>
                          <a href="coursesAvailable.php" class="btn btn-dark">
                          VIEW COURSES
                          </a>
                        </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-window-close icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Your Archived Courses</h4>
                          <h2 class="mb-2 text-secondary font-weight-bold"><?php echo $numArchiveCourses?></h2>
                          <hr>
                          <p class="">Courses that are placed on hold</p>
                          <a href="coursesArchived.php" class="btn btn-dark">
                          VIEW COURSES
                          </a>
                        </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-check icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Your Completed Courses</h4>
                          <h2 class="mb-2 text-secondary font-weight-bold"><?php echo $numCompleteCourses ?></h2>
                          <hr>
                          <p class="">Courses you completed successfully</p>
                          <a href="coursesCompleted.php" class="btn btn-dark">
                          VIEW COURSES
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
