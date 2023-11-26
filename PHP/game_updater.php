<?php

    $ID_equipo = $_POST['ID_equipo'];
    $resultado = $_POST['resultado'];
    
    $bdconnect = mysqli_connect("localhost", "root", "", "equipos");
    
    $validate = "SELECT * FROM equipos WHERE ID_equipo='$ID_equipo'";
    $result = mysqli_query($bdconnect, $validate);
    $row = mysqli_fetch_assoc($result);

    $update = "UPDATE equipos SET $resultado = $resultado + 1 WHERE ID_equipo = '$ID_equipo'";
    $total_games = "UPDATE equipos SET partidos = partidos + 1 WHERE ID_equipo = '$ID_equipo'";
    mysqli_query($bdconnect, $update);
    mysqli_query($bdconnect, $total_games);

    mysqli_close($bdconnect);

    if (isset($_POST['redirect_team']) && $_POST['redirect_team'] === 'true'){
        header("Location: team.php?id=" . $ID_equipo);
        exit();
    }   
    else{
     header("Location: game_updater_form.php");
    }
    
?>