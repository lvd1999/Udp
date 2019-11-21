<?php
include_once 'model/database.php';
// include_once 'assets/conn/server.php';
if (!isset($login_password)) {
    $login_password = '';
}
if (!isset($login_pps)) {
    $login_pps = '';
}
?>
<h1>123</h1>
<!-- login -->
<!-- check session -->
<?php
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dr.Book</title>
        <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
        <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
        <link href="Content/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="Content/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Content/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="Content/css/style.css" rel="stylesheet" type="text/css"/>
        <!-- =======================================================
          Theme Name: Medilab
          Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
          Author: BootstrapMade.com
          Author URL: https://bootstrapmade.com
        ======================================================= -->
    </head>

    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
        <!--banner-->
        <section id="banner" class="banner">
            <div class="bg-color">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><img src="content/img/logo.png" class="img-responsive" style="width: 40px; margin-top: -12px;"></a>
                                <a id="navlogoname" class="navbar-brand" href="#">Dr.Book</a>
                            </div>
                            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#banner">Home</a></li>
                                    <li class=""><a href="#service">Services</a></li>
                                    <li class=""><a href="#about">About</a></li>
                                    <li class=""><a href="view/signUp.php">Sign Up</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <div class="row">
                        <div class="banner-info">
                            <div class="banner-text text-center">
                                <h1 class="white">Healthcare at your desk!!</h1>
                                <p>We aim to be the leading healthcare provider in Europe that integrates technology in <br>healthcare, improving health services accessibility.</p>

                                <div id="loginarea" class="row">
                                    <h3 id="loginheader">Login into Dr.Book</h3>
                                    <div id="logininner" class="col-md-12">

                                        <form action="controller/loginout/signIn.php" id="loginform" class="form" method="POST" accept-charset="UTF-8" >

                                            <div class="form-group">
                                                <label class="sr-only" for="login_pps">PPS Number</label>
                                                <input type="text" class="form-control" name="login_pps" placeholder="PPS Number" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" class="form-control" name="login_password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="login" id="login" class="btn btn-primary btn-block">
                                                    Sign In
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="overlay-detail text-center">
                                <a href="#service"><i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ banner-->
        <!--service-->

        <!--/ service-->
        <!--cta-->
        <section id="service" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="schedule-tab">
                        <div class="col-md-4 col-sm-4 bor-left">
                            <div class="mt-boxy-color"></div>
                            <div class="medi-info">
                                <h3>Emergency Case</h3>
                                <p>I am text block. Edit this text from Appearance / Customize / Homepage header columns. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                <a href="#" class="medi-info-btn">READ MORE</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="medi-info">
                                <h3>Emergency Case</h3>
                                <p>I am text block. Edit this text from Appearance / Customize / Homepage header columns. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                                <a href="#" class="medi-info-btn">READ MORE</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 mt-boxy-3">
                            <div class="mt-boxy-color"></div>
                            <div class="time-info">
                                <h3>Opening Hours</h3>
                                <table style="margin: 8px 0px 0px;" border="1">
                                    <tbody>
                                        <tr>
                                            <td>Monday - Friday</td>
                                            <td>8.00 - 17.00</td>
                                        </tr>
                                        <tr>
                                            <td>Saturday</td>
                                            <td>9.30 - 17.30</td>
                                        </tr>
                                        <tr>
                                            <td>Sunday</td>
                                            <td>9.30 - 15.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--cta-->
        <!--about-->
        <section id="about" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="section-title">
                            <h2 class="head-title lg-line">The Medilap <br>Ultimate Dream</h2>
                            <hr class="botm-line">
                            <p class="sec-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                            <a href="" style="color: #0cb8b6; padding-top:10px;">Know more..</a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-12">
                        <div style="visibility: visible;" class="col-sm-9 more-features-box">
                            <div class="more-features-box-text">
                                <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
                                <div class="more-features-box-text-description">
                                    <h3>It's something important you want to know.</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.</p>
                                </div>
                            </div>
                            <div class="more-features-box-text">
                                <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
                                <div class="more-features-box-text-description">
                                    <h3>It's something important you want to know.</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ about-->
        <!--doctor team-->
        <section id="doctor-team" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="ser-title">Meet Our Doctors!</h2>
                        <hr class="botm-line">
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                            <img src="img/doctor1.jpg" alt="..." class="team-img">
                            <div class="caption">
                                <h3>Jessica Wally</h3>
                                <p>Doctor</p>
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                            <img src="img/doctor2.jpg" alt="..." class="team-img">
                            <div class="caption">
                                <h3>Iai Donas</h3>
                                <p>Doctor</p>
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                            <img src="img/doctor3.jpg" alt="..." class="team-img">
                            <div class="caption">
                                <h3>Amanda Denyl</h3>
                                <p>Doctor</p>
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="thumbnail">
                            <img src="img/doctor4.jpg" alt="..." class="team-img">
                            <div class="caption">
                                <h3>Jason Davis</h3>
                                <p>Doctor</p>
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ doctor team-->
        <!--cta 2-->
        <section id="cta-2" class="section-padding">
            <div class="container">
                <div class=" row">
                    <div class="col-md-2"></div>
                    <div class="text-right-md col-md-4 col-sm-4">
                        <h2 class="section-title white lg-line">« A few words<br> about us »</h2>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a typek
                        <p class="text-right text-primary"><i>— Medilap Healthcare</i></p>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>
        <!--cta-->
        <!--contact-->
        <section id="contact" class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="ser-title">Contact us</h2>
                        <hr class="botm-line">
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3>Contact Info</h3>
                        <div class="space"></div>
                        <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>321 Awesome Street<br> New York, NY 17022</p>
                        <div class="space"></div>
                        <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@companyname.com</p>
                        <div class="space"></div>
                        <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+1 800 123 1234</p>
                    </div>
                    <div class="col-md-8 col-sm-8 marb20">
                        <div class="contact-info">
                            <h3 class="cnt-ttl">Having Any Query! Or Book an appointment</h3>
                            <div class="space"></div>
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>
                            <form action="" method="post" role="form" class="contactForm">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control br-radius-zero" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>

                                <div class="form-action">
                                    <button type="submit" class="btn btn-form">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ contact-->
        <?php include 'view/footer.php'; ?>

        <script src="Content/js/jquery.min.js" type="text/javascript"></script>
        <script src="Content/js/jquery.easing.min.js" type="text/javascript"></script>
        <script src="../Content/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="Content/js/custom.js" type="text/javascript"></script>
        <script src="Content/js/contactform.js" type="text/javascript"></script>

    </body>

</html>
