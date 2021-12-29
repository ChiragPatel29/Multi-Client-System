<?php
$link=mysqli_connect("localhost","root","","data");
$name=$_POST['name'];
$password=$_POST['password'];
$pass=$password;
$q1=mysqli_query($link,"select * from users");
$flag=0;
while($res=mysqli_fetch_array($q1))
{
	if($name==$res['name'])
	{
		echo "<script>
			alert('User already exist.');
			window.location.href='update.html';
		</script>";
		$flag=1;
		break;
	}
}
if($flag==0)
{
	$q2=mysqli_query($link,"insert into users (name,password) values('$name','$pass')");
	if($q2)
	{
		echo "<script>
				alert('User added successfully.');
				window.location.href='index.php';
		</script>";
	}
	else
	{
		echo "<script>
				alert('User already exist .');
				window.location.href='update.html';
		</script>";
	}
}
?>