<?php

    $ID_equipo=$_POST['ID_equipo'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $numero=intval($_POST['numero']);
    $posicion=$_POST['posicion'];
    
    $bdconnect=mysqli_connect("localhost","root","","equipos");
    
    $insert_team="INSERT INTO jugadores (ID_equipo, nombre, apellido, numero, posicion) VALUES ('$ID_equipo', '$nombre', '$apellido', '$numero', '$posicion')";
    
    mysqli_query($bdconnect, $insert_team);

    if (isset($_FILES['imagen'])) {

        $get_player_id="SELECT ID_jugador FROM jugadores WHERE ID_equipo='$ID_equipo' AND nombre='$nombre' AND apellido='$apellido' AND numero='$numero'";
        $result=mysqli_query($bdconnect,$get_player_id);
        $ID = mysqli_fetch_assoc($result);
        $ID_jugador = $ID['ID_jugador'];
        echo "<script>alert('" . $ID_jugador. "');</script>";
        $path = "../images/" . $ID_jugador . "player.jpg";

        $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));

        if ($extension != "jpg" && $extension != "jpeg" && $extension != "png"){

            echo "<script>alert('Error en el usuario y contraseña'); window.location.href='../src/login.html';</script>";
            die();
        }

        else{

            move_uploaded_file($_FILES['imagen']['tmp_name'], $path);

        }
    }
    
    mysqli_close($bdconnect);

    header("Location: player_registration_form.php");
?> 