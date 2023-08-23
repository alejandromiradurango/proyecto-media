<?php 

include('modules/funciones.php');

// Incluir lógica de validación y manejo de errores aquí

// Crear espacio para agregar los errores
$errores = array();

// Abrir logica al mandar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Creación de las variables que son mandadas por los campos del formulario
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Valida que el input de correo no este vacio
    if (empty($correo)) {
        $errores["correo"] = "El correo es requerido";

    // Valida que el input de correo sea un correo valido
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores["correo"] = "El correo no es válido";
    }

    // Valida que el input de contraseña no este vacio
    if (empty($contrasena)) {
        $errores["contrasena"] = "La contraseña es requerida";
    }

    // Al validar todo y ver que no hay ningun error, procede a crear el usuario
    if (empty($errores)) {

        $comando = "SELECT Id_usuario, Correo_Electronico, Contrasena, Nombre_Completo FROM usuarios WHERE Correo_Electronico = '$correo'";

        $usuario = ejecutarConsulta($conexion, $comando);


        if ($usuario) {
            if (password_verify($contrasena, $usuario["Contrasena"])) {
                session_start();
    
                $_SESSION["Nombre_Completo"] = $usuario["Nombre_Completo"];
                $_SESSION["Id_usuario"] = $usuario["Id_usuario"];
    
                header("Location: index.php");
            } else {
                $mensaje_error = "Credenciales inválidas. Inténtalo de nuevo.";
            }
        } else {
            $mensaje_error = "Credenciales inválidas. Inténtalo de nuevo.";
        }

        

    }
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("components/links.php") ?>
    <title>Iniciar sesión - Colombia Rutas</title>
</head>
<body>
    <?php
        include("components/header.php");
    ?>
    <div class="container">
        <?php if (isset($mensaje_error)) { ?>
            <p class="alerta error"><?= $mensaje_error; ?>!</p>
        <?php } ?>
        <div class="carta">
            <h1 class="titulo">Bienvenido</h1>
            <form action="" class="formulario" method="post">
                <div class="caja-input">
                    <input class="input-form" type="text" placeholder=" " name="correo" id="correo">
                    <label class="input-label" for="correo">Correo</label>
                    <?php if (isset($errores["correo"])) { echo "<small class='error'>" . $errores["correo"] . "</small>"; } ?>
                </div>
                <div class="caja-input">
                    <input class="input-form" type="password" placeholder=" " name="contrasena" id="contrasena">
                    <label class="input-label" for="password">Contraseña</label>
                    <?php if (isset($errores["contrasena"])) { echo "<small class='error'>" . $errores["contrasena"] . "</small>"; } ?>
                </div>
                <input type="submit" value="Ingresar" class="enviar-formulario">
            </form>
            <p>¿No estas registrado? <a href="registro.php">Registrate aquí</a></p>
        </div>
    </div>
    <?php include("components/scripts.php") ?>
</body>
</html>