<?php

    $nombre=$_POST['nombre'];
    $estado=$_POST['estado'];
    $fundacion=$_POST['fundacion'];
    $victorias=intval($_POST['victorias']);
    $empates=intval($_POST['empates']);
    $derrotas=intval($_POST['derrotas']);

    if(isset($victorias)==FALSE){
        $victorias=0;
    }
    if(isset($empates)==FALSE){
        $empates=0;
    }
    if(isset($derrotas)==FALSE){
        $derrotas=0;
    }

    $partidos=$victorias+$empates+$derrotas;
    
    $bdconnect=mysqli_connect("localhost","root","","equipos");
    
    $insert_team="INSERT INTO equipos (nombre, estado, fundacion, partidos, victorias, empates, derrotas) VALUES ('$nombre', '$estado', '$fundacion', '$partidos', '$victorias', '$empates', '$derrotas')";
    
    mysqli_query($bdconnect, $insert_team);

    if (isset($_FILES['imagen'])) {

        $get_team_id="SELECT ID_equipo FROM equipos WHERE nombre='$nombre'";
        $result=mysqli_query($bdconnect,$get_team_id);
        $ID = mysqli_fetch_assoc($result);
        $ID_equipo = $ID['ID_equipo'];
    
        $path="../images/" . $ID_equipo. ".jpg";

        $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));

        if ($extension != "jpg" && $extension != "jpeg" && $extension != "png"){

            echo "Solo se permiten archivos JPG, JPEG y PNG.";
        }

        else{

            move_uploaded_file($_FILES['imagen']['tmp_name'], $path);

        }
    }
    
    mysqli_close($bdconnect);

    header("Location: index.php");
?> 