<?php
// La ruta base cambia según el nivel de directorios de la página que incluye el pie.
$rutaBase = $rutaBase ?? '';
?>
<!-- Pie compartido con enlaces internos, legales y de contacto. -->
<footer class="site-footer">
    <div class="footer-main">
        <!-- Identidad del sitio y medio de contacto principal. -->
        <div class="footer-about">
            <a class="footer-brand" href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>index.php">
                <img src="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>images/logo-ester.svg" alt="">
                <span>Ester López Ramos</span>
            </a>
            <p>Un espacio para descubrir historias de fantasía juvenil, novedades y los próximos encuentros.</p>
            <a class="footer-email" href="mailto:contacto@ester.com">contacto@ester.com</a>
        </div>
        <!-- Enlaces de navegación agrupados por propósito. -->
        <div class="footer-column">
            <h2>Navegación</h2>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/MisLibros.php">Mis libros</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/SobreMi.php">Sobre mí</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/Eventos.php">Eventos</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/Prensa.php">Prensa</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/Contacto.php">Contacto</a>
        </div>
        <div class="footer-column">
            <h2>Información legal</h2>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/AvisoLegal.php#aviso-legal">Aviso legal y propiedad intelectual</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/AvisoLegal.php#privacidad">Privacidad y protección de datos</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/AvisoLegal.php#cookies">Política de cookies</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/AvisoLegal.php#terminos">Términos y condiciones</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/AvisoLegal.php#accesibilidad">Accesibilidad web</a>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/AvisoLegal.php#seguridad">Seguridad digital y notificaciones</a>
        </div>
        <div class="footer-column footer-domain">
            <h2>En línea</h2>
            <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>index.php">EsterLibros.es</a>
            <p>© <?= date('Y') ?> Ester López Ramos.<br>Todos los derechos reservados.</p>
        </div>
    </div>
    <!-- Franja inferior con derechos de autor y acceso a la información legal. -->
    <div class="footer-bottom">
        <span>Hecho para amantes de la fantasía.</span>
        <a href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/AvisoLegal.php">Privacidad · Legal · Accesibilidad</a>
    </div>
</footer>
</body>
</html>