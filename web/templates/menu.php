<?php
// Define valores de respaldo para poder reutilizar la navegación desde distintas páginas.
$rutaBase = $rutaBase ?? '';
$paginaActual = $paginaActual ?? '';
// La página del catálogo omite el enlace "Inicio" porque ya tiene un enlace de regreso propio.
$esMisLibros = $paginaActual === 'libros';
// Cada entrada asocia una clave de página con el texto y su URL correspondiente.
$navegacion = [
    'inicio' => ['Inicio', $rutaBase . 'index.php'],
    'libros' => ['Mis libros', $rutaBase . 'paginas/MisLibros.php'],
    'contacto' => ['Contacto', $rutaBase . 'paginas/Contacto.php'],
    'sobre-mi' => ['Sobre mí', $rutaBase . 'paginas/SobreMi.php'],
    'eventos' => ['Eventos', $rutaBase . 'paginas/Eventos.php'],
    'prensa' => ['Prensa', $rutaBase . 'paginas/Prensa.php'],
];
?>
<!-- Navegación compartida; la página actual se identifica mediante aria-current. -->
<nav class="site-nav" aria-label="Navegación principal">
    <?php if ($rutaBase !== ''): ?>
        <a class="nav-brand" href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>index.php" aria-label="Ester López Ramos, inicio">
            <img src="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>images/logo-ester.svg" alt="">
            <span>Ester López Ramos<small>Escritora</small></span>
        </a>
    <?php endif; ?>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-links">
        <span class="menu-toggle-lines" aria-hidden="true"></span>
        <span class="sr-only">Abrir menú</span>
    </button>
    <!-- El menú desplegable y el buscador comparten el contenedor que controla el JavaScript. -->
    <div class="nav-content" id="primary-links">
        <ul class="nav-links">
            <?php foreach ($navegacion as $clave => $elemento): ?>
                <?php if ($esMisLibros && $clave === 'inicio') { continue; } ?>
                <li>
                    <a href="<?= htmlspecialchars($elemento[1], ENT_QUOTES, 'UTF-8') ?>"
                       <?= $paginaActual === $clave ? 'aria-current="page"' : '' ?>>
                        <?= htmlspecialchars($elemento[0], ENT_QUOTES, 'UTF-8') ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <form class="nav-search" role="search" action="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>paginas/MisLibros.php" method="get">
            <label class="sr-only" for="site-search">Buscar libros</label>
            <input id="site-search" type="search" name="buscar" placeholder="Buscar libros">
            <button type="submit" aria-label="Buscar">⌕</button>
        </form>
    </div>
</nav>