<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/style.css">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <title>Futbol total</title>
    <style>
        a{
            text-decoration: none;
            color:black
        }
    </style>
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
            $query = "SELECT * FROM equipos";
            $result = mysqli_query($bdconnect, $query);

            echo '<section class="container">';

                while ($row = mysqli_fetch_assoc($result)) {

                    $imageExists = '../images/' . $row['ID_equipo'] . '.jpg';
                    $defaultPath='../images/default.jpeg';

                    echo '<a class="team-link" href="team.php?id=' . $row['ID_equipo'] . '">';
                    echo '<div class="card">';

                        

                        echo '<div class="card-image">';

                            echo '<img src="' . (file_exists($imageExists) ? $imageExists : $defaultPath) . ' ">';

                        echo'</div>';

                        echo '<h3>' . $row['nombre'] .'<br>' . $row['fundacion'] . '</h3>';
                        echo '<p>' . ucwords($row['estado']) . '</p>';
                        

                    echo '</div>';

                    echo '<a>';
                }

            echo '</section>';
        ?>



    </main>

</body>
</html>