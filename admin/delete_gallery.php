<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$id=$_GET['id'];
$q2=mysqli_query($link,"select img from gallery where id='$id'");
$filename;
		while($res=mysqli_fetch_array($q2))
		{
						$filename= $res['img'];

		}
		$file="uploads/gallery/".$filename;
		unlink($file);
$q1=mysqli_query($link,"delete from gallery where id='$id'");
if($q1)
{
	echo "<script>
	window.location.href='gallery.php' ;
	</script>" ;
}
else
{
	echo "Error";
}

?>