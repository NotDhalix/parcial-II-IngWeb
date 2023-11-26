<?php
        $bdconnect=mysqli_connect("localhost","root","","equipos");
    
        $select="SELECT 
        SUM(partidos)  AS total_partidos, 
        SUM(victorias) AS total_victorias,
        SUM(empates) AS total_empates, 
        SUM(derrotas) AS total_derrotas 
        FROM equipos";

        $result=mysqli_fetch_assoc(mysqli_query($bdconnect, $select));
        mysqli_close($bdconnect);

        $victorias=round(floatval(($result['total_victorias']/$result['total_partidos'])*100),1);
        $empates=round(floatval(($result['total_empates']/$result['total_partidos'])*100),1);
        $derrotas=round(floatval(($result['total_derrotas']/$result['total_partidos'])*100),1);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/style.css">
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <title>Estadisticas generales</title>
    <style>
        p{
            color: white;
        }
        .victorias{
            background-color: rgb(0,160,0);
            animation: fillvictorias 2s forwards;
        }
        .empates{
            background-color: rgb(138, 138, 138);;
            animation: fillempates 2s forwards;
        }
        .derrotas{
            background-color: crimson;
            animation: fillderrotas 2s forwards;
        }

        @keyframes fillvictorias{
            0%{width: 0;}
            100%{width:<?php echo $victorias;?>%;}
        }
        
        @keyframes fillempates{
            0%{width: 0;}
            100%{width:<?php echo $empates;?>%;}
        }
        @keyframes fillderrotas{
            0%{width: 0;}
            100%{width:<?php echo $derrotas;?>%;}
        }
    </style>
</head>

<body>
    
    <?php 
    session_start();
    include('../components/navbar.php'); 
    ?>

    <main>

        <div class="graph">
            <h2>Estadísticas generales</h2>
            <p>Victorias</p>
            <div class="graph-container">
                <div class="num victorias"><?php echo $victorias;?>%</div>
            </div>
            <p>Empates</p>
            <div class="graph-container">
                <div class="num empates"><?php echo $empates;?>%</div>
            </div>
            <p>Derrotas</p>
            <div class="graph-container">
                <div class="num derrotas"><?php echo $derrotas;?>%</div>
            </div>
        </div>
        <br>
        <div class="title_container">
        <h1>Número de partidos: <?php echo $result['total_partidos'];?> </h1>
        </div>
    <?php
        echo '<div class="team-stats">';
            echo '<ul>';
               echo '<li class="wins">Victorias totales: ' . $result['total_victorias']. '</li>';
               echo '<li class="ties">Empates totales: ' . $result['total_empates']. '</li>';
               echo '<li class="loses">Derrotas totales: ' . $result['total_derrotas'] . '</li>';
            echo '</ul>';
        echo '</div>';
    ?>

    </main>

</body>
</html>