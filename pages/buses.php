<?php
    $buses = ejecutarConsulta("SELECT * FROM buses");
?>

<section>
    <?php
        // Verifica si la variable de sesión 'eliminacion_exitosa' está definida
        if (isset($_SESSION['eliminacion_exitosa'])) {
            // Muestra la alerta
            if ($_SESSION['eliminacion_exitosa'] === true){
                echo '<script>Swal.fire("La eliminación fue exitosa", "", "success");</script>';
            } else {
                echo '<script>Swal.fire("La eliminación falló", "", "error");</script>';
            }
            // Borra la variable de sesión para que la alerta no se muestre nuevamente en futuras recargas
            unset($_SESSION['eliminacion_exitosa']);
        }
    ?>
    <header class="d-flex align-items-center justify-content-between shadow-none p-0">
        <h1><?= $modulo == 'leer' ? 'Buses' : 'Crear bus' ?></h1>
        <?php if ($modulo == 'leer'): ?>
            <a class="btn btn-success" href="?p=buses&modulo=crear">Crear bus</a>
        <?php else:?>
            <a class="btn btn-secondary" href="?p=buses">Volver</a>
        <?php endif ?>
    </header>
    <article>
        <?php if($modulo == 'leer'):?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Asientos</th>
                        <th>Ruta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($bus = mysqli_fetch_assoc($buses)):?>
                        <tr>
                            <td><?=$bus["ID_bus"]?></td>
                            <td><?=$bus["Numero_placa"]?></td>
                            <td><?=$bus["Modelo_bus"]?></td>
                            <td><?=$bus["Capacidad_asientos"]?></td>
                            <td><?=$bus["ID_ruta"]?></td>
                            <td>
                                <a class="btn text-primary" href="?p=buses&modulo=editar&id=<?=$bus["ID_bus"]?>"><i class="fa fa-pen"></i></a>
                                <!-- <a href="?p=buses&modulo=eliminar&id=<?=$bus["ID_bus"]?>"><i class="fa fa-trash" style="color: red;"></i></a> -->
                                <button class="btn text-danger" onclick="eliminarbus('buses', <?= $bus["ID_bus"] ?>)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </article>
</section>