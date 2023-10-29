<?php
    require('../../modules/funciones.php');
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fechaIda = $_POST['fechaIda'];
    $fechaLlegada = $_POST['fechaLlegada'];
    $precio = $_POST['precio'];
    $idRuta = $_POST['idRuta'];

     // Se crea el comando que se va a realizar
     $comando = "UPDATE rutas SET Ciudad_origen = '$origen', Ciudad_destino = '$destino', Horario_partida = '$fechaIda', Horario_llegada = '$fechaLlegada', Precio_boleto = '$precio' WHERE ID_ruta = '$idRuta'";

     if(ejecutarConsulta($comando)){
        session_start();
        $_SESSION['edicion_exitosa'] = true;
        header("Location: ../../admin.php?p=rutas"); // Redirige a la página de listado de rutas
     } else {
        // Hubo un error al eliminar el usuario
        $_SESSION['edicion_exitosa'] = false;
        header("Location: ../../admin.php?p=rutas"); // Redirige a la página de listado de rutas
     }
?>