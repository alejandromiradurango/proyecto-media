<?php
    require('../../modules/funciones.php');
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $asientos = $_POST['asientos'];
    $idRuta = $_POST['idRuta'];

     // Se crea el comando que se va a realizar
     $comando = "INSERT INTO buses (Numero_placa, Modelo_bus, Capacidad_asientos, ID_ruta) VALUES ('$placa', '$modelo', '$asientos', '$idRuta')";

     if(ejecutarConsulta($comando)){
        session_start();
        $_SESSION['creacion_exitosa'] = true;
        header("Location: ../../admin.php?p=buses"); // Redirige a la página de listado de buses
     } else {
        // Hubo un error al eliminar el usuario
        $_SESSION['creacion_exitosa'] = false;
        header("Location: ../../admin.php?p=buses"); // Redirige a la página de listado de buses
     }
?>