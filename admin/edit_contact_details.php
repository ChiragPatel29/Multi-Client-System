<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$number=$_POST['number'];
$email=$_POST['email'];
$q1=mysqli_query($link,"delete  from contact_details");
$q2=mysqli_query($link,"insert into contact_details values('$number','$email')");
if($q2)
{
	echo "<script>
	window.location.href='contact_detail.php' ;
	</script>" ;
}
else{
	echo "hello";
}
?>