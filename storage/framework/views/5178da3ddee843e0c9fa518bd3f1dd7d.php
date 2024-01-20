  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">
      <img id="img_logo" src="<?php echo e(asset('assets/img/logo2.png')); ?>" alt="logo" style="width: 200px; height: 100px;">  
      </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>

          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <?php if(auth()->guard()->guest()): ?>
          <li><a class="getstarted scrollto" href="<?php echo e(route('login')); ?>">Login </a></li>
          <?php endif; ?>
          <?php if(auth()->guard()->check()): ?>
       
          <li><a class="getstarted scrollto" href="<?php echo e(route('logout')); ?>" onclick="return confirm('Are you sure you want to log out?')">log out</a></li>

          <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  <!-- ======= Hero Section ======= -->
 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>ENHANCED TECHNOLOGIES S.A.R.L</h1>
        <h2>  At your service...</h2>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="#about" class="btn-get-started scrollto">Make a Complaint !</a>

        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero --><?php /**PATH C:\xampp\htdocs\reclamation_stage_part1\reclamation_stage\resources\views/partials/head.blade.php ENDPATH**/ ?>