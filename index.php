<?php 
session_start();
include('./config/db_connection.php');

$select_users = "SELECT * FROM users";
$connect_users = mysqli_query($db_connect, $select_users);
$user = mysqli_fetch_assoc($connect_users);

$id = $user['id'];
$name = $user['name'];
$email = $user['email'];
$image = $user['image'];
$tagline = $user['tagline'];


$select_introduction = "SELECT * FROM introduction WHERE status='active'";
$connect_introduction = mysqli_query($db_connect, $select_introduction);
$single_introduction = mysqli_fetch_assoc($connect_introduction);


$select_education = "SELECT * FROM education WHERE status='active'";
$connect_education = mysqli_query($db_connect, $select_education);
$single_education = mysqli_fetch_assoc($connect_education);


$select_service = "SELECT * FROM service_list WHERE status='active'";
$connect_service = mysqli_query($db_connect, $select_service);
$single_service = mysqli_fetch_assoc($connect_service);


$select_portfolio = "SELECT * FROM portfolios WHERE status='active'";
$connect_portfolio = mysqli_query($db_connect, $select_portfolio);
$single_portfolio = mysqli_fetch_assoc($connect_portfolio);


$select_overview = "SELECT * FROM overview_list WHERE status='active'";
$connect_overview = mysqli_query($db_connect, $select_overview);
$single_overview = mysqli_fetch_assoc($connect_overview);


$select_testimonial = "SELECT * FROM testimonials WHERE status='active'";
$connect_testimonial = mysqli_query($db_connect, $select_testimonial);
$single_testimonial = mysqli_fetch_assoc($connect_testimonial);


$select_brand = "SELECT * FROM brands WHERE status='active'";
$connect_brand = mysqli_query($db_connect, $select_brand);
$single_brand = mysqli_fetch_assoc($connect_brand);




