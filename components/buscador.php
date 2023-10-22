<?php

    $ciudades = ejecutarConsulta('SELECT * FROM ciudades');
    
?>

<section class="buscador">
    <div class="container">
        <form action="viajes.php" method='GET' class='d-flex my-5'>
            <div class='input-group'>
              <select name="origen" id="" class='form-select py-5' required>
                <option value="" selected disabled>Origen</option>
                <?php

                    foreach ($ciudades as $ciudad) {
                      echo '<option ' . (($origen == $ciudad['ID_ciudad']) ? 'selected="selected" ' : '') . 'value="' . $ciudad['ID_ciudad'] . '">' . $ciudad['Nombre_ciudad'] . ', ' . $ciudad['Departamento'] . '</option>';
                    }

                ?>
              </select>
              <select name="destino" id="" class='form-select py-5' required>
                <option value="" selected disabled>Destino</option>
                <?php

                    foreach ($ciudades as $ciudad) {
                      echo '<option ' . (($destino == $ciudad['ID_ciudad']) ? 'selected="selected" ' : '') . 'value="' . $ciudad['ID_ciudad'] . '">' . $ciudad['Nombre_ciudad'] . ', ' . $ciudad['Departamento'] . '</option>';
                    }

                ?>
              </select>
              <input value="<?= $fecha_ida ?>" name='fecha_ida' type="date" class='form-control py-5' required>
              <input type="submit" value="Enviar" class='form-control py-5 btn' style="background-color: var(--colorPrincipal); color: white">
            </div>
        </form>
    </div>
</section>