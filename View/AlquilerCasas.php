<?php
// Obtenemos los datos del Controller
$casasDisponibles = ConsultarCasasDisponibles();
?>
 
<?php include '../View/layout/header.php'; ?>
<?php include '../View/layout/navbar.php'; ?>
 
<main class="main-content">
    <div class="container">
 
        <!-- Título -->
        <div class="mb-4 fade-in-up">
            <div class="title-accent"></div>
            <h1 class="page-title">
                <i class="bi bi-key-fill me-2" style="color: var(--accent);"></i>
                Alquiler de Casas de CasasSystem
            </h1>
            <p class="page-subtitle">Seleccione una casa disponible y complete los datos para alquilar</p>
        </div>
 
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="custom-card fade-in-up">
 
                    <!-- Mensaje de sesión si viene del controller -->
                    <?php if (isset($_SESSION["Mensaje"])): ?>
                        <div class="alert-custom-error mb-3">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <?= htmlspecialchars($_SESSION["Mensaje"]); unset($_SESSION["Mensaje"]); ?>
                        </div>
                    <?php endif; ?>
 
                    <form id="formAlquiler" method="POST" action="../Controller/CasasController.php?action=procesar" novalidate>
 
                        <!-- Casa -->
                        <div class="mb-3">
                            <label for="ddlIdCasa" class="form-label">
                                <i class="bi bi-house me-1"></i> Casa
                            </label>
                            <select id="ddlIdCasa" name="IdCasa" class="form-select">
                                <option value="">-- Seleccione una casa --</option>
                                <?php if ($casasDisponibles && $casasDisponibles->num_rows > 0): ?>
                                    <?php while ($casa = $casasDisponibles->fetch_assoc()): ?>
                                        <option
                                            value="<?= $casa['IdCasa'] ?>"
                                            data-precio="<?= $casa['PrecioCasa'] ?>">
                                            <?= htmlspecialchars($casa['DescripcionCasa']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                            <small id="errorCasa" class="error-msg text-danger" style="display:none;">
                                <i class="bi bi-exclamation-circle me-1"></i>Debe seleccionar una casa.
                            </small>
                        </div>
 
                        <!-- Precio (readonly) -->
                        <div class="mb-3">
                            <label for="txtPrecioCasa" class="form-label">
                                <i class="bi bi-currency-dollar me-1"></i> Precio Mensual
                            </label>
                            <div class="input-group">
                                <span class="input-group-text" style="background:#f0ede8; border-color:var(--border);">₡</span>
                                <input
                                    type="text"
                                    id="txtPrecioCasa"
                                    class="form-control"
                                    placeholder="Se carga al seleccionar la casa"
                                    readonly>
                            </div>
                            <small class="text-muted" style="font-size:0.8rem;">
                                Este campo se completa automáticamente.
                            </small>
                        </div>
 
                        <!-- Usuario -->
                        <div class="mb-4">
                            <label for="txtUsuarioAlquiler" class="form-label">
                                <i class="bi bi-person me-1"></i> Usuario Alquiler
                            </label>
                            <input
                                type="text"
                                id="txtUsuarioAlquiler"
                                name="UsuarioAlquiler"
                                class="form-control"
                                placeholder="Ingrese su nombre de usuario"
                                maxlength="30">
                            <small id="errorUsuario" class="error-msg text-danger" style="display:none;">
                                <i class="bi bi-exclamation-circle me-1"></i>El usuario es requerido.
                            </small>
                        </div>
 
                        <!-- Botones -->
                        <div class="d-flex gap-2">
                            <button type="submit" id="btnAlquilar" class="btn-primary-custom">
                                <i class="bi bi-key-fill me-2"></i>Alquilar
                            </button>
                            <a href="../Controller/CasasController.php?action=consulta" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Volver
                            </a>
                        </div>
 
                    </form>
                </div>
            </div>
        </div>
 
    </div>
</main>
 
<?php include '../View/layout/footer.php'; ?>