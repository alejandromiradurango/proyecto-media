<?php
    $usuarios = ejecutarConsulta("SELECT * FROM usuarios");
?>

<section>
    <header>
        <h1><?= $modulo == 'leer' ? 'Usuarios' : 'Crear usuario' ?></h1>
        <?php if ($modulo == 'leer'): ?>
            <a href="?p=usuarios&modulo=crear">Crear Usuario</a>
        <?php else:?>
            <a href="?p=usuarios">Volver</a>
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
                                <a href="?p=usuarios&modulo=editar&id=<?=$usuario["ID_usuario"]?>">Editar</a>
                                <a href="?p=usuarios&modulo=eliminar&id=<?=$usuario["ID_usuario"]?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </article>
</section>