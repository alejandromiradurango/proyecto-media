<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("components/links.php") ?>
    <title>Registrate - Colombia Rutas</title>
</head>
<body>
    <?php
        include("components/header.php");
    ?>
    <div class="container">
        <div class="carta">
            <h1>Bienvenido</h1>
            <form action="" class="formulario">
                <div class="caja-input">
                    <input class="input-form" type="text" placeholder=" " required>
                    <label class="input-label" for="">Nombre completo</label>
                </div>
                <div class="caja-input">
                    <input class="input-form" type="text" placeholder=" " required>
                    <label class="input-label" for="">Correo</label>
                </div>
                <div class="caja-input">
                    <input class="input-form" type="text" placeholder=" " required>
                    <label class="input-label" for="">Telefono</label>
                </div>
                <div class="caja-input">
                    <input class="input-form" type="password" placeholder=" " required>
                    <label class="input-label" for="">Contraseña</label>
                </div>
                <div class="caja-input">
                    <input class="input-form" type="password" placeholder=" " required>
                    <label class="input-label" for="">Repetir contraseña</label>
                </div>
                <input type="submit" value="Registrarse" class="enviar-formulario">
            </form>
            <p>¿Ya estas registrado? <a href="iniciar-sesion.php">Inicia sesión aquí</a></p>
        </div>
    </div>
    <?php include("components/scripts.php") ?>
</body>
</html>