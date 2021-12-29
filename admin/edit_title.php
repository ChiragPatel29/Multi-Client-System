<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$name=$_POST['title'];
$q1=mysqli_query($link,"delete  from title");
$q2=mysqli_query($link,"insert into title values('$name')");
if($q2)
{
	echo "<script>
	window.location.href='title.php' ;
	</script>" ;
}
else{
	echo "hello";
}
?>