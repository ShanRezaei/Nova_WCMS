<?php
// to start our session and include all classes
include "../head.inc.php";
$DbMngs = new ServiceManager();
$DbMngscard = new ServiceCardManager();
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

  <title>Nova Bootstrap Template - Index</title>
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

<body class="page-index">

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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">

        <?php foreach ($DbMnghome->getAllHomeTwo()  as $allt) : ?>
          
        
        
          <h2 data-aos="fade-up"><?= $allt->getTitle() ?></h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            <p><?= $allt->getText() ?></p>
          </blockquote>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="<?= $allt->getButtonLink() ?>" class="btn-get-started"><?= $allt->getButtonTitle() ?></a>
            <a href="<?= $allt->getVideoLink() ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Why Choose Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Why Choose Us</h2>

        </div>

        <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

        <?php foreach ($DbMngabout->getAllAboutOne()  as $allcao) : ?>
            <div class="col-xl-5 img-bg" style="background-image: url('<?= $allcao->getImg() ?>')"></div>
          <?php endforeach; ?>
          <div class="col-xl-7 slides  position-relative">

            <div class="slides-1 swiper">
              <div class="swiper-wrapper">

              <?php foreach ($DbMngabout->getAllAboutTwo()  as $allcaT) : ?>
                  <div class="swiper-slide">
                    <div class="item">
                      <h3 class="mb-3"><?= $allcaT->getTitleOne() ?></h3>
                      <h4 class="mb-3"><?= $allcaT->getTitleTwo() ?></h4>
                      <p><?= $allcaT->getText() ?></p>
                    </div>
                  </div><!-- End slide item -->
                <?php endforeach; ?>

                

              </div>
              <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>

        </div>

      </div>
    </section><!-- End Why Choose Us Section -->

    <!-- ======= Our Services Section ======= -->
    <section id="services-list" class="services-list">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Services</h2>

        </div>

        <div class="row gy-5">

        <?php foreach ($DbMngs->getAllServices()  as $alls) : ?>
          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">

            <div class="icon flex-shrink-0"><i class="bi <?= $alls->getIcon() ?>" style="color: #f57813;"></i></div>
            <div>
              <h4 class="title"><a href="#" class="stretched-link"><?= $alls->getTitle() ?></a></h4>
              <p class="description"><?= $alls->getText() ?></p>
            </div>

          </div>
          <?php endforeach; ?>
          <!-- End Service Item -->


        </div>

      </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
          <?php foreach ($DbMngabout->getAllAboutThree()  as $allcaTR) : ?>
            <h3><?= $allcaTR->getTitle() ?></h3>
            <p><?= $allcaTR->getText() ?></p>
            <a class="cta-btn" href="<?= $allcaTR->getLink() ?>"><?= $allcaTR->getLinkText() ?></a>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Features Section ======= -->


    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Recent Blog Posts</h2>

        </div>

        <div class="row gy-5">

        <?php foreach ($DbMnghome->getAllHomeThree()  as $allth) : ?>
          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="post-box">
              <div class="post-img"><img src="<?= $allth->getImg() ?>" class="img-fluid" alt=""></div>
              <div class="meta">
                <!-- <span class="post-date">Tue, December 12</span> -->
                <span class="post-author">| <?= $allth->getFirstName() ?> <?= $allth->getLastName() ?></span>
              </div>
              <h3 class="post-title"><?= $allth->getTitle() ?></h3>
              <p><?= $allth->getText() ?>.</p>
              <!-- <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div>

        <?php endforeach; ?>


        </div>

      </div>
    </section><!-- End Recent Blog Posts Section -->

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

          <!-- <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div> -->

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

</body>

</html>