<?php
    require('../../modules/funciones.php');
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $asientos = $_POST['asientos'];
    $idRuta = $_POST['idRuta'];
    $idBus = $_POST['idBus'];

     // Se crea el comando que se va a realizar
     $comando = "UPDATE buses SET Numero_placa = '$placa', Modelo_bus = '$modelo', Capacidad_asientos = '$asientos', ID_ruta = '$idRuta' WHERE ID_bus = '$idBus'";

     if(ejecutarConsulta($comando)){
        session_start();
        $_SESSION['edicion_exitosa'] = true;
        header("Location: ../../admin.php?p=buses"); // Redirige a la página de listado de buses
     } else {
        // Hubo un error al eliminar el usuario
        $_SESSION['edicion_exitosa'] = false;
        header("Location: ../../admin.php?p=buses"); // Redirige a la página de listado de buses
     }
?>