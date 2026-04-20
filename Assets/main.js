$(document).ready(function () {
 
    /* ============================================================
       NAVBAR — marcar link activo según URL actual
       ============================================================ */
    const currentPath = window.location.href;
    $('.custom-navbar .nav-link').each(function () {
        if (currentPath.includes($(this).attr('href'))) {
            $(this).addClass('active');
        }
    });
 
    /* ============================================================
       VISTA ALQUILER — cargar precio al cambiar el dropdown
       ============================================================ */
    $('#ddlIdCasa').on('change', function () {
        const selectedOption = $(this).find('option:selected');
        const precio = selectedOption.data('precio');
 
        if (precio) {
            // Formatea precio con separadores de miles
            const precioFormateado = parseFloat(precio).toLocaleString('es-CR', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            $('#txtPrecioCasa').val(precioFormateado);
            $('#txtPrecioCasa').addClass('precio-loaded');
        } else {
            $('#txtPrecioCasa').val('');
            $('#txtPrecioCasa').removeClass('precio-loaded');
        }
 
        // Limpia error del dropdown si existía
        $('#ddlIdCasa').removeClass('is-invalid');
        $('#errorCasa').hide();
    });
 
    /* ============================================================
       VISTA ALQUILER — validación del formulario antes de enviar
       ============================================================ */
    $('#formAlquiler').on('submit', function (e) {
        let valido = true;
 
        // Limpia errores previos
        $('.is-invalid').removeClass('is-invalid');
        $('.error-msg').hide();
 
        // Valida dropdown casa
        const idCasa = $('#ddlIdCasa').val();
        if (!idCasa || idCasa === '' || idCasa === '0') {
            $('#ddlIdCasa').addClass('is-invalid');
            $('#errorCasa').show();
            valido = false;
        }
 
        // Valida usuario
        const usuario = $('#txtUsuarioAlquiler').val().trim();
        if (usuario === '') {
            $('#txtUsuarioAlquiler').addClass('is-invalid');
            $('#errorUsuario').show();
            valido = false;
        }
 
        if (!valido) {
            e.preventDefault();
 
            // Scroll suave al primer error
            const primerError = $('.is-invalid').first();
            if (primerError.length) {
                $('html, body').animate({
                    scrollTop: primerError.offset().top - 100
                }, 300);
            }
        } else {
            // Deshabilitar botón para evitar doble submit
            $('#btnAlquilar')
                .prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm me-2"></span>Procesando...');
        }
    });
 
    /* ============================================================
       VISTA ALQUILER — limpiar error usuario al escribir
       ============================================================ */
    $('#txtUsuarioAlquiler').on('input', function () {
        if ($(this).val().trim() !== '') {
            $(this).removeClass('is-invalid');
            $('#errorUsuario').hide();
        }
    });
 
    /* ============================================================
       VISTA CONSULTA — resalta filas disponibles al hover
       ============================================================ */
    $(document).on('mouseenter', '.custom-table tbody tr', function () {
        $(this).find('.badge-disponible').css('transform', 'scale(1.05)');
    }).on('mouseleave', '.custom-table tbody tr', function () {
        $(this).find('.badge-disponible').css('transform', 'scale(1)');
    });
 
    /* ============================================================
       ANIMACIÓN — fade in rows de la tabla
       ============================================================ */
    $('.custom-table tbody tr').each(function (i) {
        $(this).css({
            'opacity': 0,
            'transform': 'translateY(10px)',
            'transition': `opacity 0.3s ease ${i * 0.05}s, transform 0.3s ease ${i * 0.05}s`
        });
        setTimeout(() => {
            $(this).css({ 'opacity': 1, 'transform': 'translateY(0)' });
        }, 50);
    });
 
    /* ============================================================
       ALERTAS — auto-ocultar después de 6 segundos
       ============================================================ */
    setTimeout(function () {
        $('.alert-custom-success, .alert-custom-error').fadeOut(500);
    }, 6000);
 
});
 