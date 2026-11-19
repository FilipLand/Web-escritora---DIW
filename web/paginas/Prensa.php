<?php
// Metadatos y ruta base de la página de prensa.
$rutaBase = '../';
$paginaActual = 'prensa';
$tituloPagina = 'Prensa | Ester López Ramos';
$descripcionPagina = 'Noticias, entrevistas y apariciones de Ester López Ramos, escritora de fantasía juvenil.';
$urlCanonica = 'https://www.esterlibros.es/paginas/Prensa.php';
$robots = 'noindex,follow';
$mostrarBanner = false;
// Inserta las plantillas compartidas de cabecera y navegación.
include __DIR__ . '/../templates/cabezado.php';
include __DIR__ . '/../templates/menu.php';
?>

<main id="contenido" class="page-main">
    <!-- Presentación de la sección de noticias, entrevistas y artículos. -->
    <section class="page-heading section-wrap">
        <p class="eyebrow">En los medios</p>
        <h1>Prensa</h1>
        <p class="lead">Noticias, entrevistas y artículos relacionados con la autora y sus libros.</p>
    </section>
    <!-- Estado vacío provisional hasta que se publiquen apariciones confirmadas. -->
    <section class="press-section section-wrap">
        <div class="press-empty">
            <span class="empty-icon" aria-hidden="true">✦</span>
            <p class="eyebrow">Novedades</p>
            <h2>Las apariciones en prensa se publicarán aquí.</h2>
            <p>Cuando haya noticias o entrevistas confirmadas, podrás encontrar el medio, la fecha y el enlace a cada publicación.</p>
            <a class="button button-dark" href="Contacto.php">Contacto de prensa <span aria-hidden="true">→</span></a>
        </div>
    </section>
</main>

<!-- Pie de página compartido. -->
<?php include __DIR__ . '/../templates/piePagina.php'; ?>