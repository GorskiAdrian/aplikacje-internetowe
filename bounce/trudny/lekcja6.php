<?php


session_start()

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bounce</title>
    <style>
	  body{
			background-color: #3a3b3c;
		}
		#divmenu{
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
		#menu{
			font: italic bold 2.5vmin verdena;
			padding:0px;
			margin:0px;
			
		}
		#menu li{
			text-align:center;
			float:left;
			display:block;
			width:16.6%;
			
		}
		#menu li ul{
			
		width:none;
		display:none;
		position:absolute;
		padding:0px;
		}
		a{
		text-decoration:none;
		color:white;
		}
		a:hover{
		transition-duration:0.3s;
		text-decoration:none;
		color:#ff9900;
		}
	 /* #zycia{position:absolute;top:100px;left:50px; font: italic bold 2.5vmin verdena;}*/
	  #result{position:absolute;top:15%;left:15%;font: italic bold 2.5vmin verdena;}
	  #reset{position:absolute;top:15%;left:25%;font: italic bold 2.5vmin verdena;}
     #i1 {position:absolute;top:20%; height:5%;width:5%;}
      #a1 {position:absolute;left:47.5%;bottom:1%;width:5%;height:1%;border:1px solid black;background-color:red;}
	  #rekord{position:absolute;top:17%;left:15%;font: italic bold 2.5vmin verdena;}
    </style>
    <script>
		var xx,yy,id1,k=1,l=1,wynik=0,zycia=1,spr=0,j=1,pierwszeodbicie=0;
		document.addEventListener('keydown',keyDown);
		function startA()
		{
      
      xx=document.documentElement.clientWidth-0.1*document.documentElement.clientWidth;
      yy=document.documentElement.clientHeight-0.1*document.documentElement.clientHeight;
      i1.style.left=xx+"%";
	  i1.style.top=yy+"%";
      id1=setInterval("gs()",5);
    }
    var x=0.475*document.documentElement.clientWidth,stepSize=document.documentElement.clientWidth*0.01,test;
    function keyDown(e)
    {
	if(e.keyCode===32) reset();
	  test=a1.style.left;
	  test=parseInt(test,10);
      if(e.keyCode===37){
		if(test>15){
		x-=stepSize;
		}
	  }
      if(e.keyCode===39) if(test<document.documentElement.clientWidth-document.getElementById("a1").clientWidth*1.2)x+=stepSize;
      a1.style.left=x+"px";
    }
    ///Dodaj wynik,3 zycia, losowy kat odbicia(?)
    function gs()
    {
	if(zycia!=0){
      xx-=2*k*j; yy-=2*l;
      if(xx<0)k=-1; 
	  if(yy<0)
	  {
		l=-1;
		pierwszeodbicie=1;
		/*j=Math.random()*2;
		console.log(j);*/
	  }
      if(xx>document.documentElement.clientWidth-document.getElementById("i1").clientWidth*1.01) 
	  {
			k=1;
	  }
      if(yy>document.documentElement.clientHeight*0.997-document.getElementById("i1").clientHeight&&pierwszeodbicie==1)
	  {
		l=1;
		zycia-=1;
		/*document.getElementById("zycia").innerHTML="Zycia: "+zycia;*/
	  }
      if(i1.offsetLeft+document.getElementById("i1").clientWidth>a1.offsetLeft&&i1.offsetLeft<a1.offsetLeft+document.getElementById("a1").clientWidth)
      {

        if(i1.offsetTop+document.getElementById("i1").clientHeight==a1.offsetTop)
        {
          l=1;
          wynik+=1;
          document.getElementById("result").innerHTML="Wynik: "+Math.trunc(wynik/2);
        }
      }
      i1.style.left=xx+"px";
      i1.style.top=yy+"px";
	  }
	  if(zycia==0)
	  {
		if(spr==0){
		spr=1;
		document.getElementById("wynik").value = wynik/2;
		document.getElementById("wyslij_wynik").submit();	
		}
		
	  }
    }
	function reset()
	{
		
		wynik=0;
		document.getElementById("result").innerHTML="Wynik: "+wynik;
		zycia=1;
		/*document.getElementById("zycia").innerHTML="Zycia: "+zycia;*/
		spr=0;
		k=1;
		l=1;
		j=1;
		pierwszeodbicie=0;
		x=0.475*document.documentElement.clientWidth;
		a1.style.left=x+"px";
		clearInterval(id1);
		startA();
	}
    </script>
</head>
<body>
<div id="divmenu"><ul id="menu">
<li><a href="..\..\index.php">Strona główna</a></li>
<li><a href="..\..\Memory\lekcja3_v2.php">Memory</a></li>
<li><a href="..\..\Puzzle\lekcja5.php">Puzzle</a></li>
<li><a href="..\..\Bounce\lekcja6.php">Bounce</a></li>
<li><a href="..\..\Kontakt\kontakt.php">Kontakt</a></li>
<li><?php if(!isset($_SESSION['username'])){ echo '<a href="..\..\Zaloguj\zaloguj.php">Zaloguj się</a>';}
else {
	echo '<a href="..\..\Zaloguj\logout.php">Wyloguj się</a>';
}
?></li>
<form method="POST" action="submit.php" id="wyslij_wynik">
<input type="hidden" id="wynik" name="wynik"/>
</ul></div>
  <div id="result">Wynik: 0</div>
  <!--<div id="zycia">Zycia: 3</div>-->
  <!--<button id="reset" onclick="reset()">Zagraj</button>-->
  <div id="a1"></div>
  <div id="i1"><img src="pilka.png" height="100%";width="100%";></div>
  <h1 id="rekord"><?php if(isset($_SESSION['username'])){
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'ed_games');
	$s="select max(trudny_wynik) as record from bounce where userLogin='{$_SESSION['username']}'";
	$result=mysqli_query($con,$s);
	$row=$result->fetch_object();
	if(isset($row->record)){
		echo 'Rekord: ',$row->record;}
} ?></h1>
</body>
</html>
