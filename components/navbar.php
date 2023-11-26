<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <title>navbarcomponent</title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Karla&display=swap');

        body{
            z-index: 1000;
        }
        
        nav {
            background-color: black;
            overflow: hidden;
            margin: 0px 0px 30px 0px;
            font-family: 'Karla', sans-serif;
        }

        nav ul{
            display: flex;
            list-style: none;
            padding: 0px;
            flex-wrap: wrap;
        }

        nav ul li{
            margin: 20px 0px 20px 0px;
            flex: 1;
            min-width: 150px;
            
        }

        nav ul li a{
            padding: 10px;
            background-color: black;
            color: white;
            text-decoration: none;
            font-size: 2.5vh;
            margin-left: 10px;
            text-align: center;
            border-radius: 10px;
            transition: 0.3s linear all;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .log-in{
            margin-left: auto;
            margin-right: 10px;
            flex: 0 0 auto;
            padding-left: 280px;
        }

        .log-out{
            margin-left: auto;
            padding-left: 150px;
            margin-right: 10px;
            color: gray;
            flex: 0 0 auto;
        }
        .log-out a{
            color: red;
        }

        nav ul li a:hover{
            background-color: rgb(255, 255, 255);
            color: black;
        }

        
        .log-out a:hover{
            transition: 0.1s linear;
            background-color: red;
            color: white;
        }

        @media screen and (max-width: 600px) {
            nav ul li {
                margin: 10px 0px 10px 0px;
            }
        }
    </style>

</head>
<body>
    
    <nav>
        <ul>
            <li><a href="../PHP/index.php">Pagina Principal</a></li>
            <li><a href="../PHP/team_registration_form.php">Registrar Equipos</a></li>
            <li><a href="../PHP/player_registration_form.php">Registrar Jugadores</a></li>
            <li><a href="../PHP/game_updater_form.php">Registrar Partidos</a></li>
            <li><a href="../PHP/general_stadistics.php">Estadísticas Generales</a></li>
            <?php 
            if (isset($_SESSION['usuario'])){
                echo '<li class="log-out">Bienvenido/a '. $_COOKIE['name_cookie'] .'<a href="../PHP/logout.php">Cerrar sesion</a></li>';
            }
            else{
                echo '<li class="log-in"><a href="../src/login.html">Iniciar Sesión</a></li>';
            }
            ?>
           
        </ul>
    </nav>

</body>
</html>
