<?php
// Verificar si se ha proporcionado el ID del bus en la URL
if (isset($_GET['id'])) {
    // Conectar a la base de datos (asegúrate de establecer la conexión adecuadamente aquí)

    $id = $_GET['id'];

    // Realizar una consulta SQL para eliminar el bus con el ID especificado
    $sql = "DELETE FROM buses WHERE ID_bus = $id";

    if (ejecutarConsulta($sql)) {
        // El bus se ha eliminado con éxito
        session_start();
        $_SESSION['eliminacion_exitosa'] = true;
        header("Location: ../admin.php?p=buses"); // Redirige a la página de listado de buses
    } else {
        // Hubo un error al eliminar el bus
        $_SESSION['eliminacion_exitosa'] = false;
        header("Location: ../admin.php?p=buses"); // Redirige a la página de listado de buses
    }
} else {
    // Si no se proporcionó un ID de bus válido, puedes redirigir a alguna página de manejo de errores
    echo 'No existe id';
}
?>
