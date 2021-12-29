<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$title=$_POST['title'];
$content=$_POST['content'];
$q1=mysqli_query($link,"update about set title='$title' , content='$content' where id='$id'");
if($q1)
{
	echo "<script>
	window.location.href='about.php' ;
	</script>" ;
}
else
{
	echo "Error";
}
?>