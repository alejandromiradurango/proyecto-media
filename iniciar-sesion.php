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

    // Al validar todo y ver que no hay ningun error, procede a iniciar sesión
    if (empty($errores)) {

        // Se consulta el correo dado en la base de datos
        $comando = "SELECT * FROM usuarios WHERE Correo_Electronico = '$correo'";

        // Se guarda la consulta en una variable
        $usuario = mysqli_fetch_assoc(ejecutarConsulta($comando));

        // Se verifica si en la variable de usuario si hay algun dato registrado
        if ($usuario) {
            // Se procede a verificar que el hash almacenado en la base de datos y la contraseña dada coincidan
            if (password_verify($contrasena, $usuario["Contrasena"])) {
                // Se inicia la sesión
                session_start();
    
                // Se guardan las variables de sesión para asi poder utilizarlas en el resto de la pagina
                $_SESSION["Nombre_Completo"] = $usuario["Nombre_Completo"];
                $_SESSION["Id_usuario"] = $usuario["Id_usuario"];
                $_SESSION["Rol"] = $usuario["Rol"];
    
                // Si quien ingresa es administrador, es redirigido al panel de administrador
                if($usuario["Rol"] == 'Administrador') {
                    header("Location: admin.php");
                } else {
                    // Si no es admin, va a la pagina inicial
                    header("Location: index.php");
                }
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
    <?php
        include("components/footer.php");
    ?>
    <?php include("components/scripts.php") ?>
</body>
</html>