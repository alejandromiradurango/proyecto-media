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
        return $resultado;
    }     
    
    function estaLoggeado() {
        session_start();
        return isset($_SESSION['Id_usuario']);
    }

    function esAdministrador() {
        session_start();
        
        if (isset($_SESSION['Rol']) && $_SESSION['Rol'] == 'Administrador') {
            $esAdmin = true;
        } else {
            $esAdmin = false;
        }
        
        return $esAdmin;
    }
    
?>
