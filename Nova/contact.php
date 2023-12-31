<?php
// to start our session and include all classes
include "../head.inc.php";
$DbMngc = new TeamManager();
$DbMngabout = new AboutManager();
$DbMngcontact = new ContactManager();
$DbMnghome = new HomeManager();

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Nova Bootstrap Template - Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Nova
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-contact">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <?php foreach ($DbMnghome->getAllHomeOne()  as $allh) : ?>
          <h1 class="d-flex align-items-center"><?= $allh->getLogo() ?></h1>
        <?php endforeach; ?>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="portfolio.php">Portfolio</a></li>
          <li><a href="team.php">Team</a></li>
          <!-- <li><a href="blog.html">Blog</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> -->
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Contact</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Contact</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

        <div class="row gy-4 d-flex justify-content-end">

          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">


            <?php foreach ($DbMngcontact->getAllContactOne()  as $allo) : ?>

              <div class="info-item d-flex">
                <i class="bi <?= $allo->getIcon() ?>  flex-shrink-0"></i>
                <div>
                  <h4><?= $allo->getTitle() ?>:</h4>
                  <p><?= $allo->getDescription() ?></p>
                </div>
              </div><!-- End Info Item -->

            <?php endforeach; ?>



          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form" id="#form_register">
              <div class="row">


              <?php foreach ($DbMngcontact->getAllContactSix()  as $alls) : ?>
                <div class="form-group mt-3">
                
                  <input type="<?= $alls->getType() ?>" name="<?= $alls->getName() ?>" class="form-control" id="name" placeholder="<?= $alls->getPlaceholder() ?>">
                  <!-- error place -->
                  <span class="error"></span>
                  
                </div>
                <?php endforeach; ?>




                
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" id="text"></textarea>
                <!-- error place -->
                <span class="error"></span>
              </div>
              <!-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <?php foreach ($DbMngcontact->getAllContactTwo()  as $allt) : ?>
                <span><?= $allt->getName() ?></span>
            </a>
            <p><?= $allt->getText() ?></p>

          <?php endforeach; ?>

          <div class="social-links d-flex  mt-3">

            <?php foreach ($DbMngcontact->getAllContactThree()  as $alltt) : ?>
              <a href="<?= $alltt->getLinkAddress() ?>" class="twitter"><i class="bi <?= $alltt->getIcon() ?>"></i></a>

            <?php endforeach; ?>

            
          </div>




          </div>

          <div class="col-lg-3 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
            <?php foreach ($DbMngcontact->getAllContactFour()  as $allf) : ?>
              <li><i class="bi bi-dash"></i> <a href="<?= $allf->getLink() ?>"><?= $allf->getText() ?></a></li>

              <?php endforeach; ?>


              
            </ul>
          </div>

          <div class="col-lg-3 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
            <?php foreach ($DbMngcontact->getAllContactFive()  as $allfi) : ?>
              <li><i class="bi bi-dash"></i> <a href="<?= $allfi->getLink() ?>"><?= $allfi->getText() ?></a></li>

              <?php endforeach; ?>
            </ul>
          </div>

          

        </div>
      </div>
    </div>

    <div class="footer-legal">
      
    </div>
  </footer><!-- End Footer --><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/app.js"></script>

</body>

</html>