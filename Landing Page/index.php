<?php
  // Establish database connection
  $conn = mysqli_connect("localhost", "root", "", "gucc");

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Array to store the table names and their corresponding placeholders
  $tables = array(
      'member' => 'Members',
      'notices' => 'Notices',
      'events' => 'Events',
      'committee' => 'Committee'
  );

  // Array to store the counts of each table
  $tableCounts = array();

  // Loop through each table
  foreach ($tables as $tableName => $placeholder) {
      // SQL query to count rows in table
      $sql = "SELECT COUNT(*) AS row_count FROM $tableName";
      $result = mysqli_query($conn, $sql);

      // Fetch the row count value
      if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          $tableCounts[$tableName] = $row['row_count'];
      } else {
          $tableCounts[$tableName] = 0;
      }
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GUCC :: HOME</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.html">GUCC</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Photo Gallery</a></li>
          <li><a class="nav-link scrollto " href="#event">Events</a></li>
          <li><a class="nav-link scrollto" href="member_notices.php">Notice</a></li>
          <li><a href="committee_testing.php">Executive Committee</a></li>
          <li><a href="member_profile.php">Profile</a></li>
          <li><a class="nav-link scrollto" href="#faq">F.A.Q</a></li>
          <li><a class="nav-link scrollto" href="member_logout.php">Logout</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome to Green University Computer Club</h1>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Empty Space ======= -->
    <section id="what-we-do" class="what-we-do">
      <div class="container">

        <div class="section-title">
        </div>
        </div>

      </div>
    </section><!-- End Empty Space-->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>About Us</h3>
            <p>
              Welcome to the Green University Computer Club!
              We're a passionate group of tech enthusiasts dedicated to exploring the world of computers and technology. 
              Through seminars, workshops, and career resources, we provide valuable information and opportunities for members to grow and succeed.
              Join us as we build a vibrant community and shape the future of technology together.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Gallery</h2>
          <p>Photo Gallery of our recent activities</p>
        </div>

        <div class="row g-0" data-aos="fade-left">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
              <a href="assets/img/gallery/1.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
              <a href="assets/img/gallery/2.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
              <a href="assets/img/gallery/3.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
              <a href="assets/img/gallery/4.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
              <a href="assets/img/gallery/5.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
              <a href="assets/img/gallery/6.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
              <a href="assets/img/gallery/7.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
              <a href="assets/img/gallery/8.jpg" class="gallery-lightbox">
                <img src="assets/img/gallery/8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->
    <!-- ======= Empty Space ======= -->
    <section id="what-we-do" class="what-we-do">
      <div class="container">

        <div class="section-title">
        </div>
        </div>

      </div>
    </section><!-- End Empty Space-->
    
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">
      <div class="section-title" data-aos="fade-up">
          <h2>Statistics</h2>
        </div>
        <div class="row">

          <div class="col-lg-3 col-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $tableCounts['member']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Members</p>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $tableCounts['notices']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Notices</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $tableCounts['events']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Events Organized</p>
            </div>
          </div>

          <div class="col-lg-3 col-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $tableCounts['committee']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Committee Members</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Activities Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Activities</h2>
          <p>Our Activities Includes : </p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4>Career Consultation</h4>
              <p>Empowering individuals with personalized guidance, industry insights, and strategic planning to navigate their professional journey and unlock their full potential. Our experienced consultants provide tailored advice, career assessments, and practical resources to help you make informed decisions, set meaningful goals, and embark on a rewarding career path with confidence. Together, we'll chart a course towards success and ensure you thrive in the ever-evolving job market.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4>Organize Events</h4>
              <p>Bringing visions to life through meticulous planning, seamless execution, and unforgettable experiences. Our team of skilled organizers handles every aspect of event management, from concept development and logistics coordination to vendor sourcing and on-site coordination. With a keen eye for detail and a passion for creating memorable moments, we transform your ideas into reality, ensuring every event is a resounding success.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h4>Conduct Seminars</h4>
              <p>Empowering minds through knowledge-sharing and interactive learning experiences. Our seminar sessions are thoughtfully curated to bring industry experts, esteemed researchers, and seasoned professionals to the forefront, providing valuable insights, practical skills, and inspiring ideas. With a commitment to excellence, we strive to create an enriching environment that nurtures growth, fosters collaboration, and equips participants with the tools they need to thrive in their respective domains.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h4>Run Workshops</h4>
              <p>Hands-on learning that ignites creativity and hones practical skills. Our expert-led workshops provide a dynamic environment for participants to delve into specific subjects, gaining valuable insights and practical experience. Join us to unlock your potential and enhance your expertise in an interactive and collaborative setting.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <i class="bi bi-brightness-high"></i>
              <h4>Notify Members</h4>
              <p> Stay informed and connected with the latest updates at your fingertips. Our notice upload feature ensures timely communication of important announcements, event details, and opportunities directly to your digital devices. Be it campus-wide notifications, club activities, or upcoming deadlines, never miss out on vital information. Stay engaged, stay connected, and stay informed with our convenient notice upload system.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4">
            <div class="icon-box">
              <i class="bi bi-calendar4-week"></i>
              <h4>Improve Members Overall Skills</h4>
              <p>Empowering members with a holistic approach to skill enhancement. Our club is committed to nurturing not only technical proficiency but also a wide range of essential skills for personal and professional growth. Through workshops, seminars, and hands-on projects, we provide opportunities to sharpen communication, leadership, problem-solving, and teamwork abilities. Join us to broaden your skill set, unlock your potential, and become a well-rounded individual ready to thrive in any endeavor.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Event Section ======= -->
    <section id="event" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Events</h2>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-contest">Contest</li>
              <li data-filter=".filter-cultural">Cultural</li>
              <li data-filter=".filter-seminar">Seminar</li>
              <li data-filter=".filter-workshop">Workshop</li>
              <li data-filter=".filter-prize">Prize Giving Ceremony</li>
              <li data-filter=".filter-carnival">Carnival</li>
              <li data-filter=".filter-others">Others</li>

            </ul>
          </div>
        </div>

        <!-- <div class="row portfolio-container"> -->

          <?php
            $sql_events = "SELECT * FROM events ORDER BY E_ID DESC";
            $result_events = mysqli_query($conn, $sql_events);

            // Check if there are any results
            if (mysqli_num_rows($result_events) > 0) {
                // Start the portfolio-container
                echo '<div class="row portfolio-container">';
                // Set the maximum number of results to display
                $maxResults = 6;
                $counter = 0;

                // Loop through the fetched rows
                while ($row_events = mysqli_fetch_assoc($result_events)) {
                    $category = $row_events['category'];

                    // Generate the portfolio item HTML based on the category
                    echo '<div class="col-lg-4 col-md-6 portfolio-item filter-' . $category . ' wow fadeInUp">';
                    echo '<div class="portfolio-wrap">';
                    echo '<figure>';
                    $banner = base64_encode($row_events['banner']);
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row_events['banner']) . '" class="img-fluid" alt="">';
                    echo '<a href="' . $row_events['link'] . '" class="link-details" title="More Details"><i class="bx bx-link"></i></a>';
                    echo '</figure>';
                    echo '<div class="portfolio-info">';
                    echo '<h4><a href="' . $row_events['link'] . '">' . $row_events['title'] . '</a></h4>';
                    echo '<p>' . $category . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    // Increment the counter
                    $counter++;

                    // Break the loop if the maximum number of results is reached
                    if ($counter >= $maxResults) {
                        break;
                    }
                }

                  // Close the portfolio-container
                  echo '</div>';
              } else {
                  // No entries found
                  echo 'No events found.';
              }
            ?>


    <!-- End Event Section -->
     <!-- ======= F.A.Q Section ======= -->
     <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">How can I become a member of GUCC? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Every student of the Computer Science and Engineering Department of GUB automatically becomes a member of the GUCC after completing his admission.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">How can I become a part of the executive committee? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Executive members are the chosen students with distinguised skills in different fields.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Where is the club located? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  The club room is located in B-1001 room.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">How can I contribute to the club activities? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  You can let us know your valuable suggestions and thoughts using our email, phone or physically visiting the club room.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">What is the biggest event arranged by GUCC? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  GUCC is responsible for organizing the most important events of GUB and the CSE carnival is arguiblely the biggest of them.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-5 justify-content-center">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p> 220/D Begum Rokeya Sarani<br>Dhaka 1208, Bangladesh</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>gucc@example.com</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+880 12345678</p>
                </div>
              </div>
            </div>

          </div>

        </div>

      

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>EnigmaCodex</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by Al-Arafat Uddin Koraishi , S.M. Mahmudur Rahman and Taslima Akter
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>