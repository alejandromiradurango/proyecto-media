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
    $contrasena = $_POST["contrasena"];
    $repetirContrasena = $_POST["repetir_contrasena"];
    
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
    if (empty($contrasena)) {
        $errores["contrasena"] = "La contraseña es requerida";
    }

    // Valida que los inputs de contraseña sean los mismos
    if ($contrasena !== $repetirContrasena) {
        $errores["repetir_contrasena"] = "Las contraseñas no coinciden";
    }

    // Al validar todo y ver que no hay ningun error, procede a crear el usuario
    if (empty($errores)) {

        // Se crea una contraseña segura para insertar en la base de datos
        $contrasenaSegura = password_hash($contrasena, PASSWORD_DEFAULT);

        // Se crea el comando que se va a realizar
        $comando = "INSERT INTO usuarios (Nombre_Completo, Correo_Electronico, Contrasena, Telefono) VALUES ('$nombre', '$correo', '$contrasenaSegura', '$telefono')";

        // Se realiza la consulta
        if (mysqli_query($conexion, $comando)) {

            // Crear una variable que nos confirme la creación del usuario
            $exito = true;

            // Limpiar los campos después de un registro exitoso
            $nombreValor = '';
            
            $correoValor = $telefonoValor = $contrasenaValor = $repetirContrasenaValor = '';
       
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
        $contrasenaValor = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
        $repetirContrasenaValor = isset($_POST['repetir_contrasena']) ? $_POST['repetir_contrasena'] : '';

        $usuarioCreado = $nombreValor;

    ?>
    <div class="container">
        <?php if (isset($exito)) { ?>
            <p class="exito">Registro exitoso. ¡Bienvenido/a, <?php echo $usuarioCreado; ?>!</p>
        <?php } ?>
        <div class="carta">
            <h1>Bienvenido</h1>
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
                    <input class="input-form" type="password" name="contrasena" id="contrasena" placeholder=" " value="<?php echo $contrasenaValor; ?>">
                    <label class="input-label" for="contrasena">Contraseña</label>
                    <?php if (isset($errores["contrasena"])) { echo "<small class='error'>" . $errores["contrasena"] . "</small>"; } ?>
                </div>
                <div class="caja-input">
                    <input class="input-form" type="password" name="repetir_contrasena" id="repetir_contrasena" placeholder=" " value="<?php echo $repetirContrasenaValor; ?>">
                    <label class="input-label" for="repetir_contrasena">Repetir contraseña</label>
                    <?php if (isset($errores["repetir_contrasena"])) { echo "<small class='error'>" . $errores["repetir_contrasena"] . "</small>"; } ?>
                </div>
                <input type="submit" value="Registrarse" class="enviar-formulario">
            </form>
            <p>¿Ya estás registrado? <a href="iniciar-sesion.php">Inicia sesión aquí</a></p>
        </div>
    </div>
    <?php include("components/scripts.php") ?>
</body>
</html>
