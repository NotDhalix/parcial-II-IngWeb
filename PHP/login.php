<?php
    session_start();
    $lastpage=$_SESSION['last_page'];
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    $bdconnect = mysqli_connect("localhost", "root", "", "equipos");

    $query = "SELECT * FROM usuarios WHERE usuario='$username'";
    
    $result = mysqli_query($bdconnect, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password, $row['contrasena'])) {
            $_SESSION['usuario'] = $row;
            setcookie('name_cookie', ucfirst($row['nombre']), time() + 21600, '/');
            setcookie('session_cookie', session_id(), time() + 21600, '/');
            header("Location: $lastpage");
            die();
        } 
        else {
            echo "<script>alert('Error en el usuario y contraseña'); window.location.href='../src/login.html';</script>";
            die();
        }

        mysqli_free_result($result);
    } 

    mysqli_close($bdconnect);
    
?>