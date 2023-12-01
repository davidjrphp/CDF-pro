<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Constituency Development Fund - CDF</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .logo,
        .featured-circle {
            margin-right: 400px;
            color: purple;
            font-weight: bold;
        }

        /* Customize the size of the carousel container */
        #cdfCarousel {
            max-width: 100%;
        }

        #cdfCarousel .carousel-inner .carousel-item img {
            width: 100%;
            height: 500px;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex justify-content-center align-items-center header-transparent">

        <nav id="navbar" class="navbar">
            <div class="system-logo logo">
                <h2 class="logo"><i class='bx bxl-jquery'></i>CDF</h2>
            </div>
            <ul>
                <li><a class="nav-link scrollto active" style="font-size: 20px" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" style="font-size: 20px" href="#comments">FAQs</a></li>
                <li class="dropdown"><a href="#" style="font-size: 20px"><span>About CDF</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#services">CDF Allocation</a></li>
                        <li><a href="#teams">Role Players</a></li>
                        <li><a href="#projects">CDF Projects</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" style="font-size: 20px" href="#footer">Contact</a></li>
            </ul>
            <div class="d-flex align-items-center ">
                <ul>
                    <li class="dropdown"><a href="#" style="font-size: 20px"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="./users/login.php">Client</a></li>
                            <li><a href="./admin/login.php">Staff</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">

            <h1>Welcome!</h1><br><span>
                <h2>To Constituency Development Fund (CDF) <span> Online Service Site</span></h2>
            </span>
            <p class="para" style="color: #ccc">
                Local Council advertises invitations for empowerment grant submissions. Grant application form for
                youth,women & community empowerment.
            </p>
            <a href="#about" class="btn-scroll scrollto" title="Scroll Down"><i class="bx bx-chevron-down"></i></a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <?= html_entity_decode(file_get_contents("about.html")) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
        <hr>
        <!-- ======= Projects Section ======= -->
        <section id="projects" class="projects">
            <div class="container">
                <div class="section-title">
                    <span>CDF Projects</span>
                </div>

                <div id="cdfCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Add your carousel items here -->
                        <div class="carousel-item active">
                            <img src="assets/img/school-under-construction.jpg" class="d-block w-100" alt="Project 1">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/STUDENTS-1.jpg" class="d-block w-100" alt="Project 5">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/vehicles.jpg" class="d-block w-100" alt="Project 2">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/Generic-image-of-Road-Construction-.jpg" class="d-block w-100" alt="Project 3">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/school-under-construction.jpg" class="d-block w-100" alt="Project 4">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/cruiser.jpg" class="d-block w-100" alt="Project 3">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/desks.jpg" class="d-block w-100" alt="Project 4">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/img/CDF-Lusaka.webp" class="d-block w-100" alt="Project 4">
                        </div>
                    </div>

                    <!-- Add carousel controls -->
                    <a class="carousel-control-prev" href="#cdfCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#cdfCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section><!-- End Projects Section -->
        <hr>
        <!-- ======= My Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <span>CDF Allocation</span>

                </div>

                <div class="row">

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">CDF Grants </a></h4>
                            <p class="description">Mostly given to students, Pupils, people living with disability the vulnearble etc. </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">CDF Loans</a></h4>
                            <p class="description">These payable are loans within a specified less interest givien to business persons </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Community Projects</a></h4>
                            <p class="description">These payable are loans within a specified less interest givien to business persons </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Youth & Women Empowerment</a></h4>
                            <p class="description">These payable are loans within a specified less interest givien to business persons </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4 class="title"><a href="">Secondary School & Skills Development</a></h4>
                            <p class="description">These payable are loans within a specified less interest givien to business persons </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End of Services Section -->

        <!-- ======= Teams Section ======= -->
        <section id="teams" class="teams">
            <div class="container position-relative">
                <div class="section-title">
                    <span>Role Players</span>

                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="team-item">
                                <img src="assets/img/teams/dmi.jpg" class="team-img" alt="">
                                <h3>Citizens</h3>
                                <!-- <h4>Ceo</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    BSc.CS
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p> -->
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="team-item">
                                <img src="assets/img/teams/dmi.jpg" class="team-img" alt="">
                                <h3>Ward Development Committee</h3>
                                <!-- <h4>Developer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    Web Developer
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p> -->
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="team-item">
                                <img src="assets/img/teams/dmi.jpg" class="team-img" alt="">
                                <h3>CDF Committee</h3>
                                <!-- <h4>IT Spelcialist</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    BSc.CS
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p> -->
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="team-item">
                                <img src="assets/img/teams/dmi.jpg" class="team-img" alt="">
                                <h3>Technical Appraisal Committe</h3>
                                <!-- <h4>Developer</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    BSc.CS
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p> -->
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="team-item">
                                <img src="assets/img/teams/dmi.jpg" class="team-img" alt="">
                                <h3>Local Authorities (Council)</h3>
                                <!-- <h4>Entrepreneur</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    BSc.CS
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p> -->
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="team-item">
                                <img src="assets/img/teams/dmi.jpg" class="team-img" alt="">
                                <h3>Provincial Local Government</h3>
                                <!-- <h4>Entrepreneur</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    BSc.CS
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p> -->
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="team-item">
                                <img src="assets/img/teams/dmi.jpg" class="team-img" alt="">
                                <h3>Ministry of Local Government</h3>
                                <!-- <h4>Entrepreneur</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    BSc.CS
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p> -->
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="team-item">
                                <img src="assets/img/teams/dmi.jpg" class="team-img" alt="">
                                <h3>Ministry of Finace and National Planning</h3>
                                <!-- <h4>Entrepreneur</h4>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    BSc.CS
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p> -->
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="system-logo logo">
                <h2 class="logo"><i class='bx bxl-jquery'></i>CDF</h2>
            </div>
            <h3>Consituency Development Fund - CDF</h3>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <?php echo date('Y'); ?><strong>&nbsp; <span></span></strong>
            </div>
            <div class="credits">
                Designed by <a href="">Chileshe Bwalya</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Include Bootstrap CSS and JS (Make sure to include this before the closing </body> tag) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        // Activate the carousel and set interval
        $(document).ready(function() {
            $('#cdfCarousel').carousel({
                interval: 3000 // Set the interval time in milliseconds (e.g., 3000 for 3 seconds)
            });
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>