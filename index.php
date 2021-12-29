<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Document Title -->      
        <title>
            <?php 
                $link=mysqli_connect("localhost","root","","data");
                        $q1=mysqli_query($link,"select * from title");
                        while($res=mysqli_fetch_array($q1))
                        {
                            echo $res['name'];
                         }
             ?>

        </title>
		<script
		src="https://code.jquery.com/jquery-2.2.4.js"
			integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
			crossorigin="anonymous"></script>
		<script src="jquery.fancybox.min.js"></script>
		<link href="jquery.fancybox.min.css" rel="stylesheet"> 
	
        <!-- Metas -->      
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="CaliberThemes" />

        <!-- Favicon -->      
        <link rel="icon" type="image/png" href="images/favicon.png" />

        <!-- Links -->      
		<link rel="stylesheet" type="text/css" href="scroll.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link rel='stylesheet' id='font-awesome-css'  href='css/font-awesome.min.css' type='text/css' media='all' />
        <link rel='stylesheet' id='animsition-css'  href='js/vendor/animsition/css/animsition.min.css' type='text/css' media='all' />
        <link rel='stylesheet' id='owl-carousel-css'  href='js/vendor/owl-carousel2/assets/owl.carousel.min.css' type='text/css' media='all' />
        <link rel='stylesheet' id='iziModal-css'  href='js/vendor/iziModal/css/iziModal.min.css' type='text/css' media='all' />
        <link rel='stylesheet' id='cubeportfolio-css'  href='js/vendor/cubeportfolio/css/cubeportfolio.min.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bootstrap-css'  href='css/bootstrap/bootstrap.min.css' type='text/css' media='all' />
        <link rel='stylesheet' id='main-css'  href='css/style.css' type='text/css' media='all' />

    </head>
    <body>
        <!-- Page Wrapper -->
        <div id="page-wrapper" class="animsition">

            <!-- Header -->
            <header id="header" class="standard transparent sticky pink-accent-hover-color" data-menu-height="79" data-mobile-menu-height="79">
                <div class="header-wrapper">
                    <div class="container">
                        <div class="header-container clearfix">
                            <div id="logo">
                                <a href="#" class="light-logo">
                                    <?php 
                $link=mysqli_connect("localhost","root","","data");
                        $q1=mysqli_query($link,"select * from title");
                        while($res=mysqli_fetch_array($q1))
                        {
                            echo $res['name'];
                         }
             ?>


                                </a>
                                <a href="#" class="dark-logo">
                                    <?php 
                                    $link=mysqli_connect("localhost","root","","data");
                                    $q1=mysqli_query($link,"select * from title");
                                    while($res=mysqli_fetch_array($q1))
                        {
                            echo $res['name'];
                         }
             ?>


                                </a>
                                <a href="#" class="dark-retina-logo">
                                    <?php 
                $link=mysqli_connect("localhost","root","","data");
                        $q1=mysqli_query($link,"select * from title");
                        while($res=mysqli_fetch_array($q1))
                        {
                            echo $res['name'];
                         }
             ?>


                                </a>
                                <a href="#" class="light-retina-logo">
                                   <?php 
                $link=mysqli_connect("localhost","root","","data");
                        $q1=mysqli_query($link,"select * from title");
                        while($res=mysqli_fetch_array($q1))
                        {
                            echo $res['name'];
                         }
             ?>


                                </a>
                                <span id="menu-trigger"><span></span></span>
                            </div>
                            <nav id="main-menu" data-easing="easeInOutExpo" data-speed="1250">
                                <ul>
                                    <li><a href="#home" ><div>Home</div></a></li>
                                    <li><a href="#about" ><div>About</div></a></li>
									<li><a href="#gallery" ><div>Gallery</div></a></li>
									<li><a href="#contact" ><div>Contact</div></a></li>
									<li><a href="#feedback" ><div>Feedback</div></a></li>
                                
								</ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header Ends -->

            <!-- Content Wrapper -->
            <div id="content-wrapper">

                <!-- Main Wrapper -->
                <div id="main-wrapper">

                    <!-- Hero -->
					
                    <div id="home" class="hero-section-wrap hero-slider" data-section="true">
                        <div class="sphere-carousel owl-carousel hero-image-slider" data-navspeed="1000" data-autoplayspeed="1000" data-nav="true" data-dots="true" data-dotsspeed="1000" data-autoplay="true" data-loop="true">
