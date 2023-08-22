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
        <div class="carta">
            <h1 class="titulo">Bienvenido</h1>
            <form action="" class="formulario">
                <div class="caja-input">
                    <input class="input-form" type="text" placeholder=" " required>
                    <label class="input-label" for="">Correo</label>
                </div>
                <div class="caja-input">
                    <input class="input-form" type="password" placeholder=" " required>
                    <label class="input-label" for="">Contraseña</label>
                </div>
                <input type="submit" value="Ingresar" class="enviar-formulario">
            </form>
            <p>¿No estas registrado? <a href="registro.php">Registrate aquí</a></p>
        </div>
    </div>
    <?php include("components/scripts.php") ?>
</body>
</html>