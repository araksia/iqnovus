<?php 
require_once('authenticate.php');
$id = $_GET['id'];
$bearer = getToken();
$home = 'HOME';

if($id && !empty($bearer)){
    $headers = array(
        "Accept: application/json",
        "Authorization: Bearer ".$bearer,
     );

    $url = "BRIGHTIDEA_URL/api3/campaign/".$id;
    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);
    curl_close($curl);
    $camp = json_decode($resp, true);
    $campaign = $camp['campaign'];
    $header = json_decode(json_decode($campaign["homepage_header"],true),true);
    $root= 'BRIGHTIDEA_URL/';



    
}

?>
<!DOCTYPE html>
<html lang="zxx">  
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <title>IQnovus - Demo Api Calls</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <!-- flaticon css -->
        <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="assets/css/off-canvas.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="assets/css/rsmenu-main.css">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="assets/css/rs-spacing.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="style.css"> <!-- This stylesheet dynamically changed from style.less -->
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="defult-home">
        
        <!--Preloader area start here-->
        <div id="loader" class="loader">
            <div class="loader-container"></div>
        </div>
        <!--Preloader area End here--> 
     
		<!-- Main content Start -->
        <div class="main-content">
            
            <!--Full width header Start-->
            <div class="full-width-header">
                <!--Header Start-->
                <header id="rs-header" class="rs-header style3 header-not-transparent">
            
                    <!-- Menu Start -->
                    <div class="menu-area menu-sticky">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="logo-part">
                                        <a href="<?php echo $home;?>">
                                            <img class="normal-logo" src="assets/images/logo.png" alt="logo">  
                                            <img class="sticky-logo" src="assets/images/logo.png" alt="logo">
                                        </a>
                                    </div>
                                    <div class="mobile-menu">
                                        <a href="#" class="rs-menu-toggle rs-menu-toggle-close">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-9 text-right"> 
                                       <div class="rs-menu-area">
                                        <div class="main-menu">
                                            <nav class="rs-menu pr-70 md-pr-0">
                                                <ul id="onepage-menu" class="nav-menu">
                                                    <li> <a href="<?php echo $home;?>">Home</a></li>

                                                </ul> <!-- //.nav-menu -->
                                            </nav>                                     
                                        </div> <!-- //.main-menu -->
                                       
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Menu End -->
                </header>
                <!--Header End-->
                <!-- Canvas Menu start -->
                <nav class="right_menu_togle hidden-md">
                    <div class="close-btn"><span id="nav-close" class="text-center"><i class="fa fa-close"></i></span></div>
                    <div class="canvas-logo">
                        <a href="index.html"><img src="assets/images/logo-dark.png" alt="logo"></a>
                    </div>
                    <div class="offcanvas-text">
                        <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English.</p>
                    </div>
                    <div class="canvas-contact">
                        <h5 class="canvas-contact-title">Contact Info</h5>
                        <ul class="contact">
                            <li><i class="fa fa-globe"></i>Middle Badda, Dhaka, BD</li>
                            <li><i class="fa fa-phone"></i>+123445789</li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:info@yourcompany.com">info@yourcompany.com</a></li>
                            <li><i class="fa fa-clock-o"></i>10:00 AM - 11:30 PM</li>
                        </ul>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Canvas Menu end -->
            </div>
            <!--Full width header End-->
            <?php if(!empty($campaign)){  
           
                        $header = json_decode(json_decode($campaign["homepage_header"],true),true);
                       ?>
            <!-- Banner Section Start -->
            <div class="rs-banner style3 not-transparent pt-100 pb-100" style="background:url('<?php echo $root.$header["bg_image"];?>')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-content">
                               <h1 class="title"><?php echo $header["headline"];?></h1>
                                <p class="desc">
                                <?php echo $header["subline"];?>
                             </p>
                            
                             <ul class="banner-btn">
                                <?php if($header["post_btn_enable"]){ ?>
                                    <li><a class="readon started" href="<?php echo $root.'ct/ct_a_enter_idea.bix?c='.$id;?>" target="blank"><?php echo $header["post_btn_text"];?>
                                </a></li>
                                <?php }?>
                                <?php if($header["browse_btn_enable"]){ ?>
                                    <li><a class="readon started" href="<?php echo $root.'ct/ct_list.bix?c='.$id;?>" target="blank"><?php echo $header["browse_btn_text"];?>
                                </a></li>
                                <?php }?>
                                </ul>
                             

                            </div>
                        </div>
                    </div>
                </div>           
            
            </div>
            <!-- Banner Section End -->
            <?php } ?>
            <!-- Blog Section Start -->
            <div class="rs-inner-blog pt-120 pb-120 md-pt-90 md-pb-90">
                <div class="container">
                    <div class="row">

                                    <div class="blog-item">
                                        <div class="blog-content">
                                            <div class="blog-desc">   
                                                <?php echo $campaign["description"]?>
                                            </div>
                       
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- Blog Section End --> 

        </div> 
        <!-- Main content End -->
     
       <!-- Footer Start -->
       <footer id="rs-footer" class="rs-footer">
            <div class="footer-bottom">
                <div class="container">                    
                    <div class="row y-middle">
                    
                        <div class="col-lg-6">
                            <div class="copyright">
                                <p>&copy; 2022 All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <ul class="footer-social md-mb-30">  
                                  <li> 
                                      <a href="#" target="_blank"><span><i class="fa fa-facebook"></i></span></a> 
                                  </li>
                                  <li> 
                                      <a href="# " target="_blank"><span><i class="fa fa-twitter"></i></span></a> 
                                  </li>

                                  <li> 
                                      <a href="# " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a> 
                                  </li>
                                  <li> 
                                      <a href="# " target="_blank"><span><i class="fa fa-instagram"></i></span></a> 
                                  </li>
                                                                           
                              </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

    
        <!-- modernizr js -->
        <script src="assets/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="assets/js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="assets/js/jquery.nav.js"></script>
        <!-- owl.carousel js -->
        <script src="assets/js/owl.carousel.min.js"></script>
        <!-- wow js -->
        <script src="assets/js/wow.min.js"></script>
         <!-- counter top js -->
        <script src="assets/js/waypoints.min.js"></script>
        <!-- swiper js -->
        <script src="assets/js/swiper.min.js"></script>   
        <!-- particles js -->
        <script src="assets/js/particles.min.js"></script>  

        <!-- main js -->
        <script src="assets/js/main.min.js"></script>

<!-- main js -->
<script src="assets/js/min/main.js"></script>
    </body>
</html>