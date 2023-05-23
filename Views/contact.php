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
                    <li><a href="about?page=About Us">About Us</a></li>
                    <li><a href="houses?page=Houses">Houses</a></li>
                    <li class="active"><a href="contact?page=Contact Us">Contact Us</a></li>
                </ul>
                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right menu-absolute">
                    <li class="cta-button"><a href="" target="_blank">Login</a></li>
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
                    <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">Get Intouch</h1>
                    <p class="text-white mb-4" id="headline" data-aos="fade-up" data-aos-delay="100">We're thrilled that you want to get in touch with us. Have a question, a suggestion, or just want to share a good joke? We'd love to hear from you!

Contacting us is as easy as pie. Just fill out the form below with your details and your message, and we'll get back to you faster than you can say "abracadabra." Our team of wizards is always ready to assist you..</p>

                </div>

            </div>
            <div class="hero_img" data-aos="fade-up" data-aos-delay="300">
                <img src="../Public/Landing/images/10297015_4387144.png" alt="Image" class="img-fluid">
            </div>
        </div>
        <div class="slant" style="background-image: url('../Public/Landing/images/slant.svg');"></div>
    </div>
    <div class="container py-5">
<div class="row justify-content-center">
<div class="col-lg-6 order-lg-2 mb-5 mb-lg-0">
<div class="section-title mb-5">
<strong class="subtitle" data-aos="fade-up" data-aos-delay="0">Contact Us</strong>

</div>
<form class="contact-form">
<div class="row">
<div class="col-6">
<div class="form-group">
<label class="text-black" for="fname">First name</label>
<input type="text" class="form-control" id="fname">
</div>
</div>
<div class="col-6">
<div class="form-group">
<label class="text-black" for="lname">Last name</label>
<input type="text" class="form-control" id="lname">
</div>
</div>
</div>
<div class="form-group">
<label class="text-black" for="email">Email address</label>
<input type="email" class="form-control" id="email">
</div>
<div class="form-group">
<label class="text-black" for="message">Message</label>
<textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
</div>
<button type="submit" class="btn btn-primary">Send Message</button>
</form>
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