<!doctype html>
<html lang="en">
<?php $page = 'Home'; ?>
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
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="about?page=About Us">About Us</a></li>
                    <li><a href="houses?page=Houses">Houses</a></li>
                    <li><a href="contact?page=Contact Us">Contact Us</a></li>
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
                    <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">Detective-Inspired House Hunt!</h1>
                    <div id="typewriter"></div>
                    <a href="" class="btn btn-primary" data-aos="fade-up" data-aos-delay="200"> Get Started</a>
                </div>

            </div>
            <div class="hero_img" data-aos="fade-up" data-aos-delay="300">
                <img src="../Public/Landing/images/10297015_4387144.png" alt="Image" class="img-fluid">
            </div>
        </div>
        <div class="slant" style="background-image: url('../Public/Landing/images/slant.svg');"></div>
    </div>

    <div class="features-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="section-title col-lg-7" data-aos="fade-up" data-aos-delay="0">
                    <strong class="subtitle d-block">House Features</strong>
                    <h2 class="heading font-weight-bold">Top House</h2>

                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="media-entry h-100">
                        <a href="#" style="background-image: url('../Public/Landing/images/pexels-binyamin-mellish-1396122.jpg')"></a>
                        <div class="bg-white m-body">
                            <span class="date">May 14, 2020</span>
                            <h3><a href="#">Cozy Cottage</a></h3>
                            <h6>House type:Cottage</h6>
                            <h6>House Location:</h6>
                            <h6>House Rent:</h6>
                            <p>This charming and cozy cottage offers a warm and inviting atmosphere. It features a quaint design, comfortable living spaces, and a peaceful ambiance, perfect for those seeking a retreat-like setting.</p>
                            <a href="#" class="more d-flex align-items-center float-right">
                                <span class="label">Read More</span>
                                <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="media-entry h-100">
                        <a href="#" style="background-image: url('../Public/Landing/images/pexels-binyamin-mellish-1396132.jpg')"></a>
                        <div class="bg-white m-body">
                            <span class="date">May 14, 2020</span>
                            <h3><a href="#">Modern Marvel</a></h3>
                            <h6>House type:Modern Home</h6>
                            <h6>House Location:</h6>
                            <h6>House Rent:</h6>
                            <p>Step into the future with this modern marvel. This house boasts sleek lines, contemporary architecture, and cutting-edge amenities. It is designed for those who appreciate the latest trends and technology.</p>
                            <a href="#" class="more d-flex align-items-center float-right">
                                <span class="label">Read More</span>
                                <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="media-entry h-100">
                        <a href="#" style="background-image: url('../Public/Landing/images/pexels-clay-elliot-5524165.jpg')"></a>
                        <div class="bg-white m-body">
                            <span class="date">May 14, 2020</span>
                            <h3><a href="#">Tranquil Haven</a></h3>
                            <h6>House type:Haven</h6>
                            <h6>House Location:</h6>
                            <h6>House Rent:</h6>
                            <p>Experience tranquility in this haven-like home. Surrounded by nature or tucked away in a quiet neighborhood, this house offers a serene escape from the hustle and bustle of everyday life</p>
                            <a href="#" class="more d-flex align-items-center float-right">
                                <span class="label">Read More</span>
                                <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="media-entry h-100">
                        <a href="#" style="background-image: url('../Public/Landing/images/pexels-clay-elliot-5524265.jpg')"></a>
                        <div class="bg-white m-body">
                            <span class="date">May 14, 2020</span>
                            <h3><a href="#">Serene Sanctuary</a></h3>
                            <h6>House type:Sanctuary</h6>
                            <h6>House Location:</h6>
                            <h6>House Rent:</h6>
                            <p> Find peace and serenity in this sanctuary. With its calming ambiance, beautiful landscaping, and harmonious design, this home provides a tranquil space to relax and unwind.</p>
                            <a href="#" class="more d-flex align-items-center float-right">
                                <span class="label">Read More</span>
                                <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-section">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 mb-5 section-title" data-aos="fade-up" data-aos-delay="0">
                    <strong class="subtitle d-block">Join Now</strong>
                    <h2 class="mb-4 font-weight-bold heading">Join More Than <strong>90,000+</strong> Amazing People Loves Our Product</h2>
                    <p class="mb-4">House Hunt offers various marketing tools and features to showcase the listed property effectively. This includes high-quality photos, detailed descriptions, virtual tours, and interactive features, enabling house owners to present their property in the best possible light and attract more attention. </p>
                    <p><a href="sign_up?page=sign up" class="btn btn-primary">Join</a></p>
                </div>
                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial--wrap">
                        <div class="owl-single owl-carousel no-dots no-nav">
                            
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="photo mr-3">
                                        <img src="../Public/Landing/images/pexels-nathan-cowley-1300402.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="author">
                                        <cite class="d-block mb-0">John Smith</cite>
                                        <span>Owner, Sunnyville, Inc.</span>
                                    </div>
                                </div>
                                <blockquote>
                                    <p>&ldquo;Joining House Hunt was the best decision I made when selling my house&rdquo;</p>
                                </blockquote>
                            </div>
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="photo mr-3">
                                        <img src="../Public/Landing/images/pexels-yogendra-singh-4511649.jpg" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="author">
                                        <cite class="d-block mb-0">Jane Smith</cite>
                                        <span>Owner, Greenland, Inc.</span>
                                    </div>
                                </div>
                                <blockquote>
                                    <p>&ldquo;As a house owner, I found House Hunt to be a game-changer.&rdquo;</p>
                                </blockquote>
                            </div>
                        </div>
                        <div class="custom-nav-wrap">
                            <a href="#" class="custom-owl-prev"><span class="icon-keyboard_backspace"></span></a>
                            <a href="#" class="custom-owl-next"><span class="icon-keyboard_backspace"></span></a>
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
                                    <li><a href="#">Home</a></li>
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
    <script type="text/javascript">
        const instance = new Typewriter('#typewriter', {
            strings: ['<p class="text-white mb-4" id="headline" data-aos="fade-up" data-aos-delay="100">Search, Giggle, and Book Your Dream House with House Hunt.Start Your Giggle-Filled House Hunt Now!</p>'],
            autoStart: true,
            loop: true,
        });
    </script>
</body>

</html>