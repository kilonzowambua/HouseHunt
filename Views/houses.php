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
                    <li class="active"><a href="houses?page=Houses">Houses</a></li>
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
                    <h1 class="text-white font-weight-bold mb-4" data-aos="fade-up" data-aos-delay="0">Houses </h1>
                    <p class="text-white mb-4" id="headline" data-aos="fade-up" data-aos-delay="100">Welcome to the Houses page on House Hunt, your gateway to discovering the perfect home for you. Whether you're in search of a cozy cottage, a modern marvel, or a tranquil haven, this is where your house hunting adventure begins.

                        Explore an extensive selection of real estate listings and uncover a world of possibilities. Our user-friendly platform makes it easy to navigate through the available houses, filter the options to match your preferences, and find the ideal property that meets your unique needs..</p>

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
                    <h2 class="heading font-weight-bold">Top House</h2>
                </div>
            </div>
            <form>
                <div class="mb-4">

                    <h3 class="heading font-weight-bold">Filter</h3>
                    <div class="row">
                        <div class="form-group col-md-4 col-lg-4 col-sm-12">
                            <label for="exampleFormControlSelect1">House Type</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Cottage</option>
                                <option>Modern Home</option>
                                <option>Haven</option>
                                <option>Sanctuary</option>

                            </select>
                        </div>
                        <div class="form-group col-md-4 col-lg-4 col-sm-12">
                            <label for="exampleFormControlSelect1">House location</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Nairobi</option>
                                <option>Kisumu</option>
                                <option>Machakos</option>

                            </select>
                        </div>
                        <div class="form-group col-md-4 col-lg-4 col-sm-12">
                            <label for="exampleFormControlSelect1">Price Range</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1000-20000</option>
                                <option>20001-30000</option>

                            </select>
                        </div>
                    </div>

                    <div class="d-flex align-items-end justify-content-center ">
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <form>
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