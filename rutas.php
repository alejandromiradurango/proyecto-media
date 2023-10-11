<?php include('modules/funciones.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("components/links.php") ?>
    <title>Rutas - Colombia Rutas</title>
</head>
<body>
    <?php
        include("components/header.php");
    ?>
    <h1>RUTASSSSSS</h1>
    <?php 
    
        $usuarios = ejecutarConsulta('SELECT * FROM usuarios');

        echo var_dump($usuarios);

    ?> 
    <?php include("components/scripts.php") ?>
</body>
</html>