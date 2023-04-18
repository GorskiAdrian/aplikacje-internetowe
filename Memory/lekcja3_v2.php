<?php

session_start();
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory</title>
    <style>
        body {
            background-color: #3a3b3c;
        }

        .tab {
            text-indent: 40px;
        }

        #divmenu {
            background-color: red;
            width: 70%;
            height: 5%;
            left: 15%;
            top: 5%;
            position: absolute;
            color: white;
            box-shadow: black 0.5em 0.5em 0.5em;
            padding: 1% 0px 0px 0px;
        }

        #menu {
            font: italic bold 2.5vmin verdena;
            padding: 0px;
            margin: 0px;

        }

        #menu li {
            text-align: center;
            float: left;
            display: block;
            width: 16.6%;

        }

        #menu li ul {

            width: none;
            display: none;
            position: absolute;
            padding: 0px;
        }

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            transition-duration: 0.3s;
            text-decoration: none;
            color: gray;
        }

        #div1 {
            position: absolute;
            width: 60%;
            top: 25%;
            left: 20%;
            height: 70%;
            border: 1px;
            border-radius: 5%;
            z-index: 2;
            font: italic normal 2vw arial;
			overflow-y:auto;
        }

        #div2 {
            position: absolute;
            width: 70%;
            top: 20%;
            left: 15%;
            height: 75%;
            border: 1px;

            border-radius: 100px;

            box-shadow: black 0.5em 0.5em 0.5em;

            z-index: 1;
overflow-y:auto;
           background: linear-gradient(#2a75c4, #1a65c4, #1a64c3, #0a53c2);

            

        }

    </style>
    <link rel="stylesheet" href="level.css">
</head>
<body onload='Generator()'>
<div id="divmenu">
    <ul id="menu">
        <li><a href="..\index.php">Strona główna</a></li>
        <li><a href="..\Memory\lekcja3_v2.php">Memory</a></li>
        <li><a href="..\Puzzle\lekcja5.php">Puzzle</a></li>
        <li><a href="..\Bounce\lekcja6.php">Bounce</a></li>
        <li><a href="..\Kontakt\kontakt.php">Kontakt</a></li>
        <li><?php if (!isset($_SESSION['username'])) {
                echo '<a href="..\Zaloguj\zaloguj.php">Zaloguj się</a>';
            } else {
                echo '<a href="..\Zaloguj\logout.php">Wyloguj się</a>';
            }
            ?></li>
    </ul>
</div>
<div id="div1"><p class="tab">Gra memory polega na odkrywaniu zdjęć zwierząt w celu dobrania ich do pary w jak
        najmniejszej ilości ruchów. Pomaga ona w ćwiczeniu pamięci. </p>
    <p class="tab">Dostępne są trzy poziomy trudności. Różnią się one ilością par do odszukania. Po naciśnięciu na jeden
        z poniższych poziomów zostaniecie na niego przeniesieni.</p>
    
    <p class="levelChoice" style="font-weight: bold">Wybierz poziom trudności</p>

    <a href="latwy\memory.php">
        <button class="levelButton" style="left: 0%; background: #27ae60"><p class="levelText">łatwy</p></button>
    </a>
    <a href="sredni\memory.php">
        <button class="levelButton" style="left: 37%; background: #ff9900"><p class="levelText">średni</p></button>
    </a>
    <a href="trudny\memory.php">
        <button class="levelButton" style="right: 0%; background: crimson"><p class="levelText">trudny</p></button>
    </a>

</div>
<div id="div2"></div>
</body>
</html>