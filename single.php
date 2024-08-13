<?php 
include('header.php');
// In a real application, you'd fetch the course details from a database using an ID
$course_code = "EDT 225";
$course_title = "Lorem, ipsum dolor.";
$course_description = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore obcaecati reprehenderit commodi? Necessitatibus atque";
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
                <b class="font-weight-bold"><?php echo $course_code; ?></b>
                <br> 
                <?php echo $course_title; ?>
              </h2>
            </div>
            <hr>
            <h4>Course Description</h4>
            <p><?php echo $course_description; ?></p>
            <hr>
            <h4>Course Materials</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <a href="courses/<?php echo $course_code; ?>.pdf" class="btn btn-primary btn-block">
                  <i class="mdi mdi-file-pdf"></i> Download PDF
                </a>
              </div>
              <div class="col-md-6 mb-3">
                <a href="courses/<?php echo $course_code; ?>.mp4" class="btn btn-info btn-block">
                  <i class="mdi mdi-play-circle"></i> Watch Video
                </a>
              </div>
            </div>
            <hr>
            <h4>Course Outline</h4>
            <ul class="list-group">
              <li class="list-group-item">Week 1: Introduction to the Course</li>
              <li class="list-group-item">Week 2: Fundamental Concepts</li>
              <li class="list-group-item">Week 3: Advanced Topics</li>
              <li class="list-group-item">Week 4: Practical Applications</li>
              <li class="list-group-item">Week 5: Review and Assessment</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Course Information</h4>
            <p><strong>Instructor:</strong> Dr. John Doe</p>
            <p><strong>Duration:</strong> 5 weeks</p>
            <p><strong>Level:</strong> Intermediate</p>
            <p><strong>Prerequisites:</strong> EDT 101, EDT 102</p>
            <a href="#" class="btn btn-success btn-block">
              <i class="mdi mdi-pencil"></i> Enroll Now
            </a>
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
      <?php
      // In a real application, you'd fetch these from a database
      $recommended_courses = [
        ['code' => 'EDT 226', 'title' => 'Advanced Topics'],
        ['code' => 'EDT 227', 'title' => 'Practical Applications'],
        ['code' => 'EDT 228', 'title' => 'Case Studies']
      ];
      
      foreach ($recommended_courses as $course) {
      ?>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div style="display: flex; align-items: center; flex-direction: row; gap: 20px">
              <div class="mb-3"><i style="font-size: 40px;" class="text-light mdi mdi-book-open-variant icon-md"></i></div>
              <h5 class="text-primary">
                <b class="font-weight-bold"><?php echo $course['code']; ?></b>
                <br> 
                <?php echo $course['title']; ?>
              </h5>
            </div>
            <hr>
            <p>Brief description of the course goes here.</p>
            <a href="single.php?course=<?php echo $course['code']; ?>" class="btn btn-dark w-100">
              <i class="mdi mdi-information"></i> View Course
            </a>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
  </div>

<?php include('footer.php'); ?>