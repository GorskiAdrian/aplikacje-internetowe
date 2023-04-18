<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>

    <style>
		body{
			background-color: #3a3b3c;

		}
		.tab { text-indent: 40px; }
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
        #div1{
            position:absolute;
			width: 60%;
			top:25%;
			left: 20%;
			height:70%;
			border:1px;
			border-radius:5%;
			z-index:2;
			font: italic normal 2vw arial;
			overflow-y:auto;
        }
		#div2{
		position:absolute;
			width: 70%;
			top:20%;
			left: 15%;
			height:75%;
		border:1px;
overflow-y:auto;
border-radius:100px;

box-shadow: black 0.5em 0.5em 0.5em;

z-index:1;

background: linear-gradient(#2a75c4, #1a65c4, #1a64c3, #0a53c2);


		
		}
		
		.container{
	width: 70%;
	height: 50%;
	text-align: center;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	position:absolute;
	left:15%;
	top:10%;
	border-radius:15%;
}
input[type="text"]{
	line-height:2em;
	width: 30%;
	font-size: 50%;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 2%;
	position:absolute;
	left:33.5%;
	top:10%;
	border-radius:15%;
	
}


input[type="password"]{
	line-height:2em;
	width: 30%;
	font-size: 50%;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 2%;
	position:absolute;
	left:33.5%;
	top:30%;
	border-radius:15%;
}

.form-input::before{
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 40px;
	position: absolute;
	font-size: 35px;
	color: #2980b9; 
}


.btn-reg{
	height:5vh;
	width:7.5vw;
	padding: 1.5% 2.5%;
	border: none;
	background-color: #27ae60;
	font-size:0.5em;
	color: #fff;
	position:absolute;
	left:41%;
	top:55%;
	cursor: pointer;
	border-radius:15%;
}
.btn-log{
	height:5vh;
	width:7.5vw;
	padding: 1.5% 2.5%;
	border: none;
	background-color: #3366ff;
	font-size:0.5em;
	color: #fff;
	position:absolute;
	left:41%;
	top:75%;
	cursor: pointer;
	border-radius:15%;
}
    </style>
</head>
<body>
<div id="divmenu"><ul id="menu">
<li><a href="..\index.php">Strona główna</a></li>
<li><a href="..\Memory\lekcja3_v2.php">Memory</a></li>
<li><a href="..\Puzzle\lekcja5.php">Puzzle</a></li>
<li><a href="..\Bounce\lekcja6.php">Bounce</a></li>
<li><a href="..\Kontakt\kontakt.php">Kontakt</a></li>
<li><a href="..\Zaloguj\zaloguj.php">Zaloguj się</a></li>
</ul>
</div>
<div id="div1">
<div class="container">
		<form method="POST" action="registration.php">
			<div class="form-input">
				<input type="text" name="login" placeholder="Login"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Hasło"/>
			</div>
			<button type="submit" class="btn-reg">Rejestracja</button>
			<br>
			<button type="submit" class="btn-log" formaction="login.php">Logowanie</button>
		</form>
	</div>
<?php if(isset($_SESSION['failedpass'])){
if($_SESSION['failedpass']==1)
{
echo '<script language="javascript">';
echo 'alert("Niepoprawne hasło.")';
echo '</script>';
}
}
if(isset($_SESSION['failedregister'])){
	if($_SESSION['failedregister']==1)
	{
		echo '<script language="javascript">';
		echo 'alert("Nazwa użytkownika jest już zajęta.")';
		echo '</script>';
	}
}
if(isset($_SESSION['registersucceed'])){
	if($_SESSION['registersucceed']==1)
	{
		echo '<script language="javascript">';
		echo 'alert("Rejestracja się powiodła.")';
		echo '</script>';
	}
}
if(isset($_SESSION['empty'])){
	if($_SESSION['empty']==1)
	{
		echo '<script language="javascript">';
		echo 'alert("W celu rejestracji należy wypełnic oba pola.")';
		echo '</script>';
	}
}
$_SESSION['empty']=0;
$_SESSION['registersucceed']=0;
$_SESSION['failedregister']=0;
$_SESSION['failedpass']=0;
?>
</div>
<div id="div2"></div>
</body>
</html>