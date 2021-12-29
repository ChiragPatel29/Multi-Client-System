<?php
session_start();
$id=$_SESSION['slider_id'];
$link=mysqli_connect("localhost","root","","data");
$title=$_POST['title'];
$content=$_POST['text'];
$q2=mysqli_query($link,"update about set title='$title' , content='$content' where id='$id'");
if($q2)
{
	echo "<script>
	window.location.href='about.php' ;
	</script>" ;
}
?>


<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$image=$_POST['image'];
$txt=$_POST['text'];
$img=addslashes($image);
$img=str_replace('\\','/',$img);
$img=str_replace('//','/',$img);
$id=$_SESSION['slider_id'];

$q1=mysqli_query($link,"update data set img='$img' , txt='$txt' where id='$id'");
if($q1)
{
	echo "<script>
	window.location.href='slider.php' ;
	</script>" ;
}
else
{
	echo "Error";
}
?>