<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$title=$_POST['title'];
$content=$_POST['content'];
$q1=mysqli_query($link,"delete  from feedback where '1'= '1'");
$q2=mysqli_query($link,"insert into feedback values('$title','$content')");
if($q2)
{
	echo "<script>
	window.location.href='feedback.php' ;
	</script>" ;
}
?>