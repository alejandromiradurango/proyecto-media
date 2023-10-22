<?php
    $rutas = ejecutarConsulta("
    SELECT 
        rutas.ID_ruta,
        C1.Nombre_ciudad AS Ciudad_origen,
        C2.Nombre_ciudad AS Ciudad_destino,
        Horario_partida,
        Horario_llegada,
        Precio_boleto,
        B.Numero_placa,
        B.Modelo_bus
    FROM `rutas`
    INNER JOIN ciudades C1 ON rutas.Ciudad_origen = C1.ID_ciudad
    INNER JOIN ciudades C2 ON rutas.Ciudad_destino = C2.ID_ciudad 
    INNER JOIN buses B ON rutas.ID_ruta = B.ID_ruta
    ORDER BY rutas.ID_ruta
");
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
    ?>
    <header class="d-flex align-items-center justify-content-between shadow-none p-0">
        <h1><?= $modulo == 'leer' ? 'Rutas' : 'Crear ruta' ?></h1>
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
        <?php endif; ?>
    </article>
</section>