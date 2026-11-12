document.addEventListener('DOMContentLoaded', function () {
    // Inicializa los controles solo cuando el documento y sus elementos ya están disponibles.
    const heroVideo = document.querySelector('.hero-video');
    const videoToggle = document.querySelector('[data-video-toggle]');

    // El banner y su botón solo existen en la página de inicio.
    if (heroVideo && videoToggle) {
        // Mantiene sincronizados el texto visible y la etiqueta accesible del botón.
        const toggleLabel = function (isPaused) {
            videoToggle.setAttribute('aria-label', isPaused ? 'Reproducir el vídeo' : 'Pausar el vídeo');
            videoToggle.innerHTML = isPaused
                ? '<span aria-hidden="true">▶</span> Reproducir vídeo'
                : '<span aria-hidden="true">Ⅱ</span> Pausar vídeo';
        };
        // Respeta la preferencia del sistema para reducir el movimiento y pausa el vídeo.
        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (reducedMotion) {
            heroVideo.pause();
            toggleLabel(true);
        }

        // Permite pausar o reanudar el vídeo y restaura la etiqueta si el navegador no puede reproducirlo.
        videoToggle.addEventListener('click', function () {
            if (heroVideo.paused) {
                const playRequest = heroVideo.play();
                if (playRequest && typeof playRequest.catch === 'function') {
                    playRequest.catch(function () {
                        toggleLabel(true);
                    });
                }
                toggleLabel(false);
            } else {
                heroVideo.pause();
                toggleLabel(true);
            }
        });
    }

    const menuButton = document.querySelector('.menu-toggle');
    const menuContent = document.querySelector('#primary-links');

    // En pantallas pequeñas, abre o cierra el menú y actualiza su estado para tecnologías de asistencia.
    if (menuButton && menuContent) {
        menuButton.addEventListener('click', function () {
            const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', String(!isOpen));
            menuContent.classList.toggle('is-open', !isOpen);
            const label = menuButton.querySelector('.sr-only');
            if (label) {
                label.textContent = isOpen ? 'Abrir menú' : 'Cerrar menú';
            }
        });
    }

    // Si no hay tarjetas, esta página no tiene catálogo y no necesita configurar los filtros.
    const cards = Array.from(document.querySelectorAll('[data-book-card]'));
    if (!cards.length) {
        return;
    }

    const genreFilters = Array.from(document.querySelectorAll('[data-filter-genre]'));
    const ageFilter = document.querySelector('[data-filter-age]');
    const lengthFilter = document.querySelector('[data-filter-length]');
    const publisherFilter = document.querySelector('[data-filter-publisher]');
    const searchFilter = document.querySelector('[data-filter-search]');
    const resultCount = document.querySelector('[data-results-count]');
    const emptyState = document.querySelector('[data-empty-state]');
    const resetButton = document.querySelector('[data-filter-reset]');
    const queryFromUrl = new URLSearchParams(window.location.search).get('buscar');

    // Recupera la consulta enviada desde el buscador de la navegación.
    if (searchFilter && queryFromUrl) {
        searchFilter.value = queryFromUrl;
    }

    // Normaliza mayúsculas y tildes para que la búsqueda no dependa de ellas.
    function normalize(value) {
        return value.trim().toLocaleLowerCase('es').normalize('NFD').replace(/[\u0300-\u036f]/g, '');
    }

    // Combina todos los criterios, oculta las fichas que no coinciden y actualiza el contador.
    function applyFilters() {
        const selectedGenres = genreFilters
            .filter(function (filter) { return filter.checked; })
            .map(function (filter) { return normalize(filter.value); });
        const age = ageFilter ? ageFilter.value : '';
        const length = lengthFilter ? lengthFilter.value : '';
        const publisher = publisherFilter ? publisherFilter.value : '';
        const query = searchFilter ? normalize(searchFilter.value) : '';
        let visibleCount = 0;

        cards.forEach(function (card) {
            const genres = (card.dataset.genres || '').split('|').map(normalize);
            const matchesGenre = selectedGenres.length === 0 || selectedGenres.some(function (genre) {
                return genres.includes(genre);
            });
            const matchesAge = !age || card.dataset.age === age;
            const matchesLength = !length || card.dataset.length === length;
            const matchesPublisher = !publisher || card.dataset.publisher === publisher;
            const searchableText = normalize((card.dataset.title || '') + ' ' + (card.dataset.genres || ''));
            const matchesQuery = !query || searchableText.includes(query);
            const isVisible = matchesGenre && matchesAge && matchesLength && matchesPublisher && matchesQuery;

            card.hidden = !isVisible;
            if (isVisible) {
                visibleCount += 1;
            }
        });

        // Refleja el total visible y muestra un mensaje si no hay coincidencias.
        if (resultCount) {
            resultCount.textContent = String(visibleCount);
        }
        if (emptyState) {
            emptyState.hidden = visibleCount > 0;
        }
    }

    // Reaplica el filtrado al cambiar cualquier criterio de selección o texto.
    genreFilters.forEach(function (filter) {
        filter.addEventListener('change', applyFilters);
    });

    [ageFilter, lengthFilter, publisherFilter].forEach(function (filter) {
        if (filter) {
            filter.addEventListener('change', applyFilters);
        }
    });

    if (searchFilter) {
        searchFilter.addEventListener('input', applyFilters);
    }

    // Restablece todos los criterios y vuelve a mostrar los resultados completos.
    if (resetButton) {
        resetButton.addEventListener('click', function () {
            genreFilters.forEach(function (filter) { filter.checked = false; });
            [ageFilter, lengthFilter, publisherFilter].forEach(function (filter) {
                if (filter) {
                    filter.value = '';
                }
            });
            if (searchFilter) {
                searchFilter.value = '';
            }
            applyFilters();
        });
    }

    // Aplica los filtros iniciales, incluida una búsqueda recibida por URL.
    applyFilters();
});