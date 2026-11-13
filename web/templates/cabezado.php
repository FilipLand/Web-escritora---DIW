<?php
// Usa valores por defecto para que la plantilla también pueda incluirse sin configuración previa.
$rutaBase = $rutaBase ?? '';
$tituloPagina = $tituloPagina ?? 'Ester López Ramos | Escritora';
$descripcionPagina = $descripcionPagina ?? 'Web oficial de Ester López Ramos, escritora de fantasía juvenil.';
?>
<!-- Abre el documento y compone los metadatos con valores escapados para HTML. -->
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= htmlspecialchars($descripcionPagina, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="theme-color" content="#BDE0BC">
    <title><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>images/favicon.svg" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>css/styles.css?v=<?= filemtime(__DIR__ . '/../css/styles.css') ?>">
    <script src="<?= htmlspecialchars($rutaBase, ENT_QUOTES, 'UTF-8') ?>js/funciones.js" defer></script>
</head>
<body>
    <!-- Enlace de accesibilidad que permite saltar directamente al contenido principal. -->
    <a class="skip-link" href="#contenido">Saltar al contenido</a>
    <!-- El banner audiovisual solo aparece en las páginas que lo solicitan. -->
    <?php if (!empty($mostrarBanner)): ?>
        <header class="hero-banner">
            <div class="hero-brand">
                <a class="brand-mark" href="index.php" aria-label="Ester López Ramos, inicio">
                    <img src="images/logo-ester.svg" alt="">
                    <span>Ester López Ramos</span>
                    <small>Escritora</small>
                </a>
            </div>
            <div class="hero-media">
                <video class="hero-video" autoplay muted loop playsinline preload="metadata" poster="images/banner-fantasia.svg" aria-label="Carrusel audiovisual de libros y fantasía">
                    <source src="../archivos/Carrusel/Carrusel%20de%20im%C3%A1genes_720p.mp4" type="video/mp4">
                </video>
                <button class="hero-video-toggle" type="button" data-video-toggle aria-label="Pausar el vídeo">
                    <span aria-hidden="true">Ⅱ</span> Pausar vídeo
                </button>
            </div>
        </header>
    <?php endif; ?>