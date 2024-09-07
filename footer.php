    
       <style>
/* Style for fixed button */
#ai-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 100; /* Ensure this is lower than the drawer's z-index */
}

/* Attention Drawer */
.attention-drawer {
    position: fixed;
    bottom: 10px;
    right: 20px;
    width: 300px;
    height: 140px;
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000; /* Higher than the button's z-index */
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #721c24;
    font-size: 16px;
}

.drawer-content {
    display: flex;
    align-items: center;
}

.drawer-content .close {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: #721c24;
}

.drawer-content p {
    margin: 0;
    padding-right: 10px;
}

@media (max-width: 576px) {
    .attention-drawer {
        width: 250px;
    }
}
/* Style for popup window */
.popup-container {
    display: none;
    position: fixed;
    bottom: 70px;
    right: 20px;
    z-index: 1000;
    width: 300px;
}

.popup-content {
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px;
    position: relative;
}

.popup-content .close {
    position: absolute;
    top: 10px;
    right: 10px;
}

@media (max-width: 576px) {
    #ai-button {
        bottom: 10px;
        right: 10px;
    }

    .popup-container {
        bottom: 60px;
        width: 250px;
    }
}

/* Style for course cards */
.card-img-top {
    height: 150px;
    object-fit: cover;
}

.card-title {
    text-align: center;
}

.typing-animation {
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    border-right: .15em solid orange; /* Cursor effect */
    animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
}

@keyframes typing {
    from { width: 0; }
    to { width: 100%; }
}

@keyframes blink-caret {
    from, to { border-color: transparent; }
    50% { border-color: orange; }
}

/* Attention Drawer */
.attention-drawer {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 300px;
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #721c24;
    font-size: 16px;
}

.drawer-content {
    display: flex;
    align-items: center;
}

.drawer-content .close {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: #721c24;
}

.drawer-content p {
    margin: 0;
    padding-right: 10px;
}

@media (max-width: 576px) {
    .attention-drawer {
        width: 250px;
    }
}

       </style>
       <!-- Attention Drawer -->
<!-- <div id="attention-drawer" class="attention-drawer">
    <div class="drawer-content">
      
        <p>Please make sure to click the AI button to get help!</p>


    </div>
</div> -->

    <!-- Fixed Button -->
    <button id="ai-button" class="btn btn-primary">
    <i class="mdi mdi-robot"></i>
    </button>

    <!-- Popup Window -->
    <div id="popup-window" class="popup-container">
        <div class="popup-content">
            <button type="button" class="close" aria-label="Close" id="close-popup">
                <span aria-hidden="true">&times;</span>
            </button>
            <div>
            <img src="assets/images/ai.png" width="10%" alt="">
            </div>
            <p id="popup-message" class="typing-animation">Hi there I'm EDT GPT! How can I help?</p>

            <div>
              
            </div>
    
            <div id="initial-view">
           <div class="row">
            <div class="col-6"> 
              <button class="btn btn-secondary" id="request-external">
              <i class="mdi mdi-share"></i>  
              Request External Material</button>
           </div>
            <div class="col-6">
            <button class="btn btn-secondary" id="request-internal">
             
            <i class="mdi mdi-book-open"></i>  
            Request Internal Material</button>
            </div>
           </div>
            </div>
           <br>
           <hr>
           <br>

            <!-- Form for external material -->
            <div id="external-form" class="d-none">
                <form id="external-material-form">
                <p id="popup-message" class="typing-animation">Lets get to know you!</p>
                      
                    
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" required>
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                             
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Loading spinner -->
            <div id="loading-spinner" class="d-none text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <!-- Course names display -->
            <div id="internal-course-names" class="d-none">
                <div class="row">
                  <div class="text-center">
                    <b><i class="mdi mdi-robot"></i> Internal Material Based on you info:</b>
                  </div>
                  <hr>
                <div class="row">
                      <?php foreach($courses as $course){
                        $idd = $course['id'];
                        ?>
                      <div class="col-12">
                        
                          <div class="card-body text-left">
                            
                            <div>
                              <div> <i class="text-light mdi mdi-book-open-variant icon-md"></i> </div>
                              <h5 class="text-primary">
                                <b class="font-weight-bold"> <?php echo $course['courseCode'] ?> </b>
                            
                                </h5>
                            </div>
                             
                            <hr>
                              
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
                             Started   
                            
                              <?php } ?>
                          </div>
                       
                      </div>
                      <?php }?>
                    </div>
                </div>
<div class="text-center">
                           <!-- Home Button -->
    <button type="button" id="back-to-home" class="btn btn-primary"><i class="mdi mdi-home"></i> Back to Home</button></div>

            </div>

<!-- External Course Names Display -->
<div id="external-course-names" class="d-none">
    <div class="row" id="external-course-names-container">
    <div class="text-center">
                    <b><i class="mdi mdi-robot"></i>  External Material your info:</b>
                  </div>
    <div class="col-12">
                        
                        <div class="card-body text-left">
                          
                          <div>
                            <div> <i class="text-light mdi mdi-book-open-variant icon-md"></i> </div>
                            <h5 class="text-primary">
                              <b class="font-weight-bold"> "Teach Like a Champion" by Doug Lemov </b>
                          
                              </h5>
                          </div>
                          <hr>
                          <a href="https://www.amazon.com/Teach-Like-Champion-Techniques-Classroom/dp/1119712610" target="_blank" class="btn btn-dark w-100">
                              <i class="mdi mdi-eye"></i> VIEW
                            </a>
                           
                          <hr>
                            
    </div>
