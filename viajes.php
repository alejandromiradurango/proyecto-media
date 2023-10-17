<?php include('modules/funciones.php') ?>
<?php
    $origen = isset($_GET['origen']) ? $_GET['origen'] : null;
    $destino = isset($_GET['destino']) ? $_GET['destino'] : null;
    $fecha_ida = isset($_GET['fecha_ida']) ? $_GET['fecha_ida'] : null;

    if ($origen !== null && $destino !== null && $fecha_ida !== null){
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
        WHERE Ciudad_origen = '$origen' and Ciudad_destino = '$destino'");
    } else {
        $rutas = null;
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("components/links.php") ?>
    <title>Colombia Rutas</title>
</head>
<body>
    <?php
        include("components/header.php");
        include("components/buscador.php");
    ?>
    <div>
        <?php if(isset($rutas)): ?>
            <?php if(mysqli_num_rows($rutas) > 0): ?>
                <div class='container'>
                    <?php foreach($rutas as $ruta): ?>
                        <div class="card mb-3 d-flex flex-row justify-content-between p-3">
                            <div>
                                <h5 class="card-title"><?php echo $ruta['Ciudad_origen'] .' - '. $ruta['Ciudad_destino']?></h5>
                                <p class="card-text"><?php echo ''?></p>
                                <div>
                                    <p>Hora salida: <?= $ruta['Horario_partida']?></p>
                                </div>
                                <span style='color: var(--colorPrincipal)' class="material-symbols-outlined">airline_seat_recline_extra</span>
                                <span style='color: var(--colorPrincipal)' class="material-symbols-outlined">wifi</span>
                                <span style='color: var(--colorPrincipal)' class="material-symbols-outlined">tv_gen</span>
                                <span style='color: var(--colorPrincipal)' class="material-symbols-outlined">air_purifier_gen</span>
                                <span style='color: var(--colorPrincipal)' class="material-symbols-outlined">accessible</span>
                            </div>
                            <div>
                                <h5>Bus</h5>
                                <p class='m-0'>Placa: <?= $ruta['Numero_placa'] ?></p>
                                <p class='m-0'>Modelo: <?= $ruta['Modelo_bus'] ?></p>
                                <a href=<?= 'reservar-viaje.php?ruta=' . $ruta['ID_ruta'] ?> class='btn' style='background-color: var(--colorPrincipal); color: white'>Reservar</a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php else: ?>
                <h1 class='text-center'>No hay rutas con estos destinos</h1>
            <?php endif; ?>
        <?php else: ?>
            <h1 class='text-center'>Busca una ruta</h1>
        <?php endif; ?>
    </div>
    <?php
        include("components/footer.php");
    ?>
    <?php include("components/scripts.php") ?>
</body>
</html>