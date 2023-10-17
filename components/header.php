<header>
    <div class="container encabezado">
        <a href="index.php">
            <img src="images/logo-right-nb.svg" alt="" width="300">
        </a>
        <nav class="navegacion">
            <a class="enlace" href="viajes.php">Viajes</a>
            <a class="enlace" href="sobre-nosotros.php">Sobre nosotros</a>
            <a class="enlace" href="contacto.php">Contacto</a>
            <?php if(!estaLoggeado()): ?>
                <a class="enlace" href="iniciar-sesion.php"><i class="fa-regular fa-user"></i></a>
            <?php else: ?>
                <a class="enlace" href="logout.php">Cerrar sesión</a>
            <?php endif; ?>
        </nav>
    </div>
</header>