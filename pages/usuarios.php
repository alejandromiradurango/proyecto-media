<?php
    $usuarios = ejecutarConsulta("SELECT * FROM usuarios");

    if ($modulo == 'leer') {
        $titulo = 'Usuarios';
    } elseif ($modulo == 'crear') {
        $titulo = 'Crear usuario';
        $action = 'admin/crear/usuarios.php';
        $textoBoton = 'Crear';
        $nombre = '';
        $telefono = '';
        $correo = '';
        $rol = '';
        $idUsuario = '';
    } elseif ($modulo == 'editar') {
        $titulo = 'Editar usuario';
        $action = 'admin/editar/usuarios.php';
        $textoBoton = 'Editar';
        $id = isset($_GET["id"]) ? strtolower($_GET["id"]) : '';
        $result = ejecutarConsulta("SELECT * FROM usuarios WHERE ID_usuario = '$id'");
        $user = mysqli_fetch_assoc($result);
        $nombre = $user['Nombre_Completo'];
        $telefono = $user['Telefono'];
        $correo = $user['Correo_Electronico'];
        $rol = $user['Rol'];
        $idUsuario = $id;
    }
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
        if (isset($_SESSION['creacion_exitosa'])) {
            // Muestra la alerta
            if ($_SESSION['creacion_exitosa'] === true){
                echo '<script>Swal.fire("La creación fue exitosa", "", "success");</script>';
            } else {
                echo '<script>Swal.fire("La creación falló", "", "error");</script>';
            }
            // Borra la variable de sesión para que la alerta no se muestre nuevamente en futuras recargas
            unset($_SESSION['creacion_exitosa']);
        }
        if (isset($_SESSION['edicion_exitosa'])) {
            // Muestra la alerta
            if ($_SESSION['edicion_exitosa'] === true){
                echo '<script>Swal.fire("La edición fue exitosa", "", "success");</script>';
            } else {
                echo '<script>Swal.fire("La edición falló", "", "error");</script>';
            }
            // Borra la variable de sesión para que la alerta no se muestre nuevamente en futuras recargas
            unset($_SESSION['edicion_exitosa']);
        }
    ?>
    <header class="d-flex align-items-center justify-content-between shadow-none p-0">
        <h1><?= $titulo ?></h1>
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
                                <button class="btn text-danger" onclick="alertaEliminar('usuarios', <?= $usuario["ID_usuario"] ?>)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="carta">
                    <form action="<?= $action ?>" method="post" class="formulario">
                        <input type="hidden" name="idUsuario" value="<?= $idUsuario ?>" />
                        <div class="caja-input">
                            <input class="input-form" type="text" name="nombre" id="nombre" required placeholder=" " value="<?= $nombre; ?>">
                            <label class="input-label" for="nombre">Nombre completo</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="text" name="telefono" id="telefono" required placeholder=" " value="<?= $telefono; ?>">
                            <label class="input-label" for="telefono">Teléfono</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="text" name="correo" id="correo" required placeholder=" " value="<?= $correo; ?>">
                            <label class="input-label" for="correo">Correo</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="text" name="rol" id="rol" required placeholder=" " value="<?= $rol; ?>">
                            <label class="input-label" for="rol">Rol</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="password" name="contrasena" id="contrasena" required placeholder=" ">
                            <label class="input-label" for="contrasena">Contraseña</label>
                        </div>
                        <input type="submit" value="<?= $textoBoton ?>" class="enviar-formulario">
                    </form>
            </div>
        <?php endif; ?>
    </article>
</section>