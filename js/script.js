// ==========================================
// Comercial MELINA - script.js
// ==========================================

document.addEventListener('DOMContentLoaded', function () {

    /* ---- Menú hamburguesa (móvil) ---- */
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function () {
            mainNav.classList.toggle('open');
        });

        // Cerrar el menú al hacer clic en un enlace (mejor experiencia móvil)
        mainNav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                mainNav.classList.remove('open');
            });
        });
    }

    /* ---- Botón "volver arriba" ---- */
    const btnScrollTop = document.getElementById('btnScrollTop');
    if (btnScrollTop) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) {
                btnScrollTop.classList.add('show');
            } else {
                btnScrollTop.classList.remove('show');
            }
        });
        btnScrollTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    /* ---- Filtro de productos (página productos.php) ---- */
    const filtroBotones = document.querySelectorAll('.filtro-btn');
    const productoCards = document.querySelectorAll('.producto-card');

    if (filtroBotones.length && productoCards.length) {
        filtroBotones.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filtroBotones.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const categoria = btn.getAttribute('data-categoria');

                productoCards.forEach(function (card) {
                    if (categoria === 'todos' || card.getAttribute('data-categoria') === categoria) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    /* ---- Validación del formulario de contacto (lado cliente) ---- */
    const formContacto = document.getElementById('formContacto');

    if (formContacto) {
        formContacto.addEventListener('submit', function (e) {
            let esValido = true;

            const campos = [
                { id: 'nombre', mensaje: 'Por favor ingresa tu nombre.' },
                { id: 'email', mensaje: 'Ingresa un correo electrónico válido.' },
                { id: 'mensaje', mensaje: 'Escribe tu mensaje.' }
            ];

            campos.forEach(function (campo) {
                const input = document.getElementById(campo.id);
                const errorSpan = document.getElementById('error-' + campo.id);
                let valido = input.value.trim() !== '';

                if (campo.id === 'email' && valido) {
                    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    valido = regexEmail.test(input.value.trim());
                }

                if (!valido) {
                    esValido = false;
                    if (errorSpan) errorSpan.textContent = campo.mensaje;
                    input.style.borderColor = '#d32f2f';
                } else {
                    if (errorSpan) errorSpan.textContent = '';
                    input.style.borderColor = '#ddd';
                }
            });

            if (!esValido) {
                e.preventDefault(); // Evita el envío al servidor si algo falla en el cliente
            }
        });
    }

});
