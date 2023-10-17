<?php
    $ciudades = ejecutarConsulta("SELECT * FROM ciudades");
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
        <h1><?= $modulo == 'leer' ? 'Ciudades' : 'Crear ciudad' ?></h1>
        <?php if ($modulo == 'leer'): ?>
            <a class="btn btn-success" href="?p=ciudades&modulo=crear">Crear ciudad</a>
        <?php else:?>
            <a class="btn btn-secondary" href="?p=ciudades">Volver</a>
        <?php endif ?>
    </header>
    <article>
        <?php if($modulo == 'leer'):?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Ciudad</th>
                        <th>Departamento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($ciudad = mysqli_fetch_assoc($ciudades)):?>
                        <tr>
                            <td><?=$ciudad["Nombre_ciudad"]?></td>
                            <td><?=$ciudad["Departamento"]?></td>
                            <td>
                                <a class="btn text-primary" href="?p=ciudades&modulo=editar&id=<?=$ciudad["ID_ciudad"]?>"><i class="fa fa-pen"></i></a>
                                <!-- <a href="?p=ciudades&modulo=eliminar&id=<?=$ciudad["ID_ciudad"]?>"><i class="fa fa-trash" style="color: red;"></i></a> -->
                                <button class="btn text-danger" onclick="eliminarCiudad('ciudades', <?= $ciudad["ID_ciudad"] ?>)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </article>
</section>