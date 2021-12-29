<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$id=$_GET['id'];
$q1=mysqli_query($link,"delete from feedback_data where id='$id'");
if($q1)
{
	echo "<script>
	window.location.href='feedback_detail.php' ;
	</script>" ;
}
else
{
	echo "Error";
}
?>