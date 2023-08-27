<?php include(__DIR__ . '/../modules/funciones.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>RUTASSSSSS</h1>
    <?php 
    
        $usuarios = ejecutarConsulta($conn, 'SELECT * FROM usuarios');

        echo var_dump($usuarios);

    ?> 
</body>
</html>