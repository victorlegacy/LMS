<?php 
  include('header.php');
  $sql = "SELECT * FROM courses";
  $num_courses = mysqli_num_rows(mysqli_query($conn,$sql));
  $sql = "SELECT * FROM courses WHERE status = 'Archived'";
  $archived_courses = mysqli_num_rows(mysqli_query($conn,$sql));

  $active_courses = $num_courses - $archived_courses;
  $sql = "SELECT * FROM users WHERE role = 'Instructor'";
  $num_instructors = mysqli_num_rows(mysqli_query($conn,$sql));

  $sql = "SELECT * FROM courses WHERE status = 'Active'";
  $run = mysqli_query($conn,$sql);
  $courses = mysqli_fetch_all($run,MYSQLI_ASSOC);
  $now = time();
  $expiring_courses = array();
  foreach($courses as $course){
    $id =  $course['id'];   
    $start_date = $course['start_date'];
    $days_since_start = $now - strtotime($start_date);
    $days_since_start = $days_since_start/86400;
    $days = floor($days_since_start);
    $duration = $course['duration_days'];
    if($days >= $duration){
      $id =  $course['id'];
      $qry = "UPDATE courses SET status = 'Archived' WHERE id = '$id'";
      mysqli_query($conn,$qry);
    }
    $rem_days = $duration - $days;
    if($rem_days < 15){
      $sql = "SELECT * FROM courses WHERE id = '$id'";
      $run = mysqli_query($conn,$sql);
      $course = mysqli_fetch_all($run,MYSQLI_ASSOC);
      $name = $course[0]['name'];
      $name = $name.' - '.$rem_days.' day(s) remaining';
      array_push($expiring_courses, $name);
    }
  }
  $exp = count($expiring_courses);
  if($exp > 0){ 
      include('notification.php');
  }
?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
                <span class="d-flex align-items-center search-popup">
                  <form class="d-flex align-items-center h-100" action="search.php" method="GET">
                    <div class="input-group">
                      <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                      </div>
                      <input type="text" name="term" class="form-control bg-transparent border-0" placeholder="Search courses">
                      <div class="input-group-append bg-transparent">
                        <button type="submit" name="submit" class="btn btn-primary">Search</button>
                      </div>
                    </div>
                  </form>
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
                            <h4 class="mb-2 text-primary font-weight-bold">Total Courses</h4>
                            <h2 class="mb-2 text-primary font-weight-bold"><?php echo $num_courses?> </h2>
                            <hr>
                            <p class="">Courses available in the system</p>
                            <a href="courses.php" class="btn btn-dark">
                              View More 
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-check icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Active Courses</h4>
                          <h2 class="mb-2 text-primary font-weight-bold"><?php echo $active_courses?></h2>
                          <hr>
                          <p class="">Currently active courses</p>
                          <a href="active_courses.php" class="btn btn-dark">
                            View Courses
                          </a>
                        </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-window-close icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Archived Courses</h4>
                          <h2 class="mb-2 text-primary font-weight-bold"><?php echo $archived_courses?></h2>
                          <hr>
                          <p class="">Courses that have ended</p>
                          <a href="archived_courses.php" class="btn btn-dark">
                            View More 
                          </a>
                        </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <div><i style="font-size: 40px;" class="text-light mdi mdi-account icon-md"></i></div>
                          <hr>
                          <h4 class="mb-2 text-primary font-weight-bold">Instructors</h4>
                          <h2 class="mb-2 text-primary font-weight-bold"><?php echo $num_instructors?></h2>
                          <hr>
                          <p class="">Total number of instructors</p>
                          <a href="instructors.php" class="btn btn-dark">
                            View Instructors
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
