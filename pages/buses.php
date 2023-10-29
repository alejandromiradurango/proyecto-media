<?php
    $buses = ejecutarConsulta("SELECT * FROM buses");

    if ($modulo == 'leer') {
        $titulo = 'Buses';
    } elseif ($modulo == 'crear') {
        $titulo = 'Crear bus';
        $action = 'admin/crear/buses.php';
        $textoBoton = 'Crear';
        $placa = '';
        $modelo = '';
        $asientos = '';
        $idRuta = '';
        $idBus = '';
    } elseif ($modulo == 'editar') {
        $titulo = 'Editar bus';
        $action = 'admin/editar/buses.php';
        $textoBoton = 'Editar';
        $id = isset($_GET["id"]) ? strtolower($_GET["id"]) : '';
        $result = ejecutarConsulta("SELECT * FROM buses WHERE ID_bus = '$id'");
        $bus = mysqli_fetch_assoc($result);
        $placa = $bus['Numero_placa'];
        $modelo = $bus['Modelo_bus'];
        $asientos = $bus['Capacidad_asientos'];
        $idRuta = $bus['ID_ruta'];
        $idBus = $id;
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
                                <button class="btn text-danger" onclick="alertaEliminar('buses', <?= $bus["ID_bus"] ?>)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <?php
                $rutas = ejecutarConsulta("SELECT 
                    rutas.ID_ruta,
                    C1.Nombre_ciudad AS Ciudad_origen,
                    C2.Nombre_ciudad AS Ciudad_destino
                FROM `rutas`
                INNER JOIN ciudades C1 ON rutas.Ciudad_origen = C1.ID_ciudad
                INNER JOIN ciudades C2 ON rutas.Ciudad_destino = C2.ID_ciudad 
                ORDER BY rutas.ID_ruta
                ");
            ?>
            <div class="carta">
                    <form action="<?= $action ?>" method="post" class="formulario">
                        <input type="hidden" name="idBus" value="<?= $idBus ?>" />
                        <div class="caja-input">
                            <input class="input-form" type="text" name="placa" id="placa" required placeholder=" " value="<?= $placa; ?>">
                            <label class="input-label" for="placa">Numero Placa</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="number" name="modelo" id="modelo" required placeholder=" " value="<?= $modelo; ?>">
                            <label class="input-label" for="modelo">Modelo</label>
                        </div>
                        <div class="caja-input">
                            <input class="input-form" type="number" name="asientos" id="asientos" required placeholder=" " value="<?= $asientos; ?>">
                            <label class="input-label" for="asientos">Asientos disponibles</label>
                        </div>
                        <div class="caja-input">
                            <select name="idRuta" id="" class='input-form px-1 py-2' required>
                                <option value="" selected disabled>Seleccionar</option>
                                <?php
                                    foreach ($rutas as $ruta) {
                                    echo '<option ' . (($idRuta == $ruta['ID_ruta']) ? 'selected="selected" ' : '') . 'value="' . $ruta['ID_ruta'] . '">' . $ruta['Ciudad_origen'] . ' - ' . $ruta['Ciudad_destino'] . '</option>';
                                    }
                                ?>
                            </select>
                            <label class="input-label" for="idRuta">Ruta</label>
                        </div>
                        <input type="submit" value="<?= $textoBoton ?>" class="enviar-formulario">
                    </form>
            </div>
        <?php endif; ?>
    </article>
</section>