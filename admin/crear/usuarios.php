<?php
    require('../../modules/funciones.php');
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    
     // Se crea una contraseña segura para insertar en la base de datos
     $contrasenaSegura = password_hash($contrasena, PASSWORD_DEFAULT);

     // Se crea el comando que se va a realizar
     $comando = "INSERT INTO usuarios (Nombre_Completo, Correo_Electronico, Contrasena, Telefono, Rol) VALUES ('$nombre', '$correo', '$contrasenaSegura', '$telefono', '$rol')";

     if(ejecutarConsulta($comando)){
        session_start();
        $_SESSION['creacion_exitosa'] = true;
        header("Location: ../../admin.php?p=usuarios"); // Redirige a la página de listado de usuarios
     } else {
        // Hubo un error al eliminar el usuario
        $_SESSION['creacion_exitosa'] = false;
        header("Location: ../../admin.php?p=usuarios"); // Redirige a la página de listado de usuarios
     }
?>