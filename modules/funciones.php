<?php
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'colombia_transporte';

    $conexionDB = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

    // Verificar la conexión
    if (!$conexionDB) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    function ejecutarConsulta($query) {
        $host = 'localhost';
        $usuario = 'root';
        $contrasena = '';
        $base_de_datos = 'colombia_transporte';
        $conexionDB = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);
        $resultado = mysqli_query($conexionDB, $query);
        if (!$resultado) {
            echo "Error en la consulta: " . mysqli_error($conexionDB);
            return false;
        }
        mysqli_close($conexionDB);
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
