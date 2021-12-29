<?php
$link=mysqli_connect("localhost","root","","data");
$title=$_POST['title'];
$content=$_POST['text'];
$q1=mysqli_query($link,"insert into about values('$title','$content','0')");
if($q1)
{
	echo "<script>
	window.location.href='about.php';
	</script>" ;
}
?>