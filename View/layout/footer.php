    <footer class="custom-footer mt-auto">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="footer-brand">
                        <i class="bi bi-house-heart-fill me-2"></i>CasasSystem
                    </span>
                    <p class="footer-sub mb-0">Sistema de gestión de alquileres</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="footer-copy mb-0">
                        &copy; <?= date('Y') ?> Universidad Fidélitas &nbsp;|&nbsp; Ambiente Web Cliente Servidor &nbsp;|&nbsp; Desarrollador por: Grupo 6
                    </p>
                </div>
            </div>
        </div>
    </footer>
 
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Custom JS -->
    <?php $baseJs = (basename($_SERVER['SCRIPT_NAME']) === 'index.php') ? 'Assets/' : '../Assets/'; ?>
    <script src="<?= $baseJs ?>main.js"></script>
</body>
</html>