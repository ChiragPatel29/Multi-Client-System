<?php
$link=mysqli_connect("localhost","root","","data");
$name=$_REQUEST['f_name'];
$email=$_REQUEST['f_email'];
$message=$_REQUEST['f_feedback'];
$q1=mysqli_query($link,"insert into feedback_data values('0','$name','$email','$message')");
if($q1)
{
	echo "<script> 
	window.location.href='index.php';
	</script>";	
}
?>