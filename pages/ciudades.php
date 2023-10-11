<?php
    $ciudades = ejecutarConsulta("SELECT * FROM ciudades");
?>

<section>
    <header>
        <h1><?= $modulo == 'leer' ? 'Ciudades' : 'Crear ciudad' ?></h1>
        <?php if ($modulo == 'leer'): ?>
            <a href="?p=ciudades&modulo=crear">Crear Ciudad</a>
        <?php else:?>
            <a href="?p=ciudades">Volver</a>
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
                                <a href="?p=ciudades&modulo=editar&id=<?=$ciudad["ID_ciudad"]?>">Editar</a>
                                <a href="?p=ciudades&modulo=eliminar&id=<?=$ciudad["ID_ciudad"]?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </article>
</section>