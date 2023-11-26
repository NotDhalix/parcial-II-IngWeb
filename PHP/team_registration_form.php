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
    <link rel="stylesheet" href="../components/style.css">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <title>Registro de equipo</title>
</head>
<body>
<?php include('../components/navbar.php'); ?>

<form class="form_team" method="post" action="../PHP/team_registration.php" enctype="multipart/form-data">
    
<h2 class="form_title">Registrar equipo</h2>

        <div class="form_container">

            <div class="form_group">
                <input type="text" id="nombre" placeholder=" " name="nombre" class="form_input" required>
                <label for="nombre" class="form_label">Nombre del Equipo</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="text" id="estado" placeholder=" " name="estado" class="form_input" required>
                <label for="estado" class="form_label">Estado donde pertenece</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="number" id="fundacion" placeholder=" " name="fundacion" class="form_input" min="1900" step="1" required>
                <label for="fundacion" class="form_label">Año de fundación</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="number" id="victorias" placeholder=" " name="victorias" class="form_input" min="0" step="1" required>
                <label for="victorias" class="form_label">Victorias</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="number" id="empates" placeholder=" " name="empates" class="form_input" min="0" step="1" required>
                <label for="empates" class="form_label">Empates</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="number" id="derrotas" placeholder=" " name="derrotas" class="form_input" min="0" step="1" required>
                <label for="derrotas" class="form_label">Derrotas</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="file" id="imagen" placeholder=" " name="imagen" class="form_input">
                <label for="imagen" class="form_label">Imagen del equipo</label>
                <span class="form_line"></span>
            </div>


        <input type="submit" class="form_submit" value="Registrar equipo">
            <a class="return_index" href="../index.html">Volver al inicio</a>
    </div>

</form>

</body>
</html> 

    