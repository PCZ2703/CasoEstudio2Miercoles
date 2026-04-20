<?php
// Obtenemos los datos del Controller
$casas = ConsultarCasas();
?>
 
<?php include '../View/layout/header.php'; ?>
<?php include '../View/layout/navbar.php'; ?>
 
<main class="main-content">
    <div class="container">
 
        <!-- Mensajes de Sesión -->
        <?php if (isset($_SESSION["Mensaje"])): ?>
            <div class="alert alert-info fade-in-up mb-3">
                <i class="bi bi-info-circle-fill me-2"></i>
                <?= htmlspecialchars($_SESSION["Mensaje"]); unset($_SESSION["Mensaje"]); ?>
            </div>
        <?php endif; ?>
 
        <!-- Título -->
        <div class="mb-4 fade-in-up">
            <div class="title-accent"></div>
            <h1 class="page-title">
                <i class="bi bi-search me-2" style="color: var(--accent);"></i>
                Consulta de Casas de CasasSystem
            </h1>
            <p class="page-subtitle">
                Casas disponibles con precio entre ₡115,000 y ₡180,000 &mdash; ordenadas por disponibilidad
            </p>
        </div>
 
        <!-- Tabla -->
        <div class="custom-card fade-in-up">
 
            <?php if ($casas && $casas->num_rows > 0): ?>
 
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th><i class="bi bi-house me-1"></i> Descripción</th>
                                <th><i class="bi bi-currency-dollar me-1"></i> Precio Mensual</th>
                                <th><i class="bi bi-person me-1"></i> Usuario</th>
                                <th><i class="bi bi-circle-fill me-1"></i> Estado</th>
                                <th><i class="bi bi-calendar3 me-1"></i> Fecha Alquiler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = $casas->fetch_assoc()): ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($fila['DescripcionCasa']) ?></strong></td>
                                <td class="precio-format">
                                    ₡<?= number_format($fila['PrecioCasa'], 2, '.', ',') ?>
                                </td>
                                <td><?= htmlspecialchars($fila['Usuario']) ?></td>
                                <td>
                                    <?php if ($fila['Estado'] === 'Disponible'): ?>
                                        <span class="badge-disponible">
                                            <i class="bi bi-check-circle-fill me-1"></i>Disponible
                                        </span>
                                    <?php else: ?>
                                        <span class="badge-reservada">
                                            <i class="bi bi-lock-fill me-1"></i>Reservada
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $fila['FechaFormateada'] ?? '<span style="color:var(--text-muted)">—</span>' ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
 
            <?php else: ?>
                <div class="empty-state">
                    <i class="bi bi-house-slash"></i>
                    <p>No se encontraron casas en el rango de precio indicado.</p>
                </div>
            <?php endif; ?>
 
        </div>
 
        <!-- Botón alquilar -->
        <div class="mt-3 fade-in-up">
            <a href="../Controller/CasasController.php?action=alquiler" class="btn-accent-custom">
                <i class="bi bi-key-fill me-2"></i>Ir a Alquilar
            </a>
        </div>
 
    </div>
</main>
 
<?php include '../View/layout/footer.php'; ?>
 