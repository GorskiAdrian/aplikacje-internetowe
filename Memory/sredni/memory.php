<?php


session_start()

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
<style>
		body
		{
			background-color: #3a3b3c;
		}
		#divmenu
		{
			background-color:red; 
			width:70%;
			height:5%;
			left:15%;
			top:5%;
			position:absolute;
			color:white;
			box-shadow: black 0.5em 0.5em 0.5em;
			padding: 1% 0px 0px 0px;
		}
		#menu
		{
			font: italic bold 2.5vmin verdena;
			padding:0px;
			margin:0px;
		}
		#menu li
		{
			text-align:center;
			float:left;
			display:block;
			width:16.6%;
			
		}
		#menu li ul
		{
			
			width:none;
			display:none;
			position:absolute;
			padding:0px;
		}
		a
		{
			text-decoration:none;
			color:white;
		}
		a:hover
		{
		transition-duration:0.3s;
		text-decoration:none;
		color:#ff9900;
		}
		#bt
		{
			font: italic bold 2.5vmin verdena;
			height:5vh;
			width:10vw;
		}
		div {position:absolute;}
		.mini {border:black 1px solid; height:147px; width:147px;}
		.mini:hover {border:red 2px solid;}
		img {height:13vmin;width:13vmin;}
		#w{position:absolute;top:30%;left:80%; font: italic bold 2.5vmin verdena;}
		#result{position:absolute;top:30%;left:84%;font: italic bold 2.5vmin verdena;}
		#rekord{position:absolute;top:35%;left:80%;font: italic bold 2.5vmin verdena;}
</style>
<script>

var wynik=0,kafelki=18;
    var TabId=['a00','a01','a02','a03','a04','a05','a10','a11','a12','a13','a14','a15','a20','a21','a22','a23','a24','a25','a30','a31','a32','a33','a34','a35','a40','a41','a42','a43','a44','a45','a50','a51','a52','a53','a54','a55'];
    var TabImg=['obrazek1','obrazek2','obrazek2','obrazek1','obrazek3','obrazek4','obrazek4','obrazek3','obrazek5','obrazek6','obrazek6','obrazek5','obrazek7','obrazek8','obrazek8','obrazek7','obrazek9','obrazek10','obrazek10','obrazek9','obrazek11','obrazek12','obrazek11','obrazek12','obrazek13','obrazek14','obrazek14','obrazek13','obrazek15','obrazek16','obrazek16','obrazek15','obrazek17','obrazek18','obrazek18','obrazek17'];
function Zakryj(){
    for(var i=0;i<36;i++){
        document.getElementById(TabId[i]).innerHTML="<img src='znak.jpg'>";
    }
    }
function odkryj(x){
    for(var i=0;i<36;i++)
        if(x==document.getElementById(TabId[i])){
		
        x.innerHTML="<img src="+TabImg[i]+".jpg>";
		}
    
}
function Generator(){

            var num=6,newdiv,divIdName;
            for(var i=0;i<num;i++)for(var j=0;j<num;j++)
            {
					newdiv = document.createElement('div');
					divIdName='a'+i+j;
					newdiv.setAttribute('id',divIdName);
					newdiv.style.top=12+12*i+'vmin';
					newdiv.style.left=12+12*j+'vmin';
					newdiv.addEventListener('click',function(){graj(this);});
					document.body.appendChild(newdiv);
            }
			mieszaj();
        }
var p=0,one;
function graj(x)
/// dodaj generator do tworzenia planszy
{
	if(p==0)
	{
		Zakryj();
		odkryj(x);
		p=1;
		one=x;
	}
	else
	{
		odkryj(x);
		if(x.id!=one.id){
		if(x.innerHTML==one.innerHTML && x.id !== one.id){
		x.style.visibility="hidden"; one.style.visibility="hidden";
		wynik=wynik+1;
		kafelki--;
		document.getElementById("result").innerHTML=wynik;
		
        }
		else
		{
		wynik=wynik+1;
		document.getElementById("result").innerHTML=wynik;
			setTimeout(function(){Zakryj()},500);
		}
		
		p=0;
		}
	}
	if(kafelki==0)
	{
		document.getElementById("wynik").value = wynik;
		document.getElementById("wyslij_wynik").submit();
	}
}
var TabPos=[[27.5,15],[35,15],[42.5,15],[50,15],[57.5,15],[65,15],[27.5,29],[35,29],[42.5,29],[50,29],[57.5,29],[65,29],[27.5,43],[35,43],[42.5,43],[50,43],[57.5,43],[65,43],[27.5,57],[35,57],[42.5,57],[50,57],[57.5,57],[65,57],[65,71],[27.5,71],[35,71],[42.5,71],[50,71],[57.5,71],[27.5,85],[35,85],[42.5,85],[50,85],[57.5,85],[65,85]];
function mieszaj(){
    var i=0, x;
	var check=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
	Zakryj();
    while(i<36){
        x=Math.floor(Math.random()*36);
		if(check[x]==0)
		{
        document.getElementById(TabId[i]).style.left=TabPos[x][0]+'%';
        document.getElementById(TabId[i]).style.top=TabPos[x][1]+'%';
		document.getElementById(TabId[i]).style.visibility="visible";
        i++;
		check[x]=1;
		}
    }
	wynik=0;
	p=0;
	kafelki=18;
	document.getElementById("result").innerHTML=wynik;
}
</script>
</head>
<body onload='Generator()'>
<div id="divmenu"><ul id="menu"><li><a href="..\..\index.php">Strona główna</a></li>
<li><a href="..\..\Memory\lekcja3_v2.php">Memory</a></li>
<li><a href="..\..\Puzzle\lekcja5.php">Puzzle</a></li>
<li><a href="..\..\Bounce\lekcja6.php">Bounce</a></li>
<li><a href="..\..\Kontakt\kontakt.php">Kontakt</a></li>
<li><?php if(!isset($_SESSION['username'])){ echo '<a href="..\..\Zaloguj\zaloguj.php">Zaloguj się</a>';}
else {
	echo '<a href="..\..\Zaloguj\logout.php">Wyloguj się</a>';
}
?></li>
</ul>
<form style="position:absolute;top:17vh;left:64.5vw;">
    <input type="button" id="bt" value="Graj ponownie" onclick="mieszaj()">
</form>
</div>
<div id="ekran"></div>
<h1>
<form method="POST" action="submit.php" id="wyslij_wynik">
<input type="hidden" id="wynik" name="wynik"/>
<div id="w">Ruchy: </div>
<div id="result">0</div>
</h1>
<h1 id="rekord"><?php if(isset($_SESSION['username'])){
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'ed_games');
	$s="select min(sredni_wynik) as record from memory where userLogin='{$_SESSION['username']}'";
	$result=mysqli_query($con,$s);
	$row=$result->fetch_object();
	if(isset($row->record)){
		echo 'Rekord: ',$row->record;}
} ?></h1>
</body>
</html>
