<?php
require_once('authenticate.php');
$bearer = getToken();
$root= 'BRIGHTIDEA_URL';
$campaignurl = 'HOME/campaign.php?id=';
$home = 'HOME';

if (!empty($bearer)){

$authorization = "Bearer ".$bearer;
$campaigns = [];
$urls = array("CAMPAIGN_ID", "CAMPAIGN_ID");
foreach ($urls as &$value) {
$url = "BRIGHTIDEA_URL/api3/campaign/".$value;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer ".$bearer,
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$camp = json_decode($resp, true);
array_push($campaigns, $camp['campaign']);
}
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
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
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
                <header id="rs-header" class="rs-header style3 header-transparent">
    
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
                                                    <li> <a href="#rs-header">Home</a></li>
                                                    <li><a href="#rs-projects">Projects</a></li>
                                                    <li><a href="#rs-how">Get Started</a></li>
                                                    <li><a href="#rs-community">Community</a></li>
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
        
            </div>
            <!--Full width header End-->
         
            <!-- Banner Section Start -->
            <div class="rs-banner style3 pt-100 pb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banner-content">
                               <div class="sub-title">Innovation Center</div>
                               <h1 class="title">Transform the way we innovate</h1>
                                <p class="desc">
                                    Welcome to your headquarters. a dynamic network of collaborating peers. Help stimilate our company's evolution by reviewing the latest innovation challenges. submittin your most viable solutions, and working with the community to develop your best ideas.
                                </p>
                                <ul class="banner-btn">
                                    <li><a class="readon started" href="about.html">Get Started</a></li>
                       
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>           
                <img class="d-none d-md-block images-part" src="assets/images/banner-3.png" alt="">
            </div>
            <!-- Banner Section End -->
                   <!-- Project Section Start -->
        <?php if(!empty($campaigns)){ ?> 
            <div class="rs-project style3 pt-120 pb-120 md-pt-75 md-pb-80" id="rs-projects">
                <div class="container-fluid">
                    <div class="sec-title2 text-center mb-45">
                        <span class="sub-text" >Involved</span>
                        <h2 class="title title2">
                        Explore Our Challenges
                        </h2>
                    </div>
                    
                    <div class="rs-carousel owl-carousel" data-loop="false" data-items="2" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="true" data-nav="true" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="true" data-ipad-device-dots2="false" data-md-device="2" data-md-device-nav="true" data-md-device-dots="true">
                  
                     <?php  foreach ($campaigns as &$value) {
                        $header = json_decode(json_decode($value["homepage_header"],true),true);
                       ?>
                      
                    <div class="project-item">
                    <a href="<?php echo $campaignurl.$value['id']; ?>"> 
                            <div class="project-img">
                            <img src="<?php echo $root.$header["bg_image"];?>"/>
                            </div>
                            <div class="project-content">
                                <div class="portfolio-inner">
                                    <h3 class="title">  <?php echo $header["headline"]; ?></h3>
                                 
                                </div>
                            </div>
                           </a>
                        </div>
                    
                        <?php } ?>
                        
                    </div>
                   
                </div>
            </div>
            <?php } ?>
            <!-- Project Section End --> 
			            <!-- Process Section Start -->
            <div  id="rs-how">
              <div class="rs-process modify1 pt-160 pb-120 md-pt-75 md-pb-80">
                  <div class="shape-animation">
                      <div class="shape-process">
                          <img class="dance2" src="assets/images/circle.png" alt="images">
                      </div>
                  </div>
                  <div class="container">
                      <div class="row align-items-center">
                          <div class="col-lg-4 pr-40 md-pr-15 md-pb-80">
                              <div class="process-wrap md-center">
                                  <div class="sec-title mb-30">
                                      <div class="sub-text new">Working Process</div>
                                      <h2 class="title white-color" >
                                         How to get started
                                      </h2>
                                  </div>
                                  <div class="btn-part mt-40">
                                      <a class="readon started" href="#">Contact Us</a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-8 sm-pl-40 sm-pr-20">
                              <div class="row">
                                  <div class="col-md-6 mb-70">
                                      <div class="rs-addon-number">
                                          <div class="number-text">
                                              <div class="number-area">
                                                  1
                                              </div>
                                              <div class="number-title">
                                                  <h3 class="title"> Find and update your profile</h3>
                                              </div>
                                              <p class="number-txt"> Fill out your profile and be recognized for your contibutions.</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mb-70">
                                      <div class="rs-addon-number">
                                          <div class="number-text">
                                              <div class="number-area green-bg">
                                                  2
                                              </div>
                                              <div class="number-title">
                                                  <h3 class="title">Lear how it works</h3>
                                              </div>
                                              <p class="number-txt">Find out more aboute your essential role in the innovation process.</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6 sm-mb-70">
                                      <div class="rs-addon-number">
                                          <div class="number-text">
                                              <div class="number-area plum-bg">
                                                  3
                                              </div>
                                              <div class="number-title">
                                                  <h3 class="title">Start innovate</h3>
                                              </div>
                                              <p class="number-txt">Peruse current initiative topics and submit your most inspired solutions.</p>
                                          </div>
                                      </div>
                                  </div>
                              
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Process Section End -->
            <!-- Services Section Start -->
            <div class="rs-services style3 pt-110 pb-120 md-pt-75 md-pb-80" id="rs-community">
                <div class="container">
                    <div class="sec-title2 text-center mb-45">
                        <span class="sub-text">ecosystem</span>
                        <h2 class="title testi-title" >
                           Our Community 
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-20">
                           <div class="services-item">
    
                               <div class="services-content">
							                                <div class="serial-number">
                                        +23
                                    </div>
                                   <div class="services-text">
                                       <h3 class="title"><a href="software-development.html">Startups</a></h3>
                                   </div>
                                   <div class="services-desc">
                                       <p>
                                            At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio  data center for managing database.
                                       </p>
                                   </div>
                                
                               </div>
                           </div> 
                        </div>
                        <div class="col-lg-4 col-md-6 mb-20">
                           <div class="services-item pink-bg">
                            
                               <div class="services-content">
							      <div class="serial-number">
                                       +45
                                    </div>
                                   <div class="services-text">
                                       <h3 class="title"><a href="web-development.html">Companies</a></h3>
                                   </div>
                                   <div class="services-desc">
                                       <p>
                                            At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio  data center for managing database.
                                       </p>
                                   </div>
                                
                               </div>
                           </div> 
                        </div>
                        <div class="col-lg-4 col-md-6 mb-20">
                           <div class="services-item aqua-bg">
                               <div class="services-content">
							                      <div class="serial-number">
                                        +24 
                                    </div>
                                   <div class="services-text">
                                       <h3 class="title"><a href="analytic-solutions.html">Universities</a></h3>
                                   </div>
                                   <div class="services-desc">
                                       <p>
                                            At vero eos et accusamus etiusto odio praesentium accusamus etiusto odio  data center for managing database.
                                       </p>
                                   </div>
                
                               </div>
                           </div> 
                        </div>
       
                    </div>
                </div>
            </div>
            <!-- Services Section End -->
 

         
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
 
    </body>
</html>