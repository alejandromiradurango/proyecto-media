<?php 

include("../modules/funciones.php"); 

if (!esAdministrador()) {
    header("Location: index.php");
}

    $pagina = isset($_GET["p"]) ? strtolower($_GET["p"]) : 'inicio';
    
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <main class="admin">
        <div id="content">
            <?php 
                include("eliminar/" . $pagina . ".php");
            ?> 
        </div>
    </main>
</body>
</html>