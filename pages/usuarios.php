<?php
    $usuarios = ejecutarConsulta("SELECT * FROM usuarios");
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
        <h1><?= $modulo == 'leer' ? 'Usuarios' : 'Crear usuario' ?></h1>
        <?php if ($modulo == 'leer'): ?>
            <a class="btn btn-success" href="?p=usuarios&modulo=crear">Crear Usuario</a>
        <?php else:?>
            <a class="btn btn-secondary" href="?p=usuarios">Volver</a>
        <?php endif ?>
    </header>
    <article>
        <?php if($modulo == 'leer'):?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($usuario = mysqli_fetch_assoc($usuarios)):?>
                        <tr>
                            <td><?=$usuario["Nombre_Completo"]?></td>
                            <td><?=$usuario["Correo_Electronico"]?></td>
                            <td><?=$usuario["Rol"]?></td>
                            <td>
                                <a class="btn text-primary" href="?p=usuarios&modulo=editar&id=<?=$usuario["ID_usuario"]?>"><i class="fa fa-pen"></i></a>
                                <!-- <a href="?p=usuarios&modulo=eliminar&id=<?=$usuario["ID_usuario"]?>"><i class="fa fa-trash" style="color: red;"></i></a> -->
                                <button class="btn text-danger" onclick="eliminarUsuario('usuarios', <?= $usuario["ID_usuario"] ?>)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </article>
</section>