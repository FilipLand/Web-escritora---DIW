<?php
// Configura las rutas y los metadatos que utilizan las plantillas comunes.
$rutaBase = '../';
$paginaActual = 'libros';
$tituloPagina = 'Mis libros | Ester López Ramos';
$descripcionPagina = 'Explora las fichas y géneros de los libros de fantasía juvenil de Ester López Ramos.';
$mostrarBanner = false;
// Datos provisionales que alimentan tanto las tarjetas como sus atributos de filtrado.
$libros = [
    [
        'titulo' => 'Obra de muestra 01',
        'generos' => ['Fantasía', 'Juvenil', 'Novela'],
        'edad' => '16-24',
        'longitud' => 'Novela',
        'editorial' => 'Por confirmar',
        'imagen' => 'portada-niebla.svg',
        'descripcion' => 'Ficha de ejemplo para mostrar el diseño del catálogo. Sustituye estos datos por la información editorial confirmada.',
    ],
    [
        'titulo' => 'Obra de muestra 02',
        'generos' => ['Fantasía', 'Novela', 'Sobrenatural'],
        'edad' => '16-24',
        'longitud' => 'Novela',
        'editorial' => 'Por confirmar',
        'imagen' => 'portada-portal.svg',
        'descripcion' => 'Ficha provisional. Aquí podrás contar de qué trata el libro y qué encontrará el lector en sus páginas.',
    ],
    [
        'titulo' => 'Obra de muestra 03',
        'generos' => ['Misterio', 'Ficción', 'Juvenil', 'Novela'],
        'edad' => '16-24',
        'longitud' => 'Novela corta',
        'editorial' => 'Por confirmar',
        'imagen' => 'portada-constelacion.svg',
        'descripcion' => 'Ejemplo de ficha sin datos de venta: esta web presenta las obras y no vende libros.',
    ],
];
// Opciones disponibles en el filtro por género; deben mantenerse coherentes con las fichas.
$generos = ['Fantasía', 'Misterio', 'Juvenil', 'Novela', 'Sobrenatural', 'Ficción'];
// Carga la estructura común de la página antes de mostrar el catálogo.
include __DIR__ . '/../templates/cabezado.php';
include __DIR__ . '/../templates/menu.php';
?>

