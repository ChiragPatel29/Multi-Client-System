<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$id=$_GET['id'];
$q1=mysqli_query($link,"delete from contact_data where id='$id'");
if($q1)
{
	echo "<script>
	window.location.href='contact_data.php' ;
	</script>" ;
}
else
{
	echo "Error";
}
?>