?>
<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="./website-assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./website-assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./website-assets/css/animate.min.css">
        <link rel="stylesheet" href="./website-assets/css/magnific-popup.css">
        <!-- <link rel="stylesheet" href="./website-assets/css/fontawesome-all.min.css"> -->
        <link rel="stylesheet" href="./website-assets/css/flaticon.css">
        <link rel="stylesheet" href="./website-assets/css/slick.css">
        <link rel="stylesheet" href="./website-assets/css/aos.css">
        <link rel="stylesheet" href="./website-assets/css/default.css">
        <link rel="stylesheet" href="./website-assets/css/style.css">
        <link rel="stylesheet" href="./website-assets/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.html" class="navbar-brand logo-sticky-none"><img src="./website-assets/img/logo/logo.png" alt="Logo"></a>
                                    <a href="index.html" class="navbar-brand s-logo-none"><img src="./website-assets/img/logo/s_logo.png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="./website-assets/img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli
                            Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+0989 7876 9865 9</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?= $email; ?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $name; ?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?= $tagline; ?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                                <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img style="width: 410px; min-height: 400px;" src="./images/profile/<?= $image; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="./website-assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <?php if($single_introduction || $single_education) : ?>
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="./website-assets/img/banner/banner_img2.png" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <span style="display: block; font-size: 14px; font-weight: 700; color: #8cc090; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 15px; line-height: 1;" class="fw-bold text-white">Introduction</span>
                            <?php foreach($connect_introduction as $introduction) :?>
                            <div class="section-title mb-25">
                            <h2><?= $introduction['title'] ?></h2>
                            </div>
                            <div class="about-content">
                                <p><?= $introduction['description'] ?></p>
                            </div>
                            <?php endforeach; ?>

                            <h3>Education:</h3>
                            <!-- Education Item -->
                            <?php foreach($connect_education as $education) : ?>
                            <div class="education">
                                <div class="year"><?= $education['year'] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $education['title'] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $education['value'] ?>%;" aria-valuenow="<?= $education['value'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <!-- End Education Item -->

                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <!-- about-area-end -->

            <!-- Services-area -->
            <?php if($single_service) : ?>
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach($connect_service as $service) : ?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?= $service['icon'] ?>"></i>
								<h3><?= $service['title'] ?></h3>
								<p><?= $service['description'] ?></p>
							</div>
						</div>
                        <?php endforeach; ?>
					</div>
				</div>
			</section>
            <?php endif; ?>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->

            <?php if($single_portfolio) : ?>
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($connect_portfolio as $portfolio) : ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="./images/portfolio/<?= $portfolio['image'] ?>" style="min-height: 300px; border-radius: 10px;" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?= $portfolio['title'] ?></span>
									<h4><a href="portfolio-single.html"><?= $portfolio['sub_title'] ?></a></h4>
									<a href="./dashboard/portfolio-single.php" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <!-- services-area-end -->


            <!-- fact-area -->
            <?php if($single_overview) : ?>
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-8">
                                <div class="section-title text-center mb-70">
                                    <h2>overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <?php foreach($connect_overview as $overview) : ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?= $overview['icon'] ?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?= $overview['number'] ?></span></h2>
                                        <span><?= $overview['title'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <?php if($single_testimonial) : ?>
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                <?php foreach($connect_testimonial as $testimonial) : ?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img style="width: 150px; border-radius: 50%;" src="./images/testimonial/<?= $testimonial['image'] ?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?= $testimonial['message'] ?><span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $testimonial['name'] ?></h5>
                                            <span><?= $testimonial['post'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <?php if($single_brand) : ?>
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php foreach($connect_brand as $brand) : ?>
                        <div class="col-xl-3">
                            <div class="single-brand">
                                <img src="./images/brand/<?= $brand['image'] ?>" alt="img">
                            </div>
                        </div>
                        <?php endforeach; ?>



                    </div>
                </div>
            </div>
            <?php endif; ?>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span>NEW YORK</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span>Event Center park WT 22 New York</li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span>+9 125 645 8654</li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>info@exemple.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact">
                                <form action="mail-submission.php" method="post">
                                    <input type="text" class="form-control mt-3" name="name" placeholder="Your name *" value="<?php 
                                    if(isset($_SESSION['name_value'])) {
                                        echo $_SESSION['name_value'];
                                    } unset($_SESSION['name_value']);
                                    ?>">
                                    <?php if(isset($_SESSION['name_error'])) : ?>
                                    <div class="text-danger"><?= $_SESSION['name_error'] ?></div>
                                    <?php endif; unset($_SESSION['name_error']); ?>

                                    <input type="email" class="form-control mt-3" name="email_to" placeholder="Your email *" value="<?php 
                                    if(isset($_SESSION['email_to_value'])) {
                                        echo $_SESSION['email_to_value'];
                                    } unset($_SESSION['email_to_value']);
                                    ?>">
                                    <?php if(isset($_SESSION['email_to_error'])) : ?>
                                    <div class="text-danger"><?= $_SESSION['email_to_error'] ?></div>
                                    <?php endif; unset($_SESSION['email_to_error']); ?>

                                    <textarea name="message" class="form-control mt-3" id="message" placeholder="Your message *" rows="4"><?php 
                                    if(isset($_SESSION['message_value'])) {
                                        echo $_SESSION['message_value'];
                                    } unset($_SESSION['message_value']);
                                    ?></textarea>
                                    <?php if(isset($_SESSION['message_error'])) : ?>
                                    <div class="text-danger"><?= $_SESSION['message_error'] ?></div>
                                    <?php endif; unset($_SESSION['message_error']); ?>

                                    <button type="submit" name="sender" class="btn btn-success mt-4">SEND</button>

                                    <?php if(isset($_SESSION['send_success'])) : ?>
                                    <div class="text-success text-center mt-4"><?= $_SESSION['send_success'] ?></div>
                                    <?php endif; unset($_SESSION['send_success']); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="./website-assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./website-assets/js/popper.min.js"></script>
        <script src="./website-assets/js/bootstrap.min.js"></script>
        <script src="./website-assets/js/isotope.pkgd.min.js"></script>
        <script src="./website-assets/js/one-page-nav-min.js"></script>
        <script src="./website-assets/js/slick.min.js"></script>
        <script src="./website-assets/js/ajax-form.js"></script>
        <script src="./website-assets/js/wow.min.js"></script>
        <script src="./website-assets/js/aos.js"></script>
        <script src="./website-assets/js/jquery.waypoints.min.js"></script>
        <script src="./website-assets/js/jquery.counterup.min.js"></script>
        <script src="./website-assets/js/jquery.scrollUp.min.js"></script>
        <script src="./website-assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="./website-assets/js/jquery.magnific-popup.min.js"></script>
        <script src="./website-assets/js/plugins.js"></script>
        <script src="./website-assets/js/main.js"></script>
    </body>

</html>
