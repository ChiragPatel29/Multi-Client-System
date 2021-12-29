<?php
$link=mysqli_connect("localhost","root","","data");
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$subject=$_REQUEST['subject'];
$message=$_REQUEST['message'];
$q1=mysqli_query($link,"insert into contact_data values('0','$name','$email','$subject','$message')");
if($q1)
{
	echo "<script> 
	window.location.href='index.php';
	</script>";	
}
?>