<?php

include('modules/funciones.php');

// Incluir lógica de validación y manejo de errores aquí

// Crear espacio para agregar los errores
$errores = array();

// Abrir logica al mandar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Creación de las variables que son mandadas por los campos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];
    
    // Valida que el input de nombre no este vacio
    if (empty($nombre)) {
        $errores["nombre"] = "El nombre completo es requerido";
    }

    // Valida que el input de correo no este vacio
    if (empty($correo)) {
        $errores["correo"] = "El correo es requerido";

    // Valida que el input de correo sea un correo valido
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores["correo"] = "El correo no es válido";
    }

    // Valida que el input de telefono no este vacio
    if (empty($telefono)) {
        $errores["telefono"] = "El teléfono es requerido";

    // Valida que el input de telefono sea un formato correcto
    } elseif (!preg_match('/^[0-9]{10}$/', $telefono)) {
        $errores["telefono"] = "El teléfono no es válido";
    }

    // Valida que el input de contraseña no este vacio
    if (empty($asunto)) {
        $errores["asunto"] = "El asunto es requerido";
    }

    // Valida que el input de contraseña no este vacio
    if (empty($mensaje)) {
        $errores["mensaje"] = "El mensaje es requerido";
    }

    // Al validar todo y ver que no hay ningun error, procede a crear el usuario
    if (empty($errores)) {

        // Se crea el comando que se va a realizar
        $comando = "INSERT INTO contacto (Nombre_Completo, Correo, Telefono, Asunto, Mensaje) VALUES ('$nombre', '$correo', '$telefono', '$asunto', '$mensaje')";

        // Se realiza la consulta
        if (mysqli_query($conexionDB, $comando)) {

            // Crear una variable que nos confirme la creación del usuario
            $exito = true;

            // Limpiar los campos después de un registro exitoso
            $nombreValor = '';
            
            $correoValor = $telefonoValor = $asuntoValor = $mensajeValor = '';
       
        } else {
            // El registro fallo
            echo "Error al registrar: " . mysqli_error($conexion);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("components/links.php") ?>
    <title>Registrate - Colombia Rutas</title>
</head>
<body>
    <?php
        include("components/header.php");

        $nombreValor = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $correoValor = isset($_POST['correo']) ? $_POST['correo'] : '';
        $telefonoValor = isset($_POST['telefono']) ? $_POST['telefono'] : '';
        $asuntoValor = isset($_POST['asunto']) ? $_POST['asunto'] : '';
        $mensajeValor = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';

    ?>
    <div class="container">
        <?php if (isset($exito)): ?>
            <p class="alerta exito">Mensaje enviado correctamente. Estaremos dandote respuesta en breve</p>
        <?php endif ?>
        <div class="carta">
            <?php if (!isset($exito)): ?>
                <h1 class='mb-0'>Contacto</h1>
                <ul class='d-flex flex-row mt-3 mb-4' style='color: var(--colorPrincipal)'>
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                    </li>
                    <li>
                        <i class="fa-brands fa-whatsapp"></i>
                    </li>
                    <li>
                        <i class="fa-brands fa-facebook"></i>
                    </li>
                    <li>
                        <i class="fa-brands fa-instagram"></i>
                    </li>
                </ul>
                <form action="" method="post" class="formulario">
                    <div class="caja-input">
                        <input class="input-form" type="text" name="nombre" id="nombre" placeholder=" " value="<?php echo $nombreValor; ?>">
                        <label class="input-label" for="nombre">Nombre completo</label>
                        <?php if (isset($errores["nombre"])) { echo "<small class='error'>" . $errores["nombre"] . "</small>"; } ?>
                    </div>
                    <div class="caja-input">
                        <input class="input-form" type="text" name="correo" id="correo" placeholder=" " value="<?php echo $correoValor; ?>">
                        <label class="input-label" for="correo">Correo</label>
                        <?php if (isset($errores["correo"])) { echo "<small class='error'>" . $errores["correo"] . "</small>"; } ?>
                    </div>
                    <div class="caja-input">
                        <input class="input-form" type="text" name="telefono" id="telefono" placeholder=" " value="<?php echo $telefonoValor; ?>">
                        <label class="input-label" for="telefono">Teléfono</label>
                        <?php if (isset($errores["telefono"])) { echo "<small class='error'>" . $errores["telefono"] . "</small>"; } ?>
                    </div>
                    <div class="caja-input">
                        <input class="input-form" type="text" name="asunto" id="asunto" placeholder=" " value="<?php echo $asuntoValor; ?>">
                        <label class="input-label" for="asunto">Asunto</label>
                        <?php if (isset($errores["asunto"])) { echo "<small class='error'>" . $errores["asunto"] . "</small>"; } ?>
                    </div>
                    <div class="caja-input">
                        <textarea class="input-form p-2" name="mensaje" rows='3' id="mensaje" placeholder=" " value="<?php echo $mensajeValor; ?>"></textarea>
                        <label class="input-label" for="mensaje">Mensaje</label>
                        <?php if (isset($errores["mensaje"])) { echo "<small class='error'>" . $errores["mensaje"] . "</small>"; } ?>
                    </div>
                    <input type="submit" value="Enviar" class="enviar-formulario">
                </form>
            <?php endif ?>
        </div>
    </div>
    <?php
        include("components/footer.php");
    ?>
    <?php include("components/scripts.php") ?>
</body>
</html>
