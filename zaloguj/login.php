<?php 

session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'ed_games');

$name=$_POST['login'];
$pass=$_POST['password'];
$s="select * from user where login='$name'";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);
if($num==1)
{
	$s=mysqli_fetch_object($result);
	$hashed_pass=$s->password;
	if(password_verify($pass,$hashed_pass)) {
		$_SESSION['username']=$name;
		header('location: http://localhost/inz/index.php');
	}
	else
	{
		$_SESSION['failedpass']=1;
		header('location: http://localhost/inz/Zaloguj/zaloguj.php');
	}
}
else{
	$_SESSION['failedpass']=1;
	header('location: http://localhost/inz/Zaloguj/zaloguj.php');
}



?>