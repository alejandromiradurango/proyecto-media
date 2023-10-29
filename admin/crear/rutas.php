<?php
    require('../../modules/funciones.php');
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fechaIda = $_POST['fechaIda'];
    $fechaLlegada = $_POST['fechaLlegada'];
    $precio = $_POST['precio'];

     // Se crea el comando que se va a realizar
     $comando = "INSERT INTO rutas (Ciudad_origen, Ciudad_destino, Horario_partida, Horario_llegada, Precio_boleto) VALUES ('$origen', '$destino', '$fechaIda', '$fechaLlegada', '$precio')";

     if(ejecutarConsulta($comando)){
        session_start();
        $_SESSION['creacion_exitosa'] = true;
        header("Location: ../../admin.php?p=rutas"); // Redirige a la página de listado de rutas
     } else {
        // Hubo un error al eliminar el usuario
        $_SESSION['creacion_exitosa'] = false;
        header("Location: ../../admin.php?p=rutas"); // Redirige a la página de listado de rutas
     }
?>