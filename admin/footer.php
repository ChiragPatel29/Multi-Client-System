<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
 
	<title>login</title>
	<style type="text/css">
	p{
	font-size:15px;
	}
	body{
	background-color:#fff;
	}
	</style>
   </head>
   <body>
   	<div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
			<form name="login_form" action="login.php" method="post">
			<h1>Login Form</h1>
	 	
			<div>
			<input type="text" placeholder="Username" name="name" id="name" class="form-control" required="">
			</div>
		
			<div>
			<input type="password" placeholder="Password" name="password" id="password" class="form-control" required="">
			</div>
		
		
		
			<br><input type="submit" value="Login" name="login" class="btn btn-success">
		
		
		
		
            <p class="change_link">New to site?
            <a href="update.html" class="to_register"> Create Account </a>
            </p><br>
				
			<hr>	
	

			</form>
			</section>
	 <hr>
	 	</div>
</div>
 </body>
</html>