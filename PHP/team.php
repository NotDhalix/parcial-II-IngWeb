<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/style.css">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <title>Jugadores</title>
</head>
<body>

    <?php 
        session_start();
        include('../components/navbar.php'); 
    ?>

    <main>

        <?php

        $_SESSION['last_page'] = $_SERVER['REQUEST_URI'];

        $bdconnect = mysqli_connect("localhost", "root", "", "equipos");

        $ID_equipo = $_GET['id'];

        $query = "SELECT * FROM equipos WHERE ID_equipo = $ID_equipo";

        $result = mysqli_query($bdconnect, $query);
        $equipo = mysqli_fetch_assoc($result);

        if ($equipo) {
            echo '<div class="title_container">';
            echo '<h1>' . $equipo['nombre'] . '</h1>';
            echo '</div>';
         echo '<div class="team-stats">';
            echo '<ul>';
               echo '<li class="wins">Victorias: ' . $equipo['victorias'] . '</li>';
               echo '<li class="ties">Empates: ' . $equipo['empates'] . '</li>';
               echo '<li class="loses">Derrotas: ' . $equipo['derrotas'] . '</li>';
            echo '</ul>';
        echo '</div>';

            $query = "SELECT * FROM jugadores WHERE ID_equipo = $ID_equipo";
            $result = mysqli_query($bdconnect, $query);

            if(mysqli_num_rows($result) > 0){
                    
                echo '<section class="container">';

                while ($row = mysqli_fetch_assoc($result)) {

                    $imageExists = '../images/' . $row['ID_jugador'] . 'player.jpg';
                    $defaultPath='../images/' . $row['posicion'].'.jpg';

                    echo '<div class="card">';

                        echo '<div class="card-image">';

                        echo '<img src="' . (file_exists($imageExists) ? $imageExists : $defaultPath) . ' ">';
                        
                        echo'</div>';

                        echo '<h3>' . $row['nombre'] . " " . $row['apellido'] ." - " . $row['numero'] . '</h3><br>';
                        echo '<p>' . ucwords($row['posicion']) . '</p>';
                            

                    echo '</div>';

                }
                echo '</section>';
            }
            else{

                echo '<h2><i>Este equipo no cuenta con jugadores registrados</i></h2>';
            }

        } 
        else{ 
            header("Location: index.php"); 
        }

        mysqli_close($bdconnect);
    ?>


</body>
</html>