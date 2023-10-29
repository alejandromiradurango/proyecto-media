<?php
    $rutas = ejecutarConsulta("
        SELECT 
            rutas.ID_ruta,
            C1.Nombre_ciudad AS Ciudad_origen,
            C2.Nombre_ciudad AS Ciudad_destino,
            Horario_partida,
            Horario_llegada,
            Precio_boleto
        FROM `rutas`
        INNER JOIN ciudades C1 ON rutas.Ciudad_origen = C1.ID_ciudad
        INNER JOIN ciudades C2 ON rutas.Ciudad_destino = C2.ID_ciudad 
        ORDER BY rutas.ID_ruta
    ");

    if ($modulo == 'leer') {
        $titulo = 'Rutas';
    } elseif ($modulo == 'crear') {
        $titulo = 'Crear ruta';
        $action = 'admin/crear/rutas.php';
        $textoBoton = 'Crear';
        $origen = '';
        $destino = '';
        $fechaIda = '';
        $fechaLlegada = '';
        $precio = '';
        $idRuta = '';
    } elseif ($modulo == 'editar') {
        $titulo = 'Editar ruta';
        $action = 'admin/editar/rutas.php';
        $textoBoton = 'Editar';
        $id = isset($_GET["id"]) ? strtolower($_GET["id"]) : '';
        $result = ejecutarConsulta("SELECT * FROM rutas WHERE ID_ruta = '$id'");
        $ruta = mysqli_fetch_assoc($result);
        $origen = $ruta['Ciudad_origen'];
        $destino = $ruta['Ciudad_destino'];
        $fechaIda = $ruta['Horario_partida'];
        $fechaLlegada = $ruta['Horario_llegada'];
        $precio = $ruta['Precio_boleto'];
        $idRuta = $id;
    }

function money_format_windows($format, $number) {
    $formatted = str_replace('%n', number_format($number, 0), $format);

    $formatted = str_replace('%i', '$', $formatted);

    return $formatted;
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
            <a class="btn btn-success" href="?p=rutas&modulo=crear">Crear ruta</a>
        <?php else:?>
            <a class="btn btn-secondary" href="?p=rutas">Volver</a>
        <?php endif ?>
    </header>
    <article>
        <?php if($modulo == 'leer'):?>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Hora partida</th>
                        <th>Hora llegada</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($ruta = mysqli_fetch_assoc($rutas)):?>
                        <tr>
                            <td><?=$ruta["ID_ruta"]?></td>
                            <td><?=$ruta["Ciudad_origen"]?></td>
                            <td><?=$ruta["Ciudad_destino"]?></td>
                            <td><?=$ruta["Horario_partida"]?></td>
                            <td><?=$ruta["Horario_llegada"]?></td>
                            <td><?=money_format_windows('%i%n', $ruta["Precio_boleto"])?></td>
                            <td>
                                <a class="btn text-primary" href="?p=rutas&modulo=editar&id=<?=$ruta["ID_ruta"]?>"><i class="fa fa-pen"></i></a>
                                <!-- <a href="?p=rutas&modulo=eliminar&id=<?=$ruta["ID_ruta"]?>"><i class="fa fa-trash" style="color: red;"></i></a> -->
                                <button class="btn text-danger" onclick="alertaEliminar('rutas', <?= $ruta["ID_ruta"] ?>)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <?php

                $ciudades = ejecutarConsulta('SELECT * FROM ciudades');
                
            ?>
            <div class="carta">
                    <form action="<?= $action ?>" method="post" class="formulario">
                        <input type="hidden" name="idRuta" value="<?= $idRuta ?>" />
                        <div class="caja-input">
                            <select name="origen" id="" class='input-form px-1 py-2' required>
                                <option value="" selected disabled>Origen</option>
                                <?php
                                    foreach ($ciudades as $ciudad) {
                                    echo '<option ' . (($origen == $ciudad['ID_ciudad']) ? 'selected="selected" ' : '') . 'value="' . $ciudad['ID_ciudad'] . '">' . $ciudad['Nombre_ciudad'] . ', ' . $ciudad['Departamento'] . '</option>';
                                    }
                                ?>
                            </select>
                            <label class="input-label" for="origen">Ciudad Origen</label>
                        </div>
                        <div class="caja-input">
                            <select name="destino" id="" class='input-form px-1 py-2' required>
                                <option value="" selected disabled>Destino</option>
                                <?php
                                    foreach ($ciudades as $ciudad) {
                                    echo '<option ' . (($destino == $ciudad['ID_ciudad']) ? 'selected="selected" ' : '') . 'value="' . $ciudad['ID_ciudad'] . '">' . $ciudad['Nombre_ciudad'] . ', ' . $ciudad['Departamento'] . '</option>';
                                    }
                                ?>
                            </select>
                            <label class="input-label" for="destino">Ciudad Destino</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="datetime-local" name="fechaIda" id="fechaIda" required placeholder=" " value="<?= $fechaIda; ?>">
                            <label class="input-label" for="fechaIda">Fecha partida</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="datetime-local" name="fechaLlegada" id="fechaLlegada" required placeholder=" " value="<?= $fechaLlegada; ?>">
                            <label class="input-label" for="fechaLlegada">Fecha llegada</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="number" name="precio" id="precio" required placeholder=" " value="<?= $precio; ?>">
                            <label class="input-label" for="precio">Precio boleto</label>
                        </div>
                        <input type="submit" value="<?= $textoBoton ?>" class="enviar-formulario">
                    </form>
            </div>
        <?php endif; ?>
    </article>
</section>