<main id="contenido" class="page-main">
    <!-- Identidad compacta de la autora y enlace de regreso al inicio. -->
    <div class="catalog-author section-wrap">
        <a href="../index.php" aria-label="Volver al inicio">
            <img src="../images/autora-editorial.svg" alt="Ilustración provisional de Ester López Ramos">
        </a>
        <p><strong>Ester López Ramos</strong><span>Escritora de fantasía juvenil</span></p>
        <a class="text-link" href="../index.php">Inicio <span aria-hidden="true">→</span></a>
    </div>
    <section class="page-heading section-wrap">
        <p class="eyebrow">Biblioteca fantástica</p>
        <h1>Mis libros</h1>
        <p class="lead">Historias para cruzar fronteras, descubrir otros mundos y acompañar a personajes que se atreven a cambiar su destino.</p>
    </section>

    <!-- Catálogo, filtros y resultados que actualiza funciones.js en el navegador. -->
    <section class="catalog section-wrap" aria-label="Catálogo de libros">
        <aside class="catalog-sidebar">
            <div class="filter-panel">
                <h2>Géneros</h2>
                <div class="filter-options">
                    <!-- Genera las casillas desde la lista de géneros configurada arriba. -->
                    <?php foreach ($generos as $genero): ?>
                        <label class="check-row">
                            <input type="checkbox" name="genero" value="<?= htmlspecialchars($genero, ENT_QUOTES, 'UTF-8') ?>" data-filter-genre>
                            <span><?= htmlspecialchars($genero, ENT_QUOTES, 'UTF-8') ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
                <h2 class="filter-subtitle">Filtros</h2>
                <label class="filter-label" for="filter-age">Edad recomendada</label>
                <select id="filter-age" data-filter-age>
                    <option value="">Todas las edades</option>
                    <option value="16-24">16–24 años</option>
                </select>
                <label class="filter-label" for="filter-length">Longitud</label>
                <select id="filter-length" data-filter-length>
                    <option value="">Todas</option>
                    <option value="Novela">Novela</option>
                    <option value="Novela corta">Novela corta</option>
                </select>
                <label class="filter-label" for="filter-publisher">Editorial</label>
                <select id="filter-publisher" data-filter-publisher>
                    <option value="">Todas</option>
                    <option value="Por confirmar">Por confirmar</option>
                </select>
                <button class="button button-outline filter-reset" type="button" data-filter-reset>Limpiar filtros</button>
            </div>
            <div class="sidebar-note">
                <span class="note-star" aria-hidden="true">✦</span>
                <p>Este espacio es informativo. Para comprar un libro, consulta los canales oficiales de cada editorial o librería.</p>
            </div>
        </aside>

        <div class="catalog-content">
            <!-- El buscador, el contador y las fichas usan atributos data-* para el filtrado. -->
            <div class="catalog-toolbar">
                <p><strong data-results-count><?= count($libros) ?></strong> fichas</p>
                <label class="sr-only" for="catalog-search">Buscar por título o género</label>
                <input id="catalog-search" type="search" placeholder="Buscar por título o género" data-filter-search>
            </div>
            <p class="notice-inline">Fichas y cubiertas de muestra: los títulos, editoriales y descripciones deben reemplazarse por los datos reales antes de publicar.</p>
            <div class="catalog-list" data-catalog-list>
                <!-- Convierte cada elemento de datos en una tarjeta con valores escapados. -->
                <?php foreach ($libros as $indice => $libro): ?>
                    <?php
                    // El separador permite que JavaScript recupere los géneros por separado.
                    $generosTexto = implode('|', $libro['generos']);
                    ?>
                    <article class="catalog-book"
                             data-book-card
                             data-title="<?= htmlspecialchars($libro['titulo'], ENT_QUOTES, 'UTF-8') ?>"
                             data-genres="<?= htmlspecialchars($generosTexto, ENT_QUOTES, 'UTF-8') ?>"
                             data-age="<?= htmlspecialchars($libro['edad'], ENT_QUOTES, 'UTF-8') ?>"
                             data-length="<?= htmlspecialchars($libro['longitud'], ENT_QUOTES, 'UTF-8') ?>"
                             data-publisher="<?= htmlspecialchars($libro['editorial'], ENT_QUOTES, 'UTF-8') ?>">
                        <div class="catalog-cover">
                            <img src="../images/<?= htmlspecialchars($libro['imagen'], ENT_QUOTES, 'UTF-8') ?>" alt="Cubierta ilustrativa de <?= htmlspecialchars($libro['titulo'], ENT_QUOTES, 'UTF-8') ?>">
                        </div>
                        <div class="catalog-book-copy">
                            <p class="book-category"><?= htmlspecialchars(implode(' · ', $libro['generos']), ENT_QUOTES, 'UTF-8') ?></p>
                            <h2><?= htmlspecialchars($libro['titulo'], ENT_QUOTES, 'UTF-8') ?></h2>
                            <p><?= htmlspecialchars($libro['descripcion'], ENT_QUOTES, 'UTF-8') ?></p>
                            <dl class="book-facts">
                                <div><dt>Edad</dt><dd><?= htmlspecialchars($libro['edad'], ENT_QUOTES, 'UTF-8') ?> años</dd></div>
                                <div><dt>Formato</dt><dd><?= htmlspecialchars($libro['longitud'], ENT_QUOTES, 'UTF-8') ?></dd></div>
                                <div><dt>Editorial</dt><dd><?= htmlspecialchars($libro['editorial'], ENT_QUOTES, 'UTF-8') ?></dd></div>
                            </dl>
                            <a class="text-link" href="../paginas/Contacto.php?asunto=libro">Consultar sobre esta obra <span aria-hidden="true">→</span></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <p class="empty-state" data-empty-state hidden>No hay libros que coincidan con esos filtros. Prueba a cambiar tu búsqueda.</p>
        </div>
    </section>
</main>

<!-- Añade el pie de página común. -->
<?php include __DIR__ . '/../templates/piePagina.php'; ?>