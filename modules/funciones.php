<?php
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'colombia_transporte';

    $conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    function ejecutarConsulta($conexion, $query) {
        $resultado = mysqli_query($conexion, $query);
        if (!$resultado) {
            echo "Error en la consulta: " . mysqli_error($conexion);
            return false;
        }
        return mysqli_fetch_assoc($resultado);
    }     
    
    function estaLoggeado() {
        session_start();
        return isset($_SESSION['usuario_id']);
    }
    
?>
