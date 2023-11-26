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

<form class="form_player" method="post" action="../PHP/player_registration.php" enctype="multipart/form-data">
    
<h2 class="form_title">Registrar Jugardor</h2>

        <div class="form_container">

            <div class="form_group">
                <select class="form_input" name="ID_equipo" required>
                    <option selected="selected" value="1" disabled>Seleccione un equipo</option>
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
                <input type="text" id="nombre" placeholder=" " name="nombre" class="form_input" required>
                <label for="nombre" class="form_label">Nombre</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="text" id="apellido" placeholder=" " name="apellido" class="form_input" required>
                <label for="apellido" class="form_label">Apellido</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="number" id="numero" placeholder=" " name="numero" class="form_input" min="1" step="1" required>
                <label for="numero" class="form_label">Número</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <select class="form_input" name="posicion" required>
                    <option selected="selected"  value="center">Seleccione una posición</option>
                    <optgroup label="Ofensivos">
                        <option value="center">Center</option>
                        <option value="offensive guard">Offensive Guard</option>
                        <option value="offensive tackle">Offensive Tackle</option>
                    </optgroup>
                    <optgroup label="Back and Receivers">
                        <option value="quarterback">Quarterback</option>
                        <option value="running back">Running back</option>
                        <option value="wide receiver">Wide receiver</option>
                    </optgroup>
                    <optgroup label="Defense">
                        <option value="defensive tackle">Defensive Tackle</option>
                        <option value="defensive end">Defensive End</option>
                    </optgroup>
                    <optgroup label="Linebackers">
                        <option value="linebacker">Linebacker</option>
                        <option value="outside linebacker">Outside Linebacker</option>
                        <option value="defensive back">Defensive Back</option>
                    </optgroup>

                </select>
                <label for="posicion" class="form_label">Posición</label>
                <span class="form_line"></span>
            </div>  
            <div class="form_group">
                <input type="file" id="imagen" placeholder=" " name="imagen" class="form_input">
                <label for="imagen" class="form_label">Imagen del jugador</label>
                <span class="form_line"></span>
            </div>
        <input type="submit" class="form_submit" value="Registrar jugador">
            <a class="return_index" href="../index.html">Volver al inicio</a>
    </div>

</form>

</body>
</html>