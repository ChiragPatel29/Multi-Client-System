<!DOCTYPE html>
<?php
session_start();
$flag=1;
if(isset($_SESSION['name']))
{
	$flag=0;
}
if($flag==1)
{
	echo "<script>
	window.location.href='index.php';
	</script>";
}?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="title.php" class="site_title"> <?php 
                $link=mysqli_connect("localhost","root","","data");
                        $q1=mysqli_query($link,"select * from title");
                        while($res=mysqli_fetch_array($q1))
                        {
                            echo $res['name'];
                         }
             ?>

</a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg"  alt="..." class="img-circle profile_img">
              </div>
			  <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php
				$link=mysqli_connect("localhost","root","","data");
				$name=$_SESSION['name'];
				echo $name;
				?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
			<hr>
            <!-- sidebar menu -->
			<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="slider.php"><i class="fa fa-clone"></i>Slider</a></li>
                  <li><a href="about.php"><i class="fa fa-file-text"></i>About</a></li>
                  <li><a href="gallery.php"><i class="fa fa-camera"></i>Gallery</a></li>
                  <li><a><i class="fa fa-phone"></i>Contact<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="contact.php">Title & Content</a></li>
                      <li><a href="contact_detail.php">Contact Form</a></li>
                      <li><a href="contact_data.php">User contact Data</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-envelope"></i>Feedback<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="feedback.php">Title & Content</a></li>
                      <li><a href="feedback_detail.php">User Feedback</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            
			<div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					<center><a href="logout.php"><input type="button" class="btn btn-success" value="Logout" ></a></center>
                </div>
            </div>
            </div>
        </div>
	</div>
