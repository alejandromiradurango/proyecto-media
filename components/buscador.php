<?php

    $ciudades = ejecutarConsulta('SELECT * FROM ciudades');
    
?>

<section class="buscador">
    <div class="container">
        <form action="">
            <select name="" id="">
            <?php

              foreach ($ciudades as $ciudad) {
                echo '<option>' . $ciudad['Nombre_ciudad'] . ' , ' . $ciudad['Departamento'] . '</option>';
              }  

            ?>
            </select>
            <input type="text">
            <input type="date">
            <input type="submit" value="Enviar">
        </form>
    </div>
</section>