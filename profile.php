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
          <form class="d-flex align-items-center h-100" action="search.php" method="GET">
            <div class="input-group">
              <div class="input-group-prepend bg-white">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" name="term" class="form-control bg-white border-0" placeholder="Search courses">
              <div class="input-group-append bg-white">
                <button type="submit" name="submit" class="btn btn-primary">Search</button>
              </div>
            </div>
          </form>
        </span>
      </div>
    </div>
    <br><br>
    <div class="d-xl-flex justify-content-between align-items-start">
      <h2 class="text-dark font-weight-bold mb-2"><i style="font-size: 20px;" class="text-secondary mdi mdi-account icon-md"></i> STUDENT PROFILE </h2>
    </div>
    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="assets/images/faces/1.jpg" alt="Student" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4><?php echo $fName.' '.$lName ?></h4>
                <p class="text-secondary mb-1">Edu Tech</p>
                <p class="text-muted font-size-sm"><?php echo $level ?> Level</p>
                <!-- <button class="btn btn-primary">Edit Profile</button>
                <button class="btn btn-outline-primary">Message</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Personal Information</h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Student ID</label>
                  <input type="text" class="form-control" value="<?php echo $studID ?>" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" value="<?php echo $email ?>" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Matric No.</label>
                  <input type="text" class="form-control" value="<?php echo $matric ?>" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" id="password" class="form-control" value="<?php echo $user_details[0]['password'] ?>">
                  
                  <div class="mx-4">
                <input type="checkbox" class="form-check-input" id="togglePassword">
                <p class="form-check-label" id="togglePasswordText" for="togglePassword">Show Password</p>
                </div>
                               
                     
                </div>
                <div>
                  
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" rows="3">123 University Road, Lagos, Nigeria</textarea>
                </div>
              </div>
            </div>
            <button class="btn btn-primary">Save Changes</button> -->
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Academic Information</h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Faculty</label>
                  <input type="text" class="form-control" value="School of 
Science and Technology Education" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department</label>
                  <input type="text" class="form-control" value="Educational Technology" readonly>
                </div>
              </div>
              <!-- <div class="col-md-4">
                <div class="form-group">
                  <label>Current CGPA</label>
                  <input type="text" class="form-control" value="3.75" readonly>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-6 m-auto">
      <a onclick="logout()" class="w-100 btn-danger btn">
        LOGOUT
      </a>
    </div>
    <!-- <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Current Courses</h4>
            <ul class="list-star">
              <li>CSC301 - Database Management Systems</li>
              <li>CSC302 - Data Structures and Algorithms</li>
              <li>CSC303 - Software Engineering</li>
              <li>CSC304 - Computer Networks</li>
              <li>GES300 - Entrepreneurship Studies</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Upcoming Events</h4>
            <ul class="list-arrow">
              <li>Mid-semester Examinations - 15th August, 2024</li>
              <li>Career Fair - 1st September, 2024</li>
              <li>IT Seminar - 10th September, 2024</li>
              <li>End of Semester Examinations - 1st October, 2024</li>
            </ul>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <script>
       const passwordField = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');
        
        togglePasswordButton.addEventListener('click', function () {
            // Toggle the type attribute of the password field
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Change the text of the toggle button
            // togglePasswordText.textContent = type === 'password' ? 'Show' : 'Hide';
        });
    </script>
<?php include('footer.php');?>