<?php
session_start();
$link=mysqli_connect("localhost","root","","data");
$name=$_POST['name'];
$password=$_POST['password'];
$_SESSION['name']=$name;
//$password=md5($password);
$flag=1;
$q1=mysqli_query($link,"select * from users");
while($res=mysqli_fetch_array($q1))
{
	if($name!='' && $password!='')
	{	
		if($name==$res['name'] && $password==$res['password'])
		{
			echo "<script>
				alert('login successful.');
				window.location.href='slider.php';
		</script>";
			$flag=0;
			break;
		}
	}
}
if($flag==1)
{
	echo "<script>
			alert('Invalid username or password.');
			window.location.href='login.html';
	</script>";
}
?>