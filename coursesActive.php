<?php 
include('header.php')
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
              <h2 class="text-dark font-weight-bold mb-2"><i style="font-size: 20px;" class="text-secondary mdi mdi-book-open-variant icon-md"></i> ACTIVE COURSES </h2>
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
                    <?php foreach($Activecourses as $course){
                         $idd = $course['course'];
                        $sql = "SELECT * FROM courses WHERE id = '$idd'";
                        $rn = mysqli_query($conn,$sql);
                        $course = mysqli_fetch_all($rn,MYSQLI_ASSOC);
                        $course = $course[0];
                        
                        $qry = "SELECT * FROM activecourses WHERE student = '$id' AND course= '$idd'";
                            $rn = mysqli_query($conn,$qry);
                            $act = mysqli_fetch_all($rn,MYSQLI_ASSOC);
                            $prog = $act[0]['progress'];
                        ?>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin">
                        <div class="card">
                          <div class="card-body text-center">
                              <div class="mb-3"><i style="font-size: 40px;" class="text-light mdi mdi-book-open-variant icon-md"></i></div>

                              <h5 class="text-primary">
                               <b class="font-weight-bold"> <?php echo $course['courseCode'] ?> </b>
                                <br> 
                                <?php echo $course['courseName'] ?> 
                              </h5>
                             
                            <hr> 
                                 <progress max="100" value="<?php echo $prog ?>"></progress>
                            <a href="single.php?id=<?php echo $idd ?>" class="btn btn-dark">
                              <i class="mdi mdi-play"></i> CONTINUE
                            </a>
                              <br><br>
                            Recommended by
                            <label for="" class="text-secondary">Lecturer</label>
                            <hr>
                            <a onclick="archive('<?php echo $idd?>')">
                            <span class="icon-bg" style="background-color: #f0f1f6 !important;font-size:22px;padding:5px;border-radius:4px">
                            <i class="mdi mdi-arrow-right" style="color:#AE07BD"></i>
                            <i class="mdi mdi-folder  " style="color:#AE07BD"></i></span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                      
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php include('footer.php');?>