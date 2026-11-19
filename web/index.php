<?php
// Define los datos que la plantilla compartida usa para representar la página de inicio.
$rutaBase = '';
$paginaActual = 'inicio';
$tituloPagina = 'Ester López Ramos | Escritora de fantasía juvenil';
$descripcionPagina = 'Web oficial de Ester López Ramos, escritora de fantasía juvenil. Descubre sus libros, conoce su universo creativo y consulta novedades.';
$urlCanonica = 'https://www.esterlibros.es/';
$datosEstructurados = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebSite',
            '@id' => 'https://www.esterlibros.es/#website',
            'url' => 'https://www.esterlibros.es/',
            'name' => 'Ester López Ramos',
            'inLanguage' => 'es-ES',
            'publisher' => ['@id' => 'https://www.esterlibros.es/#person'],
        ],
        [
            '@type' => 'Person',
            '@id' => 'https://www.esterlibros.es/#person',
            'name' => 'Ester López Ramos',
            'url' => 'https://www.esterlibros.es/',
            'image' => 'https://www.esterlibros.es/images/autora-escritora.png',
            'jobTitle' => 'Escritora de fantasía juvenil',
            'description' => 'Escritora de fantasía para adolescentes y jóvenes adultos.',
        ],
    ],
];
$mostrarBanner = true;
// Inserta la cabecera del sitio y la navegación principal antes del contenido.
include __DIR__ . '/templates/cabezado.php';
include __DIR__ . '/templates/menu.php';
?>

<main id="contenido" class="home-page">
    <!-- Presenta la propuesta del sitio y enlaza al catálogo de libros. -->
    <section class="intro section-wrap">
        <div class="intro-copy">
            <p class="eyebrow"><span aria-hidden="true">✦</span> Fantasía juvenil · 16–24 años</p>
            <h1>La vida real<br>puede esperar.<br><span>Hay otros mundos.</span></h1>
            <p class="lead">Magia, misterios y personajes que no tienen todas las respuestas. Encuentra una historia que te haga leer páginas hasta la tarde.</p>
            <div class="home-hero-actions">
                <a class="button button-dark" href="paginas/MisLibros.php">Encuentra tu próxima historia <span aria-hidden="true">→</span></a>
                <a class="text-link" href="paginas/SobreMi.php">Conoce a Ester <span aria-hidden="true">↗</span></a>
            </div>
            <div class="home-genre-tags" aria-label="Géneros de las historias">
                <span>Fantasía</span>
                <span>Misterio</span>
                <span>Otros mundos</span>
            </div>
        </div>
        <a class="author-teaser" href="paginas/SobreMi.php" aria-label="Conoce a Ester López Ramos">
            <img src="images/autora-escritora.png" alt="Ester López Ramos en una librería, junto a sus libros">
            <span class="author-teaser-note">
                <span><small>Detrás de cada mundo</small><strong>Ester López Ramos</strong></span>
                <span class="author-teaser-arrow" aria-hidden="true">↗</span>
            </span>
        </a>
    </section>

    <!-- Muestra una selección de fichas de ejemplo que enlazan al catálogo completo. -->
    <section class="featured section-wrap" aria-labelledby="destacados-title">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Historias para descubrir</p>
                <h2 id="destacados-title">Libros destacados</h2>
            </div>
            <a class="text-link" href="paginas/MisLibros.php">Ver todos los libros <span aria-hidden="true">→</span></a>
        </div>
        <p class="notice-inline">Un primer vistazo a mundos, pistas y aventuras. Las cubiertas y fichas son muestras de diseño.</p>
        <div class="book-grid book-grid-home">
            <article class="book-card">
                <img src="images/portada-bosque-niebla.png" alt="Cubierta de muestra de El bosque de la niebla">
                <p class="book-category">Fantasía · Juvenil · Ficha de muestra</p>
                <h3>El bosque de la niebla</h3>
                <a class="text-link" href="paginas/MisLibros.php">Descubrir la ficha <span aria-hidden="true">→</span></a>
            </article>
            <article class="book-card">
                <img src="images/portada-puerta-montanas.png" alt="Cubierta de muestra de La puerta de las montañas">
                <p class="book-category">Fantasía · Sobrenatural · Ficha de muestra</p>
                <h3>La puerta de las montañas</h3>
                <a class="text-link" href="paginas/MisLibros.php">Descubrir la ficha <span aria-hidden="true">→</span></a>
            </article>
            <article class="book-card">
                <img src="images/portada-mapa-estrellas.png" alt="Cubierta de muestra de El mapa de las estrellas">
                <p class="book-category">Misterio · Juvenil · Ficha de muestra</p>
                <h3>El mapa de las estrellas</h3>
                <a class="text-link" href="paginas/MisLibros.php">Descubrir la ficha <span aria-hidden="true">→</span></a>
            </article>
        </div>
    </section>

    <section class="story-pillars section-wrap" aria-labelledby="story-pillars-title">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Una invitación a imaginar</p>
                <h2 id="story-pillars-title">¿Qué encontrarás entre estas páginas?</h2>
            </div>
        </div>
        <p class="story-pillars-intro">La fantasía es una puerta: al otro lado esperan lugares desconocidos, preguntas difíciles y personajes que deben elegir su propio camino.</p>
        <div class="story-pillar-grid">
            <article class="story-pillar">
                <span class="story-pillar-number">01 · EXPLORAR</span>
                <h3>Mundos por descubrir</h3>
                <p>Escenarios imaginarios donde cada rincón puede esconder una pista, un secreto o el comienzo de una aventura.</p>
            </article>
            <article class="story-pillar">
                <span class="story-pillar-number">02 · DECIDIR</span>
                <h3>Personajes que eligen</h3>
                <p>Protagonistas que se enfrentan a dudas y decisiones, y encuentran su voz mientras avanzan.</p>
            </article>
            <article class="story-pillar">
                <span class="story-pillar-number">03 · SENTIR</span>
                <h3>Historias que acompañan</h3>
                <p>Lecturas de fantasía juvenil para dejarse llevar por la magia y seguir pensando en la historia al cerrar el libro.</p>
            </article>
        </div>
    </section>

    <!-- Resume la biografía y dirige a la página Sobre mí. -->
    <section class="home-about">
        <div class="section-wrap home-about-inner">
            <div class="home-about-image">
                <img src="images/autora-escritora.png" alt="Retrato de Ester López Ramos en una librería">
                <span class="image-caption">Ester entre libros en su librería</span>
            </div>
            <div class="home-about-copy">
                <p class="eyebrow">Detrás de las historias</p>
                <h2>Hola, soy Ester</h2>
                <p>Escribo fantasía para adolescentes y jóvenes adultos. Me gusta crear mundos donde la magia, los secretos y las decisiones de sus protagonistas abren nuevas posibilidades.</p>
                <p>En esta web puedes conocer mis libros, seguir la agenda y encontrar las novedades sobre mi trabajo.</p>
                <a class="button button-outline" href="paginas/SobreMi.php">Un poco más sobre mí <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>

    <!-- Cierra la página con una llamada directa a la página de contacto. -->
    <section class="home-contact section-wrap">
        <div>
            <p class="eyebrow">¿Hablamos?</p>
            <h2>Una pregunta, una propuesta<br>o una historia que compartir.</h2>
        </div>
        <a class="button button-dark" href="paginas/Contacto.php">Escríbeme <span aria-hidden="true">→</span></a>
    </section>
</main>

<!-- Añade el pie de página común y cierra el documento HTML. -->
<?php include __DIR__ . '/templates/piePagina.php'; ?>