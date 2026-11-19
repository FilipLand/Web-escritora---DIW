<?php
// Configura los metadatos de esta página interior y desactiva el banner de portada.
$rutaBase = '../';
$paginaActual = 'legal';
$tituloPagina = 'Aviso legal y términos | Ester López Ramos';
$descripcionPagina = 'Aviso legal, privacidad, cookies, términos y accesibilidad de la web de Ester López Ramos.';
$urlCanonica = 'https://www.esterlibros.es/paginas/AvisoLegal.php';
$mostrarBanner = false;
// Reutiliza la cabecera y la navegación comunes del sitio.
include __DIR__ . '/../templates/cabezado.php';
include __DIR__ . '/../templates/menu.php';
?>

<main id="contenido" class="page-main legal-main">
    <!-- Presentación y navegación rápida entre las secciones legales. -->
    <section class="page-heading section-wrap">
        <p class="eyebrow">Información del sitio</p>
        <h1>Información legal</h1>
        <p class="lead">Condiciones de uso, privacidad, seguridad y accesibilidad de esta web informativa.</p>
    </section>
    <div class="legal-layout section-wrap">
        <!-- Cada enlace apunta al identificador de su sección correspondiente. -->
        <aside class="legal-index" aria-label="Secciones de información legal">
            <a href="#aviso-legal">Aviso legal</a>
            <a href="#privacidad">Privacidad</a>
            <a href="#terminos">Términos y condiciones</a>
            <a href="#seguridad">Seguridad digital</a>
            <a href="#cookies">Cookies</a>
            <a href="#accesibilidad">Accesibilidad</a>
        </aside>
        <!-- El contenido se divide en secciones enlazables desde el índice lateral. -->
        <div class="legal-content">
            <section id="aviso-legal" class="legal-section">
                <p class="eyebrow">A · Titularidad</p>
                <h2>Aviso legal y propiedad intelectual</h2>
                <p>En cumplimiento de la Ley 34/2002, de Servicios de la Sociedad de la Información y de Comercio Electrónico, se informa de los datos identificativos de la titular:</p>
                <dl class="legal-data">
                    <div><dt>Titular</dt><dd>Ester López Ramos</dd></div>
                    <div><dt>Domicilio</dt><dd>Carrer del Literat Gabriel Miró, 51, Extramurs, 46008 València, Valencia</dd></div>
                    <div><dt>Correo de contacto</dt><dd><a href="mailto:contacto@ester.com">contacto@ester.com</a></dd></div>
                    <div><dt>Dominio web</dt><dd><a href="https://www.esterlibros.es/" target="_blank" rel="noopener noreferrer">www.esterlibros.es</a></dd></div>
                </dl>
                <h3>Propiedad intelectual e industrial</h3>
                <p>Los textos, obras literarias, fragmentos, portadas, fotografías, logotipos, diseño gráfico y demás contenidos del sitio pertenecen a la titular o se utilizan con autorización. No se permite su reproducción, distribución o transformación sin permiso previo, salvo en los casos permitidos por la ley.</p>
            </section>

            <section id="privacidad" class="legal-section">
                <p class="eyebrow">B · Datos personales</p>
                <h2>Privacidad y protección de datos</h2>
                <p><strong>Responsable:</strong> Ester López Ramos. Para cuestiones sobre protección de datos puedes escribir a <a href="mailto:datos@ester.es">datos@ester.es</a>.</p>
                <p>Los datos enviados mediante el formulario se utilizarán para responder a consultas, propuestas de prensa o solicitudes relacionadas con eventos. No se utilizarán para otros fines ni se cederán a terceros, salvo obligación legal.</p>
                <p>La base del tratamiento es el consentimiento de la persona que envía el formulario. Los datos se conservarán durante el tiempo necesario para gestionar la consulta y atender posibles responsabilidades.</p>
                <p>Puedes solicitar acceso, rectificación, supresión, limitación, oposición o portabilidad escribiendo a <a href="mailto:derecho@ester.es">derecho@ester.es</a>. También puedes presentar una reclamación ante la <a href="https://www.aepd.es/" target="_blank" rel="noopener noreferrer">Agencia Española de Protección de Datos</a>.</p>
            </section>

            <section id="terminos" class="legal-section">
                <p class="eyebrow">C · Uso del sitio</p>
                <h2>Términos y condiciones</h2>
                <p>Esta web tiene carácter exclusivamente informativo y presenta la obra literaria, trayectoria, agenda y noticias de prensa de la autora. La web no vende libros, no procesa pagos ni gestiona envíos.</p>
                <p>La información se ofrece de buena fe y se actualizará cuando sea posible. Los enlaces a sitios externos se facilitan únicamente como referencia; sus contenidos y condiciones son responsabilidad de sus titulares.</p>
            </section>

            <section id="seguridad" class="legal-section">
                <p class="eyebrow">D · Seguridad</p>
                <h2>Seguridad digital y notificación de incidencias</h2>
                <p>La titular adoptará medidas técnicas y organizativas razonables para proteger la navegación y los datos recibidos. Cuando la web se publique con certificado SSL/TLS, la conexión cifrada se indicará mediante HTTPS.</p>
                <p>Para comunicar incidencias o posibles vulneraciones de derechos, escribe a <a href="mailto:datos@ester.es">datos@ester.es</a>.</p>
            </section>

            <section id="cookies" class="legal-section">
                <p class="eyebrow">E · Cookies</p>
                <h2>Política de cookies</h2>
                <p>Este sitio no utiliza cookies de analítica, publicidad ni seguimiento. Solo se crea una cookie técnica de sesión (PHPSESSID) cuando visitas el formulario de contacto. Es necesaria para proteger el formulario frente a envíos falsificados mediante un token de seguridad; no se usa para identificarte ni para elaborar perfiles.</p>
                <p>La cookie es temporal, se limita a este sitio y se configura como HttpOnly y SameSite=Lax; cuando la web se visita mediante HTTPS también se marca como Secure. La sesión no se inicia en el resto de páginas. Al ser estrictamente necesaria para prestar y proteger el formulario, no se usan cookies opcionales ni se solicita consentimiento para ellas.</p>
                <p>Los enlaces externos pueden aplicar sus propias políticas cuando los visites.</p>
            </section>

            <section id="accesibilidad" class="legal-section">
                <p class="eyebrow">F · Accesibilidad</p>
                <h2>Accesibilidad web</h2>
                <p>El objetivo es ofrecer una web clara y accesible, con navegación por teclado, estructura semántica, contraste adecuado y textos alternativos para las imágenes.</p>
                <p>Si encuentras una barrera de acceso o quieres enviar una sugerencia, contacta con <a href="mailto:accesibilidad@ester.es">accesibilidad@ester.es</a>.</p>
            </section>
            <!-- La fecha se calcula en el servidor para reflejar el día de consulta. -->
            <p class="legal-updated">Última actualización: <?= date('d/m/Y') ?></p>
        </div>
    </div>
</main>

<!-- Cierra la página con el pie compartido. -->
<?php include __DIR__ . '/../templates/piePagina.php'; ?>