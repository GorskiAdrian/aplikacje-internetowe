<?php 

session_start();


$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'ed_games');

$name=$_POST['login'];
$pass=$_POST['password'];
if(empty($pass) || empty($name))
{
	$_SESSION['empty']=1;
	header('location: http://localhost/inz/Zaloguj/zaloguj.php');
}
else{
$pass = password_hash($pass, PASSWORD_DEFAULT);
$s="select * from user where login='$name'";

$result=mysqli_query($con,$s);

$num=mysqli_num_rows($result);



if($num==0)
{
	$reg="insert into user(login,password) values ('$name','$pass')";
	mysqli_query($con,$reg);
	$_SESSION['registersucceed']=1;
	header('location: http://localhost/inz/Zaloguj/zaloguj.php');
	
}
else{
	$_SESSION['failedregister']=1;
	header('location: http://localhost/inz/Zaloguj/zaloguj.php');
}

}

?>