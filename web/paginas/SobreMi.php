<?php
// Metadatos de la biografía y rutas relativas a la carpeta de páginas.
$rutaBase = '../';
$paginaActual = 'sobre-mi';
$tituloPagina = 'Sobre mí | Ester López Ramos';
$descripcionPagina = 'Conoce a Ester López Ramos, escritora de fantasía juvenil: su universo creativo y las historias que la inspiran.';
$urlCanonica = 'https://www.esterlibros.es/paginas/SobreMi.php';
$mostrarBanner = false;
// Incluye el encabezado y la navegación comunes.
include __DIR__ . '/../templates/cabezado.php';
include __DIR__ . '/../templates/menu.php';
?>

<main id="contenido" class="page-main">
    <!-- Presentación breve de la autora y del contenido de esta página. -->
    <section class="page-heading section-wrap">
        <p class="eyebrow">Entre páginas y mundos</p>
        <h1>Sobre mí</h1>
        <p class="lead">Unas palabras de Ester López Ramos y una mirada al universo creativo que acompaña sus historias.</p>
    </section>

    <!-- Perfil biográfico con retrato ilustrado provisional y enlace al catálogo. -->
    <section class="about-profile section-wrap">
        <a class="about-portrait" href="../index.php" aria-label="Volver al inicio">
            <img src="../images/autora-escritora.png" alt="Ilustración de Ester López Ramos escribiendo en su escritorio">
            <span class="image-caption">Retrato ilustrado · pulsa para volver al inicio</span>
        </a>
        <div class="about-copy">
            <p class="eyebrow">Hola, soy Ester</p>
            <h2>Escribo para abrir puertas a otros mundos.</h2>
            <p>Soy Ester López Ramos y escribo fantasía para adolescentes y jóvenes adultos, especialmente para lectores de entre 16 y 24 años.</p>
            <p>Me interesan los mundos llenos de posibilidades, los personajes que se enfrentan a decisiones difíciles y las historias que nos acompañan mucho después de cerrar el libro.</p>
            <p>Esta web reúne información sobre mis obras, mi agenda y las apariciones en prensa. La información biográfica adicional se completará cuando esté disponible.</p>
            <a class="button button-dark" href="MisLibros.php">Conocer mis libros <span aria-hidden="true">→</span></a>
        </div>
    </section>

    <!-- Galería de imágenes de muestra pendiente de reemplazo por material definitivo. -->
    <section class="about-gallery section-wrap">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Un vistazo a mi universo</p>
                <h2>Imágenes destacadas</h2>
            </div>
        </div>
        <div class="gallery-grid">
            <figure class="gallery-tall"><img src="../images/autora-escritora.png" alt="Ilustración de una escritora leyendo y tomando notas"></figure>
            <figure><img src="../images/portada-bosque-niebla.png" alt="Cubierta de muestra de un bosque fantástico"></figure>
            <figure><img src="../images/portada-puerta-montanas.png" alt="Cubierta de muestra de un portal entre montañas"></figure>
        </div>
    </section>
</main>

<!-- Cierra la página con el pie común. -->
<?php include __DIR__ . '/../templates/piePagina.php'; ?>