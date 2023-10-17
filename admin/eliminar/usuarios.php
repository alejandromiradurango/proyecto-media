<?php
// Verificar si se ha proporcionado el ID del usuario en la URL
if (isset($_GET['id'])) {
    // Conectar a la base de datos (asegúrate de establecer la conexión adecuadamente aquí)

    $usuarioID = $_GET['id'];

    // Realizar una consulta SQL para eliminar el usuario con el ID especificado
    $sql = "DELETE FROM usuarios WHERE ID_usuario = $usuarioID";

    if (ejecutarConsulta($sql)) {
        // El usuario se ha eliminado con éxito
        session_start();
        $_SESSION['eliminacion_exitosa'] = true;
        header("Location: ../admin.php?p=usuarios"); // Redirige a la página de listado de usuarios
    } else {
        // Hubo un error al eliminar el usuario
        $_SESSION['eliminacion_exitosa'] = false;
        header("Location: ../admin.php?p=usuarios"); // Redirige a la página de listado de usuarios
    }
} else {
    // Si no se proporcionó un ID de usuario válido, puedes redirigir a alguna página de manejo de errores
    // header("Location: error.php");
    echo 'No existe id';
}
?>
