<?php
// index.php — Página de entrada
?>

<?php include 'View/layout/header.php'; ?>
<?php include 'View/layout/navbar.php'; ?>

<main class="main-content">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">

                <!-- Hero -->
                <div class="fade-in-up mb-5">
                    <div class="title-accent mx-auto"></div>
                    <h1 class="page-title" style="font-size: 2.5rem;">
                        Bienvenido a CasasSystema
                    </h1>
                    <p class="page-subtitle" style="font-size: 1rem;">
                        Sistema de gestión y alquiler de casas 
                    </p>
                </div>

                <!-- Botones -->
                <div class="row g-4 justify-content-center fade-in-up">

                    <div class="col-md-5">
                        <a href="Controller/CasasController.php?action=consulta" class="text-decoration-none">
                            <div class="custom-card text-center h-100" style="cursor:pointer; transition: transform 0.2s;" 
                                 onmouseover="this.style.transform='translateY(-4px)'" 
                                 onmouseout="this.style.transform='translateY(0)'">
                                <i class="bi bi-search" style="font-size:2.5rem; color:var(--primary);"></i>
                                <h4 class="mt-3 mb-2" style="font-family:var(--font-display); color:var(--text-dark);">Consulta de Casas</h4>
                                <p class="text-muted" style="font-size:0.88rem;">
                                    Ver casas disponibles y reservadas con filtros de precio.
                                </p>
                                <span class="btn-primary-custom mt-2 d-inline-block">
                                    <i class="bi bi-arrow-right me-1"></i> Ir a Consulta
                                </span>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-5">
                        <a href="Controller/CasasController.php?action=alquiler" class="text-decoration-none">
                            <div class="custom-card text-center h-100" style="cursor:pointer; transition: transform 0.2s;"
                                 onmouseover="this.style.transform='translateY(-4px)'"
                                 onmouseout="this.style.transform='translateY(0)'">
                                <i class="bi bi-key-fill" style="font-size:2.5rem; color:var(--accent);"></i>
                                <h4 class="mt-3 mb-2" style="font-family:var(--font-display); color:var(--text-dark);">Alquiler de Casas</h4>
                                <p class="text-muted" style="font-size:0.88rem;">
                                    Alquilar una casa disponible ingresando sus datos.
                                </p>
                                <span class="btn-accent-custom mt-2 d-inline-block">
                                    <i class="bi bi-arrow-right me-1"></i> Ir a Alquiler
                                </span>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</main>

<?php include 'View/layout/footer.php'; ?>