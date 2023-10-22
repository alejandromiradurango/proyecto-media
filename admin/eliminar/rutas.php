<?php
// Verificar si se ha proporcionado el ID de la ruta en la URL
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Realizar una consulta SQL para actualizar un bus que tenia asociada la ruta a eliminar
    $sqlBus = "UPDATE buses SET ID_ruta = null WHERE ID_ruta = '$id'";
    ejecutarConsulta($sqlBus);

    // Realizar una consulta SQL para eliminar la ruta con el ID especificado
    $sql = "DELETE FROM rutas WHERE ID_ruta = $id";

    if (ejecutarConsulta($sql)) {
        // La ruta se ha eliminado con éxito
        session_start();
        $_SESSION['eliminacion_exitosa'] = true;
        header("Location: ../admin.php?p=rutas"); // Redirige a la página de listado de rutas
    } else {
        // Hubo un error al eliminar el usuario
        $_SESSION['eliminacion_exitosa'] = false;
        header("Location: ../admin.php?p=rutas"); // Redirige a la página de listado de rutas
    }
} else {
    // Si no se proporcionó un ID de ruta válido, puedes redirigir a alguna página de manejo de errores
    echo 'No existe id';
}
?>
