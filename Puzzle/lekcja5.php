<?php


session_start()

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puzzle</title>
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
        div{position:absolute;width:10vmin;height:10vmin;border:1px solid black;}
        div img{width:100%;height:100%;}
		#licznik{
		font:3.5vmin verdena;
		}
		#bt{
font-size:3.5vmin;
height:auto;
width:auto;

top:125%;
left:0%;
position:absolute;
}
#rekord{position:absolute;top:65vmin;left:20vmin;border:0px; width:20vmin;font:3.5vmin verdena;}
    </style>
    <script>
		var TabId=['a00','a01','a02','a03','a10','a11','a12','a13','a20','a21','a22','a23','a30','a31','a32'];
		var TabPos=[[20,20],[20,30],[20,40],[20,50],[30,20],[30,30],[30,40],[30,50],[40,20],[40,30],[40,40],[40,50],[50,20],[50,30],[50,40]];
		var newdiv,licznik=0,obr=0,wyg=0;
		function mieszaj()
		{
			var i=0,x;
			var check=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
			while(i<15)
			{
				x=Math.floor(Math.random()*16);
				if(check[x]==0)
				{
					document.getElementById(TabId[i]).style.left=TabPos[x][0]+'vmin';
					document.getElementById(TabId[i]).style.top=TabPos[x][1]+'vmin';
					i++;
					check[x]=1;
				}
			}
			document.getElementById("a33").innerHTML="";
			document.getElementById("a33").style.left=50+'vmin';
			document.getElementById("a33").style.top=50+'vmin';
			document.getElementById("a33").style.border="1px solid red";
			licznik=0;
			document.getElementById("licznik").innerHTML="Liczba ruchow: "+licznik;
		}
        function Generator(){

            var num=4,divIdName,k;
            for(var i=0;i<num;i++)for(var j=0;j<num;j++)
            {
				if(k!=0)
				{
					newdiv = document.createElement('div');
					divIdName='a'+i+j;
					newdiv.setAttribute('id',divIdName);
					newdiv.style.top=20+10*i+'vmin';
					newdiv.style.left=20+10*j+'vmin';
					if(i*j!=9)
					newdiv.innerHTML="<img src='slice_"+i+"_"+j+".jpg'>";
					newdiv.addEventListener('click',function(){graj(this);});
					document.body.appendChild(newdiv);
				}
				else
				k=1;
            }
			k=1;
			mieszaj();
        }
        function graj(x)
        {
            var bufor,a,b;
            if(x.style.top==a33.style.top)
            {
				a=parseFloat(x.style.left);
				b=parseFloat(a33.style.left);
				if(a-b==10||a-b==-10){
                bufor=x.style.left;
                x.style.left=a33.style.left;
                a33.style.left=bufor;
				licznik+=1;
				document.getElementById("licznik").innerHTML="Liczba ruchow: "+licznik;
				}
            }
            if(x.style.left==a33.style.left)
            {
				a=parseFloat(x.style.top);
				b=parseFloat(a33.style.top);
				if(a-b==10||a-b==-10){
                bufor=x.style.top;
                x.style.top=a33.style.top;
                a33.style.top=bufor;
				licznik+=1;
				document.getElementById("licznik").innerHTML="Liczba ruchow: "+licznik;
				
            }
        }
		spr();
		}
		function spr()
		{
			var i=0;
			while(i<15)
			{
			console.log(i);
				if(document.getElementById(TabId[i]).style.left==TabPos[i][1]+'vmin'&&document.getElementById(TabId[i]).style.top==TabPos[i][0]+'vmin')
				{
					sprawdz=1;
				
				}
				else
				{
					sprawdz=0;
					break;
				
				}
				i++;
			}
			if(sprawdz==1)
			{
				document.getElementById("wynik").value = licznik;
				document.getElementById("wyslij_wynik").submit();
			}
			
		
		
		}
		
		function zmiana(x)
		{
			var num=4;
			if(x.innerHTML=='<img style="width:40vmin;height:40vmin;" src="podglad1.jpg">')
			{
				if(obr==1)
				{
					for(var i=0;i<num;i++)for(var j=0;j<num;j++)
					{
						if(i*j!=9)
							document.getElementById("a"+i+j).innerHTML="<img src='slice_"+i+"_"+j+".jpg'>";
						licznik=0;
						document.getElementById("licznik").innerHTML="Liczba ruchow: "+licznik;
					}
					obr=0;
					mieszaj();
				}
			}
			else if(x.innerHTML=='<img style="width:40vmin;height:40vmin;" src="podglad2.jpg">')
			{
				if(obr==0)
				{
					for(var i=0;i<num;i++)for(var j=0;j<num;j++)
					{
						if(i*j!=9)
							document.getElementById("a"+i+j).innerHTML="<img src='gory_"+i+"_"+j+".jpg'>";
						licznik=0;
						document.getElementById("licznik").innerHTML="Liczba ruchow: "+licznik;
					}
					obr=1;
					mieszaj();
				}
			}
			
			
		
		}
		
		
    </script>
</head>
<body onload='Generator()'>
<div id="divmenu"><ul id="menu">
<li><a href="..\index.php">Strona główna</a></li>
<li><a href="..\Memory\lekcja3_v2.php">Memory</a></li>
<li><a href="..\Puzzle\lekcja5.php">Puzzle</a></li>
<li><a href="..\Bounce\lekcja6.php">Bounce</a></li>
<li><a href="..\Kontakt\kontakt.php">Kontakt</a></li>
<li><?php if(!isset($_SESSION['username'])){ echo '<a href="..\Zaloguj\zaloguj.php">Zaloguj się</a>';}
else {
	echo '<a href="..\Zaloguj\logout.php">Wyloguj się</a>';
}
?></li>
<form method="POST" action="submit.php" id="wyslij_wynik">
<input type="hidden" id="wynik" name="wynik"/>
</ul></div>
    <input type="button" value="Graj" onclick="mieszaj()" id="bt">
	<div id="podglad1" style="position:absolute;top:20vmin;left:70vmin;width:40vmin;height:40vmin;" onclick="zmiana(this)" ><img style="width:40vmin;height:40vmin;" src="podglad1.jpg"></div>
	<div id="podglad2" style="position:absolute;top:20vmin;left:120vmin;width:40vmin;height:40vmin;" onclick="zmiana(this)" ><img style="width:40vmin;height:40vmin;" src="podglad2.jpg"></div>
	<div id="licznik" style="position:absolute;top:60vmin;left:20vmin;border:0px; width:35vmin;">Liczba ruchow: </div>
	<div id="rekord"><?php if(isset($_SESSION['username'])){
	$con=mysqli_connect('localhost','root','');
	mysqli_select_db($con,'ed_games');
	$s="select min(wynik) as record from puzzle where userLogin='{$_SESSION['username']}'";
	$result=mysqli_query($con,$s);
	$row=$result->fetch_object();
	if(isset($row->record)){
		echo 'Rekord: ',$row->record;}
} ?></div>
</body>
</html>