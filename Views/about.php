<!doctype html>
<html lang="en">
<?php $page = $_GET['page'] ?>
<?php include('../Partial/landing/head.php'); ?>

<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <a href="#" class="logo">House Hunt</a>
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu">
                    <li><a href="index">Home</a></li>
                    <li class="active"><a href="about?page=About Us">About Us</a></li>
                    <li><a href="houses?page=Houses">Houses</a></li>
                    <li><a href="contact?page=Contact Us">Contact Us</a></li>
                </ul>
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right menu-absolute">
                    <li class="cta-button"><a href="sign_in?page=Login" target="_blank">Login</a></li>
                </ul>
                <a href="#" class="burger light ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </nav>
    <div class="hero">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 intro">
                    <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">About Us </h1>
                    <p class="text-white mb-4" id="headline" data-aos="fade-up" data-aos-delay="100">At House Hunt, we understand that searching for a house can be an exciting yet daunting process. That's why we've created a user-friendly platform that streamlines the house hunting experience, making it easier and more enjoyable for you to find the perfect place to call home.</p>

                </div>

            </div>
            <div class="hero_img" data-aos="fade-up" data-aos-delay="300">
                <img src="../Public/Landing/images/10297015_4387144.png" alt="Image" class="img-fluid">
            </div>
        </div>
        <div class="slant" style="background-image: url('../Public/Landing/images/slant.svg');"></div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="0">
                <div class="custom-block" data-aos="fade-up">
                    <h2 class="section-title">History</h2>
                    <div class="custom-accordion" id="history">
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseHistory" aria-expanded="true" aria-controls="collapseOne">Read</button>
                            </h2>
                            <div id="collapseHistory" class="collapse show" aria-labelledby="headingOne" data-parent="#history">
                                <div class="accordion-body">
                                House Hunt was founded in 2023 by a team of passionate individuals with a shared vision of revolutionizing the way people search for homes. It began as a small project, driven by the belief that the house hunting process could be made more enjoyable and efficient. Over the years, House Hunt has grown into a trusted and popular online platform, serving thousands of users in their quest to find their dream homes.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="custom-block" data-aos="fade-up">
                        <h2 class="section-title">Vision</h2>
                        <div class="custom-accordion" id="vision">
                            <div class="accordion-item">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseVision" aria-expanded="true" aria-controls="collapseOne">Read</button>
                                </h2>
                                <div id="collapseVision" class="collapse show" aria-labelledby="headingOne" data-parent="#vision">
                                    <div class="accordion-body">
                                    Our vision is to become the go-to destination for individuals looking to find their dream homes. We envision House Hunt as a leading online platform that not only connects buyers and sellers but also fosters a sense of community and fun throughout the house hunting process. We aim to continuously innovate and improve our services, leveraging the latest technologies and trends to provide an exceptional and memorable experience for our users. Our ultimate goal is to make the journey of finding a home a joyful and successful one for everyone involved.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="0">
                        <div class="custom-block" data-aos="fade-up">
                            <h2 class="section-title">Mission</h2>
                            <div class="custom-accordion" id="mission">
                                <div class="accordion-item">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseMission" aria-expanded="true" aria-controls="collapseOne">Read</button>
                                    </h2>
                                    <div id="collapseMission" class="collapse show" aria-labelledby="headingOne" data-parent="#mission">
                                        <div class="accordion-body">
                                        Our mission at House Hunt is to empower individuals in their search for the perfect home. We strive to provide a user-friendly platform that offers a wide selection of real estate listings, advanced search tools, and comprehensive information to help our users make informed decisions. We are committed to delivering a delightful and personalized experience, ensuring that every step of the house hunting journey is exciting and enjoyable.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
                
                        <div class="site-footer">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4">
                                        <div class="widget">
                                            <h3>About</h3>
                                            <p>House Hunt is an online platform or website designed to help individuals search for and find their ideal homes. It provides a centralized database of real estate listings, allowing users to browse through a wide range of properties such as houses, apartments, condos, and more.</p>
                                        </div>
                                        <div class="widget">
                                            <h3>Connect with us</h3>
                                            <ul class="social list-unstyled">
                                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                                <li><a href="#"><span class="icon-dribbble"></span></a></li>
                                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="widget">
                                                    <h3>Navigations</h3>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-4">
                                                <div class="widget">
                                                    <ul class="links list-unstyled">
                                                        <li><a href="index">Home</a></li>
                                                        <li><a href="about?page=About Us">About Us</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-4">
                                                <div class="widget">
                                                    <ul class="links list-unstyled">

                                                        <li><a href="#">Contact</a></li>
                                                        <li><a href="#">Privacy</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-4">
                                                <div class="widget">
                                                    <ul class="links list-unstyled">
                                                        <li><a href="#">Privacy</a></li>
                                                        <li><a href="#">FAQ</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center text-center copyright">
                                    <div class="col-md-8">
                                        <p>

                                            Copyright &copy;<script>
                                                document.write(new Date().getFullYear());
                                            </script> All rights reserved | House Hunt project is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href=" https://kilonzowambua.github.io" target="_blank">Antony Kilonzo Wambua</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="overlayer"></div>
                        <div class="loader">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                        <?php include('../Partial/landing/script.php'); ?>

</body>

</html>