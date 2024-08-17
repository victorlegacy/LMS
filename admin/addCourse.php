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
                  <div class="col-md-6 grid-margin stretch-card">
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
                            <input type="text" name="name" class="form-control" id="name" placeholder="Full Course Name">
                          </div>
 
                          <div class="form-group">
                            <label for="exampleInputPassword1">Course Description</label>
                            <textarea  name="descrip" class="form-control" id="descrip"></textarea>
                           
                          </div>
                          <div class="form-group">
                            <label for="file">Course Upload(PDF)</label>
                            <input type="file" name="pic" class="form-control" id="file">
                          </div>
                          * Course Code Must Match PDF name
                          <hr>
                          <input type="hidden" name="level" value="<?php echo $level?>">
                          <button type="submit" name="submit" class="w-100 btn btn-large btn-primary mr-2 ">Add Course</button>
                        
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h4>Available Courses</h4>
                    <?php 
                      foreach($courses as $course){
                    ?>
                    <div class="card mb-3 p-3">
                      <div class="row">
                        <div class="col-3"><b><?php echo $course['courseCode'] ?></b></div>
                        <div class="col-6"><?php echo $course['courseName'] ?></div>
                        <div class="col-3">
                          <a href="../courses/<?php echo $course['courseCode'] ?>.pdf" download class="btn btn-primary">
                            <i class="mdi mdi-download"></i>
                          </a>
                          <a onclick="deleteCourse('<?php echo $course['id']?>')" target="_blank" class="btn btn-danger">
                            <i class="mdi mdi-delete"></i>
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
          <script>
              var rangeInput = document.getElementById('rangeInput');
              var rangeValueParagraph = document.getElementById('rangeValue');

              
              function updateRangeValue() {
                  rangeValueParagraph.textContent =  rangeInput.value + ' Day(s)' ;
              }

               
              rangeInput.addEventListener('input', updateRangeValue);

               
              updateRangeValue();
          </script>

          <script>
            function deleteCourse(courseID){
              if (window.XMLHttpRequest) {
                  xmlhttp = new XMLHttpRequest();
              } else {
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {                             
                      Toastify({
                      text: "Deleting...",
                      duration: 1000,
                      newWindow: true,
                      close: true,
                      gravity: "bottom",
                      position: "center",
                      stopOnFocus: true,
                      style: {
                      background: "#AE07BD",
                      },
                      onClick: function(){}
                      }).showToast();  
                       setTimeout(function(){window.location = 'addCourse.php'},1500)
                  }
              };
              xmlhttp.open("GET","delete.php?course="+courseID,true);
              xmlhttp.send();
            }
          </script>
          <?php 
        include('footer.php')
      ?>