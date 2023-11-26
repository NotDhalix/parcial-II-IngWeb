<?php
session_start();
$_SESSION['last_page'] = $_SERVER['REQUEST_URI'];

if (!isset($_SESSION['usuario'])) {
    header("Location: ../src/login.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../components/style.css">
    <title>Registro de jugadores</title>
</head>
<body>
    
<?php include('../components/navbar.php'); ?>

<form class="form_game" method="post" action="../PHP/game_updater.php">
    
<h2 class="form_title">Agregar un resultado</h2>

        <div class="form_container">

            <div class="form_group">
                <select class="form_input" name="ID_equipo">
                    <option selected="selected" disabled>Seleccione un equipo</option>
                    <?php

                         $bdconnect = mysqli_connect("localhost", "root", "", "equipos");
                         $query = "SELECT * FROM equipos";
                         $result = mysqli_query($bdconnect, $query);

                         while ($row = mysqli_fetch_assoc($result)){
                            echo '<option value="' . $row['ID_equipo'] . '">' . $row['nombre'] . '</option>';
                         }
                    ?>
                </select>
                <label for="ID_equipo" class="form_label">Equipo</label>
                <span class="form_line"></span>
            </div>   
            <div class="form_group">
                <select class="form_input" name="resultado">
                        <option value="victorias" selected>Victoria</option>
                        <option value="empates">Empate</option>
                        <option value="derrotas">Derrota</option>
                </select>
                <label for="posicion" class="form_label">Resultado</label>
                <span class="form_line"></span>
            </div>  
            <div class="form_group"> 
                <!-- Este switch pertenece a W3School. Creditos: https://www.w3schools.com/howto/howto_css_switch.asp -->
                <label class="switch">
                    <input type="checkbox" value="true" name="redirect_team">
                    <span class="slider round"></span>
                </label>
                <p> <br>Ir a la pagina del equipo</p> <br>
            </div>  
        <input type="submit" class="form_submit" value="Ingresar resultado">
            <a class="return_index" href="../index.html">Volver al inicio</a>
    </div>

</form>

</body>
</html>