<?php
    require('../../modules/funciones.php');
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    $idUsuario = $_POST['idUsuario'];
    
     // Se crea una contraseña segura para insertar en la base de datos
     $contrasenaSegura = password_hash($contrasena, PASSWORD_DEFAULT);

     // Se crea el comando que se va a realizar
     $comando = "UPDATE usuarios SET Nombre_Completo = '$nombre', Correo_Electronico = '$correo', Contrasena = '$contrasenaSegura', Telefono = '$telefono', Rol = '$rol' WHERE ID_usuario = '$idUsuario'";

     if(ejecutarConsulta($comando)){
        session_start();
        $_SESSION['edicion_exitosa'] = true;
        header("Location: ../../admin.php?p=usuarios"); // Redirige a la página de listado de usuarios
     } else {
        // Hubo un error al eliminar el usuario
        $_SESSION['edicion_exitosa'] = false;
        header("Location: ../../admin.php?p=usuarios"); // Redirige a la página de listado de usuarios
     }
?>