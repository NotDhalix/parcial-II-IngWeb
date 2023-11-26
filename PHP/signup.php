<?php

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $username=strtolower($_POST['username']);
    $password=$_POST['password'];
    
    $password=password_hash($password, PASSWORD_DEFAULT);
    
    $bdconnect=mysqli_connect("localhost","root","","equipos");
    
    $validate="SELECT * FROM usuarios WHERE usuario='$username'";
    $insert=mysqli_query($bdconnect, $validate);
    
    if (mysqli_num_rows($insert)>0){
       echo "<script>alert('Nombre de usuario ya existente.'); window.location.href='../src/signup.html';</script>";
        die();
    }
    else{
        $signup="INSERT INTO usuarios (usuario, correo, contrasena, nombre, apellido) VALUES ('$username', '$email', '$password', '$nombre', '$apellido') ";
        mysqli_query($bdconnect, $signup);
        header("Location: index.php");
    }

    mysqli_close($bdconnect);
?> 