<?php
$con=mysqli_connect("localhost","root","","data");
$q1=mysqli_query($con,"select * from data");
while($res=mysqli_fetch_array($q1))
{
?>
                            <div class="hero-slider-item bg-image" style="background-image:url(<?php echo "admin/uploads/slider/".$res['img'];?>)">
                                <div class="color-overlay"></div>
                                <div class="hero-slider-content">
                                    <h1><?php echo $res['txt']; ?></h1>
                                </div>
                            </div>                        
					<?php
}
?>
	</div>
</div>
                    <!-- Hero Ends -->

                    <!-- About -->
                    <div id="about" data-section="true">
                        <div class="container">
                            <div class="row margin-top-120">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                </div>
                            </div>
                            <div class="row margin-top-80 margin-bottom-80">
                                <?php 
                                    $con=mysqli_connect("localhost","root","","data");
                                    $q1=mysqli_query($con,"select * from about");
                                    while($res=mysqli_fetch_array($q1))
                                    {
                                    ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="icon-box outlined centered">
                                        <div class="icon-wrap">
                                            <i class="fa fa-television pink-accent-color"></i>
                                        </div>
                                        <h3><?php echo $res['title'];?></h3>
                                        <p class="text-center"><?php echo $res['content']; ?></p>
                                    </div>
                                </div>
                                <?php
                                    }
                                    ?>

                                
                            </div>
                        </div>
                    </div>
                    <!-- About Ends -->
					
					
					
					
					<!-- Gallery starts -->
					
					<style>
	
					main{
					width : 80%;
					margin : 0px auto; 
						
					}
					
					.thumbnails{
						width : 20%;
						float : left;
						margin : 25px;
						background : #fff;
						padding : 20px;

					}
					.thumbnails img{
						width : 100%;
						height : auto;
						
					}
					</style>
					<div class="row margin-top-120">
					<main id="gallery">
						<h1><b>Image Gallery</b></h1>
						<?php
						$link=mysqli_connect("localhost","root","","data");
						$q1=mysqli_query($link,"select * from gallery");
						
						while($res=mysqli_fetch_array($q1))
						{
						?>
						<div class="thumbnails">
						<a href="<?php echo "admin/uploads/gallery/".$res['img'];?>" data-fancybox="images" data-caption="My caption">
						<img src=<?php echo "admin/uploads/gallery/".$res['img'];?> style="height:200px ; width:350px" alt="error">
						</a>
						</div>
						
						<?php	
						}	
						
						?>
					</main>
					</div>
					
					
					<!-- Gallery ends -->
					
					<!-- Contact Starts -->
					 <div  data-section="true" class="contact white-bg">
                        <div class="container">
                            <div class="row margin-top-120">
                                <div id="contact" class="col-sm-6 col-sm-offset-3 text-center margin-bottom-55">
                                    <?php 
									$con=mysqli_connect("localhost","root","","data");
									$q1=mysqli_query($con,"select * from contact");
									while($res=mysqli_fetch_array($q1))
									{
									?>
									<h2 class="heading-30 text-center"><?php echo $res['title'];?></h2>
                                    <p class="para-15 text-center">
									<?php echo $res['content']; ?>
									</p>
									<?php
									}
									?>
									</div>
                                <div class="col-md-8 col-md-offset-2 no-padding-left no-padding-right">
                                    <div class="col-sm-6">
                                        <div class="icon-box left-icon">
                                            <div class="icon-wrap"><i class="fa fa-phone-square pink-accent-color"></i></div>
                                            <div class="content-wrap">
                                                <div>PHONE</div>
												
												
												<?php 
												$con=mysqli_connect("localhost","root","","data");
												$q1=mysqli_query($con,"select * from contact_details");
												while($res=mysqli_fetch_array($q1))
												{
												?>
												<h3><?php echo $res['number'];?></h3>
												<?php
												}
												?>
												
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="icon-box left-icon">
                                            <div class="icon-wrap"><i class="fa fa-envelope-square pink-accent-color"></i></div>
                                            <div class="content-wrap">
                                                <div>EMAIL</div>
                                                
												<?php 
												$con=mysqli_connect("localhost","root","","data");
												$q1=mysqli_query($con,"select * from contact_details");
												while($res=mysqli_fetch_array($q1))
												{
												?>
												<h3><?php echo $res['email'];?></h3>
												<?php
												}
												?>
												
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<script>
							function form()
							{
								
								window.location.href="index.php";
							}
							</script>
                            <div class="row margin-bottom-100">
                                <div class="col-md-8 col-md-offset-2 no-padding-left no-padding-right">
                                    <form  method="post" action="contact_save.php" onsubmit="form()"  id="contact-form" class="contact-form text-center margin-top-5" >
                                        <div class="col-sm-6 form-control-wrap">
                                            <input id="name" class="form-control" placeholder="Name*" name="name" type="text">
                                            </div>
                                        <div class="col-sm-6  form-control-wrap">
                                            <input id="Email" class="form-control" placeholder="Email*" name="email" type="email" >
                                            </div>
                                        <div class="col-sm-12 form-control-wrap">
                                            <input id="subject" class="form-control" placeholder="Subject" name="subject" type="text" >
                                        </div>
                                        <div class="col-sm-12 form-control-wrap">
                                            <textarea id="message" class="form-control" placeholder="Your Message*" name="message"  ></textarea>
                                            </div>
                                        <div class="form-submit text-center">
											 <button class="margin-top-20 pink-accent-bg-color" name="submit" type="submit" id="submit">SEND MESSAGE</button>
                                            
                                        </div>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Ends -->
                  
					
					
					
					<!-- feedback Starts -->
					 <div  data-section="true" class="contact white-bg">
                        <div class="container">
                            <div class="row margin-top-120">
                                <div id="feedback" class="col-sm-6 col-sm-offset-3 text-center margin-bottom-55">
                                    <?php 
									$con=mysqli_connect("localhost","root","","data");
									$q1=mysqli_query($con,"select * from feedback");
									while($res=mysqli_fetch_array($q1))
									{
									?>
									<h2 class="heading-30 text-center"><?php echo $res['title'];?></h2>
                                    <p class="para-15 text-center">
									<?php echo $res['content']; ?>
									</p>
									<?php
									}
									?>
									</div>
                                
                            </div>
							
                            <div class="row margin-bottom-100">
                                <div class="col-md-8 col-md-offset-2 no-padding-left no-padding-right">
                                    <form action="feedback_save.php"  method="post"  class="contact-form text-center margin-top-5">
                                        
                                        <div class="col-sm-6 form-control-wrap">
                                            <input id="name" class="form-control" placeholder="Name*" name="f_name" type="text">
                                            </div>
                                        <div class="col-sm-6  form-control-wrap">
                                            <input id="Email" class="form-control" placeholder="Email*" name="f_email" type="email" >
                                          </div>
                                        
                                        <div class="col-sm-12 form-control-wrap">
                                            <textarea id="feedback" class="form-control" placeholder="Your feedback*" name="f_feedback"  ></textarea>
                                           </div>
                                        <div class="form-submit text-center">
                                            <button class="margin-top-20 pink-accent-bg-color" name="submit" type="submit" id="submit">SEND FEEDBACK</button>
                                        </div>
                                        <br>
                                        
                                    </form>
                                </div>
                            </div>
							
						
                        </div>
                    </div>
					 
                    <!-- feedback Ends -->
                  
					
					
                    
        <!--  Scripts -->
        <script src="ckeditor/ckeditor.js"></script>
        <script type='text/javascript' src='js/vendor/jquery-1.12.4.min.js'></script>
        <script type='text/javascript' src='js/vendor/jquery.easing.min.1.3.js'></script>
        <script type='text/javascript' src='js/vendor/jquery.easeScroll.min.js'></script>        
        <script type='text/javascript' src='js/vendor/imagesloaded.pkgd.min.js'></script>            
        <script type='text/javascript' src='js/vendor/animsition/js/animsition.min.js'></script>            
        <script type='text/javascript' src='js/vendor/cubeportfolio/js/jquery.cubeportfolio.min.js'></script>            
        <script type='text/javascript' src='js/vendor/owl-carousel2/owl.carousel.min.js'></script>       
        <script type='text/javascript' src='js/vendor/waypoints.min.js'></script>       
        <script type='text/javascript' src='js/vendor/countUp.min.js'></script>       
        <script type='text/javascript' src='js/vendor/iziModal/js/iziModal.min.js'></script>       
        <script type='text/javascript' src='js/vendor/headhesive.min.js'></script>     
        <script type='text/javascript' src='js/vendor/superfish.js'></script>          
        <script type='text/javascript' src='js/vendor/skrollr.min.js'></script>
        <script type='text/javascript' src='js/main.js'></script>       
        <!--  Scripts Ends -->

    </body>
</html>


