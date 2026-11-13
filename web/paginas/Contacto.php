<?php
// Inicia o reutiliza la sesión para proteger el formulario con un token CSRF.
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// Genera un token aleatorio por sesión; el formulario lo enviará de vuelta al servidor.
if (empty($_SESSION['contacto_csrf'])) {
    $_SESSION['contacto_csrf'] = bin2hex(random_bytes(32));
}
// Configura los metadatos y las rutas relativos a esta página interior.
$rutaBase = '../';
$paginaActual = 'contacto';
$tituloPagina = 'Contacto | Ester López Ramos';
$descripcionPagina = 'Contacta con Ester López Ramos, escritora de fantasía juvenil.';
$mostrarBanner = false;
// Reutiliza las plantillas comunes de cabecera y navegación.
include __DIR__ . '/../templates/cabezado.php';
include __DIR__ . '/../templates/menu.php';
// El controlador redirige aquí con un estado para mostrar el resultado del envío.
$estado = isset($_GET['estado']) ? (string) $_GET['estado'] : '';
?>

<main id="contenido" class="page-main">
    <!-- Presentación de la página y medios de contacto de la autora. -->
    <section class="page-heading section-wrap">
        <p class="eyebrow">Estoy al otro lado</p>
        <h1>Contacto</h1>
        <p class="lead">Para consultas sobre mis libros, propuestas, prensa o eventos, puedes escribirme mediante el formulario o por correo electrónico.</p>
    </section>

    <!-- Distribuye el perfil de contacto y el formulario en dos columnas. -->
    <section class="contact-layout section-wrap">
        <div class="contact-profile">
            <a class="contact-portrait" href="../index.php" aria-label="Volver al inicio">
                <img src="../images/autora-escritora.png" alt="Ilustración de Ester López Ramos escribiendo en su escritorio">
                <span class="image-caption">Ilustración · pulsa para volver al inicio</span>
            </a>
            <h2>Ester López Ramos</h2>
            <p>Escritora de fantasía juvenil</p>
            <a class="contact-email" href="mailto:contacto@ester.com">contacto@ester.com <span aria-hidden="true">↗</span></a>
            <div class="social-block">
                <h3>También en redes</h3>
                <p class="social-note">Perfiles oficiales pendientes de confirmar. Estos enlaces llevan a las plataformas.</p>
                <div class="social-links">
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">Instagram <span aria-hidden="true">↗</span></a>
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">Facebook <span aria-hidden="true">↗</span></a>
                    <a href="https://x.com/" target="_blank" rel="noopener noreferrer">X <span aria-hidden="true">↗</span></a>
                    <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer">YouTube <span aria-hidden="true">↗</span></a>
                    <a href="https://www.escritores.org/" target="_blank" rel="noopener noreferrer">Web de escritoras <span aria-hidden="true">↗</span></a>
                </div>
            </div>
        </div>

        <div class="contact-form-panel">
            <p class="eyebrow">Cuéntame</p>
            <h2>Envíame un mensaje</h2>
            <!-- Informa del resultado de la última petición cuando el controlador redirige. -->
            <?php if ($estado === 'enviado'): ?>
                <p class="form-feedback form-feedback-success" role="status">Tu mensaje se ha enviado correctamente. Gracias por escribirme.</p>
            <?php elseif ($estado === 'no-disponible'): ?>
                <p class="form-feedback form-feedback-error" role="alert">El servidor no pudo enviar tu mensaje. Escríbeme directamente a <a href="mailto:contacto@ester.com">contacto@ester.com</a>.</p>
            <?php elseif ($estado === 'datos'): ?>
                <p class="form-feedback form-feedback-error" role="alert">Revisa los datos: el nombre, un correo válido y un mensaje son obligatorios.</p>
            <?php elseif ($estado === 'sesion'): ?>
                <p class="form-feedback form-feedback-error" role="alert">No se pudo validar el formulario. Recarga la página e inténtalo de nuevo.</p>
            <?php endif; ?>
            <!-- Los campos HTML y el controlador formulario.php validan los mismos límites. -->
            <form class="contact-form" action="../formulario.php" method="post">
                <!-- El servidor compara este valor con el token guardado en la sesión. -->
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['contacto_csrf'], ENT_QUOTES, 'UTF-8') ?>">
                <div class="form-row">
                    <div class="form-field">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" autocomplete="name" maxlength="100" required>
                    </div>
                    <div class="form-field">
                        <label for="email">Correo electrónico</label>
                        <input id="email" name="email" type="email" autocomplete="email" maxlength="254" required>
                    </div>
                </div>
                <div class="form-field">
                    <label for="asunto">Asunto <span class="optional">(opcional)</span></label>
                    <input id="asunto" name="asunto" type="text" maxlength="120" value="<?= isset($_GET['asunto']) && $_GET['asunto'] === 'libro' ? 'Consulta sobre un libro' : '' ?>">
                </div>
                <div class="form-field">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="6" maxlength="5000" required></textarea>
                </div>
                <label class="check-row consent-row">
                    <input type="checkbox" name="consentimiento" value="1" required>
                    <span>He leído la <a href="AvisoLegal.php#privacidad">información de privacidad</a> y acepto el tratamiento de mis datos para responder a este mensaje.</span>
                </label>
                <button class="button button-dark" type="submit">Enviar mensaje <span aria-hidden="true">→</span></button>
                <!-- Reitera brevemente el uso previsto de los datos enviados. -->
                <p class="form-privacy">Los datos se utilizarán únicamente para responder a tu consulta. Más información en la <a href="AvisoLegal.php#privacidad">política de privacidad</a>.</p>
            </form>
        </div>
    </section>
</main>

<!-- Cierra la estructura compartida del sitio. -->
<?php include __DIR__ . '/../templates/piePagina.php'; ?>
