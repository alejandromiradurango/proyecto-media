<?php 

include("modules/funciones.php"); 

if (!esAdministrador()) {
    header("Location: index.php");
}

    $pagina = isset($_GET["p"]) ? strtolower($_GET["p"]) : 'usuarios';
    $modulo = isset($_GET["modulo"]) ? strtolower($_GET["modulo"]) : 'leer';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("components/links.php") ?>
    <title>Colombia Rutas</title>
</head>
<body>
    <main class="admin">
        <?php
            include("components/sidebar.php");
        ?>
        <div id="content">
            <?php 
                include("pages/" . $pagina . ".php");
            ?> 
        </div>
    </main>
    <?php include("components/scripts.php") ?>
</body>
</html>