<?php
session_start();
$wynik=$_POST['wynik'];

$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'ed_games');
$reg="insert into puzzle(wynik,userLogin) values ('$wynik','{$_SESSION['username']}')";
if(isset($_SESSION['username'])){
mysqli_query($con,$reg);}
header('location: http://localhost/inz/Puzzle/lekcja5.php')


?>