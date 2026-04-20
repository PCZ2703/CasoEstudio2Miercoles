<?php $baseMenu = (basename($_SERVER['SCRIPT_NAME']) === 'index.php') ? '' : '../'; ?>
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= $baseMenu ?>index.php">
            <i class="bi bi-house-heart-fill me-2"></i>
            CasasSystem
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseMenu ?>Controller/CasasController.php?action=consulta">
                        <i class="bi bi-search me-1"></i>Consulta de Casas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $baseMenu ?>Controller/CasasController.php?action=alquiler">
                        <i class="bi bi-key-fill me-1"></i>Alquiler de Casas
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
 
<div class="page-hero">
    <div class="container">
        <div class="hero-content">
            <i class="bi bi-buildings hero-icon"></i>
        </div>
    </div>
</div>