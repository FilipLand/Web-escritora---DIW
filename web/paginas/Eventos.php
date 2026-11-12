<?php
// Metadatos de la página de eventos y configuración de sus rutas relativas.
$rutaBase = '../';
$paginaActual = 'eventos';
$tituloPagina = 'Eventos | Ester López Ramos';
$descripcionPagina = 'Consulta la agenda de eventos y encuentros de Ester López Ramos.';
$mostrarBanner = false;
// Incluye los elementos compartidos por todas las páginas interiores.
include __DIR__ . '/../templates/cabezado.php';
include __DIR__ . '/../templates/menu.php';
?>

<main id="contenido" class="page-main">
    <!-- Explica qué tipo de actividades se publicarán en esta página. -->
    <section class="page-heading section-wrap">
        <p class="eyebrow">Nos encontramos entre páginas</p>
        <h1>Eventos</h1>
        <p class="lead">Presentaciones, encuentros lectores, firmas y otras actividades relacionadas con mis libros.</p>
    </section>

    <!-- Presenta por separado la agenda futura y el archivo de eventos anteriores. -->
    <section class="event-sections section-wrap">
        <div class="event-column">
            <div class="section-heading compact-heading">
                <div><p class="eyebrow">Próximamente</p><h2>Próximos eventos</h2></div>
            </div>
            <div class="empty-card">
                <span class="empty-icon" aria-hidden="true">✦</span>
                <h3>La agenda está tomando forma</h3>
                <p>Cuando haya nuevas fechas confirmadas, aparecerán aquí con el lugar, la hora y los detalles para asistir.</p>
                <a class="text-link" href="Contacto.php">Consultar por un evento <span aria-hidden="true">→</span></a>
            </div>
        </div>
        <div class="event-column event-past">
            <div class="section-heading compact-heading">
                <div><p class="eyebrow">Recuerdos compartidos</p><h2>Eventos anteriores</h2></div>
            </div>
            <div class="empty-card">
                <span class="empty-icon" aria-hidden="true">✧</span>
                <h3>Pronto habrá más recuerdos</h3>
                <p>En esta sección se reunirán los encuentros y actividades en los que haya participado la autora.</p>
                <a class="text-link" href="Contacto.php">Escríbeme <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>
</main>

<!-- Pie de página compartido. -->
<?php include __DIR__ . '/../templates/piePagina.php'; ?>