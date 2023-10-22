<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100%;">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="images/logo-right-nb.svg" alt="" width="250">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="?p=usuarios" class="nav-link <?= $pagina == 'usuarios' ? 'active' : 'link-dark' ?>" aria-current="page">
                <i class="fa-solid fa-users me-2"></i>
                Usuarios
            </a>
        </li>
        <li>
            <a href="?p=rutas" class="nav-link <?= $pagina == 'rutas' ? 'active' : 'link-dark' ?>">
                <i class="fa-solid fa-route me-2"></i>
                Rutas
            </a>
        </li>
        <li>
            <a href="?p=buses" class="nav-link <?= $pagina == 'buses' ? 'active' : 'link-dark' ?>">
                <i class="fa-solid fa-bus me-2"></i>
                Buses
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <strong><?= $_SESSION['Nombre_Completo'] ?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
        </ul>
    </div>
</div>
