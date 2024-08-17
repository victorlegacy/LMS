<?php 
include('header.php');
$course= $_GET['id'];
$courseID = $_GET['id'];
$sql = "SELECT * FROM courses WHERE id= '$course'";
$run= mysqli_query($conn,$sql);
$course  = mysqli_fetch_all($run,MYSQLI_ASSOC);
$course = $course[0];


$qry = "SELECT * FROM activecourses WHERE student = '$id' AND course= '$courseID'";
$rn = mysqli_query($conn,$qry);
$act = mysqli_fetch_all($rn,MYSQLI_ASSOC);
$active = $act[0];

$qry = "SELECT * FROM activecourses WHERE  course= '$id'";
$rn = mysqli_query($conn,$qry);
$actNum = mysqli_num_rows($rn);


?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div style="display: flex; align-items: center; flex-direction: row; gap: 20px">
              <div class="mb-3"><i style="font-size: 60px;" class="text-primary mdi mdi-book-open-variant icon-md"></i></div>
              <h2 class="text-primary">
                <b class="font-weight-bold"><?php echo $course['courseCode']; ?></b>
                <br> 
                <?php echo $course['courseName'] ?>
              </h2>
            </div>
            <hr>
            <h4>Course Description</h4>
            <p><?php echo $course['courseDesc']?></p>
            <hr>
            <h4>Course Materials</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <a href="courses/<?php echo $course['courseCode']; ?>.pdf" download="" class="btn btn-primary btn-block">
                  <i class="mdi mdi-file-pdf"></i> Download PDF
                </a>
              </div>
              <div class="col-md-6 mb-3">
                <a href="courses/<?php echo $course['courseCode']; ?>.pdf"  target="_blank" class="btn btn-info btn-block">
                  <i class="mdi mdi-play-circle"></i> View PDF
                </a>
              </div>
            </div>
            <hr>
            <h4>Update Progress</h4>
<div class="row">
  <div class="col-12">
    <div class="input-form">
    <input type="range" id="slider" class="form-control bg-primary text-primary" min="1" value="<?php echo $active['progress'] ?>" max="100">
    <b id="sliderValue"></b>%
    </div>
    <br>
    <div>
      <a onclick="updateP('<?php echo $courseID ?>')" class="btn btn-primary"><i class="mdi mdi-save"></i> Save</a>
    </div>
  </div>

</div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Course Information</h4>
            <p><strong>Date Uploaded:  <?php echo $course['createdAt']?></strong> </p>
            <p><strong>Date Started: <?php echo $active['dateAdded']?></strong></p>
            <p><strong>Level:</strong> <?php echo $level ?></p>
            <p><strong>Active Course Users:</strong> <?php echo $actNum?></p>
            <!-- <a href="#" class="btn btn-success btn-block">
              <i class="mdi mdi-pencil"></i> Enroll Now
            </a> -->
          </div>
        </div>
      </div>
    </div>
    
    <div class="row mt-4">
      <div class="col-md-12">
        <h3>Recommended Courses</h3>
      </div>
    </div>
    <div class="row">
    <?php foreach($courses as $course){
                        $idd = $course['id'];
                        ?>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            
                            <div style="display: flex; align-items: center; flex-direction: row; gap: 20px">
                              <div class="mb-3"><i style="font-size: 40px;" class="text-light mdi mdi-book-open-variant icon-md"></i></div>
                              <h5 class="text-primary">
                                <b class="font-weight-bold"> <?php echo $course['courseCode'] ?> </b>
                                  <hr> 
                                 <?php echo $course['courseName'] ?>
                                </h5>
                            </div>
                             
                            <hr>
                                 <p class="text-left"><?php echo $course['courseDesc'] ?></p> <br>

                            <?php
                              $sql = "SELECT * FROM activecourses WHERE course = '$idd' AND student = '$id'";
                              $num = mysqli_num_rows(mysqli_query($conn,$sql));
                              if($num < 1){
                                $sql = "SELECT * FROM archivecourses WHERE course = '$idd' AND student = '$id'";
                                $numa = mysqli_num_rows(mysqli_query($conn,$sql));
                                if($numa < 1){
                            ?>     
                            <a onclick="start('<?php echo $course['id'] ?>')"  class="btn btn-dark w-100">
                              <i class="mdi mdi-play"></i> START
                            </a>
                            <?php
                                }else{?>
                                   <i> Course Archived</i>

                               <?php }  
                          }else{
                               $date = mysqli_fetch_all(mysqli_query($conn,$sql),MYSQLI_ASSOC)[0]['dateAdded'];
                              ?>
                             Started On <i> <?php echo $date ?></i>
                              <?php } ?>
                            <br>
                            <hr>
                            Recommended For
                            <label for="" class="text-secondary">You</label>
                          </div>
                        </div>
                      </div>
                      <?php }?>
    </div>
  </div>
  <script>
    const slider = document.getElementById('slider');
        const sliderValue = document.getElementById('sliderValue');

        // Function to update the displayed value
        function updateSliderValue() {
            sliderValue.textContent = slider.value;
        }

        // Event listener to update the value as the slider is moved
        slider.addEventListener('input', updateSliderValue);

        // Initial update on page load
        updateSliderValue();
  </script>

<?php include('footer.php'); ?>