</div>
<div class="col-12">
                        
                        <div class="card-body text-left">
                          
                          <div>
                            <div> <i class="text-light mdi mdi-book-open-variant icon-md"></i> </div>
                            <h5 class="text-primary">
                              <b class="font-weight-bold"> The Courage to Teach: </b>
                          
                              </h5>
                          </div>
                          <hr>
                          <a href="https://www.amazon.com/Courage-Teach-Exploring-Landscape-Teachers/dp/0787996866" target="_blank" class="btn btn-dark w-100">
                              <i class="mdi mdi-eye"></i> VIEW
                            </a>
                           
                          <hr>
                            
    </div>
</div>
<div class="col-12">
                        
                        <div class="card-body text-left">
                          
                          <div>
                            <div> <i class="text-light mdi mdi-book-open-variant icon-md"></i> </div>
                            <h5 class="text-primary">
                              <b class="font-weight-bold"> "The Art of Teaching" by Jay Parini </b>
                          
                              </h5>
                          </div>
                          <hr>
                          <a href="https://www.amazon.com/Art-Teaching-Jay-Parini/dp/0195305577" target="_blank" class="btn btn-dark w-100">
                              <i class="mdi mdi-eye"></i> VIEW
                            </a>
                           
                          <hr>
                            
    </div>
</div>


                            
        </div>
        <div class="text-center">
                           <!-- Home Button -->
    <button type="button" id="back-to-home2" class="btn btn-primary"><i class="mdi mdi-home"></i> Back to Home</button>
  </div>
    </div>

        </div>
    </div>

    <script>
   document.addEventListener('DOMContentLoaded', function () {
    const aiButton = document.getElementById('ai-button');
    const popupWindow = document.getElementById('popup-window');
    const closePopup = document.getElementById('close-popup');
    const internalButton = document.getElementById('request-internal');
    const externalButton = document.getElementById('request-external');
    const externalForm = document.getElementById('external-form');
    const loadingSpinner = document.getElementById('loading-spinner');
    const internalCourseNames = document.getElementById('internal-course-names');
    const externalCourseNames = document.getElementById('external-course-names');
    const externalMaterialForm = document.getElementById('external-material-form');
    const attentionDrawer = document.getElementById('attention-drawer');
    const closeDrawer = document.getElementById('close-drawer');
    const backToHomeButton = document.getElementById('back-to-home');
    const backToHomeButton2 = document.getElementById('back-to-home2');
    const initialView = document.getElementById('initial-view');

    aiButton.addEventListener('click', function () {
        popupWindow.style.display = popupWindow.style.display === 'block' ? 'none' : 'block';
        attentionDrawer.style.display = 'none'; // Hide the attention drawer when AI button is clicked
    });

    closePopup.addEventListener('click', function () {
        popupWindow.style.display = 'none';
    });

    internalButton.addEventListener('click', function () {
        popupWindow.querySelector('#popup-message').innerText = 'Loading internal material...';
        externalForm.classList.add('d-none');
        externalCourseNames.classList.add('d-none');
        internalCourseNames.classList.add('d-none');
        loadingSpinner.classList.remove('d-none');

        // Simulate loading time
        setTimeout(function () {
            loadingSpinner.classList.add('d-none');
            popupWindow.querySelector('#popup-message').innerText = 'Internal Material';
            internalCourseNames.classList.remove('d-none');
        }, 2000); // 2 seconds for demonstration
    });

    externalButton.addEventListener('click', function () {
        popupWindow.querySelector('#popup-message').innerText = 'Please fill out the form:';
        externalForm.classList.remove('d-none');
        internalCourseNames.classList.add('d-none');
        externalCourseNames.classList.add('d-none');
        loadingSpinner.classList.add('d-none');
    });

    externalMaterialForm.addEventListener('submit', function (event) {
        event.preventDefault();
        popupWindow.querySelector('#popup-message').innerText = 'Loading external material...';
        externalForm.classList.add('d-none');
        loadingSpinner.classList.remove('d-none');

        // Simulate form processing time
        setTimeout(function () {
            loadingSpinner.classList.add('d-none');
            popupWindow.querySelector('#popup-message').innerText = 'External Material';
            externalCourseNames.classList.remove('d-none');
        }, 2000); // 2 seconds for demonstration
    });

    backToHomeButton.addEventListener('click', function () {
        // Show the initial view
        initialView.classList.remove('d-none');
        externalForm.classList.add('d-none');
        internalCourseNames.classList.add('d-none');
        externalCourseNames.classList.add('d-none');
        loadingSpinner.classList.add('d-none');
        popupWindow.querySelector('#popup-message').innerText = 'Hi there scholar, How can I help?';
    });
    backToHomeButton2.addEventListener('click', function () {
        // Show the initial view
        initialView.classList.remove('d-none');
        externalForm.classList.add('d-none');
        internalCourseNames.classList.add('d-none');
        externalCourseNames.classList.add('d-none');
        loadingSpinner.classList.add('d-none');
        popupWindow.querySelector('#popup-message').innerText = 'How can I help?';
    });

    closeDrawer.addEventListener('click', function () {
        attentionDrawer.style.display = 'none'; // Hide the attention drawer
    });

    // Optional: Automatically hide the drawer after a few seconds
    setTimeout(function () {
        attentionDrawer.style.display = 'none';
    }, 10000); // 10 seconds for demonstration
});
    </script>
       <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-dark d-block text-center text-sm-left d-sm-inline-block"></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2024</a> </span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
      </div>
    </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/dashboard.js"></script>
  </body>
</html>