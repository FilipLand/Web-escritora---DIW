<?php
// Este endpoint solo acepta envíos del formulario mediante POST.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Método no permitido.');
}

// Recupera la sesión técnica para validar el token CSRF recibido junto al formulario.
require_once __DIR__ . '/includes/sesion-contacto.php';

$tokenEnviado = isset($_POST['csrf_token']) ? (string) $_POST['csrf_token'] : '';
$tokenSesion = isset($_SESSION['contacto_csrf']) ? (string) $_SESSION['contacto_csrf'] : '';
// Compara ambos tokens en tiempo constante y vuelve al formulario si no coinciden.
if ($tokenEnviado === '' || $tokenSesion === '' || !hash_equals($tokenSesion, $tokenEnviado)) {
    header('Location: paginas/Contacto.php?estado=sesion', true, 303);
    exit;
}

// Normaliza los campos recibidos antes de validar sus límites y contenido.
$nombre = isset($_POST['nombre']) ? trim((string) $_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim((string) $_POST['email']) : '';
$asunto = isset($_POST['asunto']) ? trim((string) $_POST['asunto']) : '';
$mensaje = isset($_POST['mensaje']) ? trim((string) $_POST['mensaje']) : '';
$consentimiento = isset($_POST['consentimiento']) && $_POST['consentimiento'] === '1';

// Rechaza datos incompletos, de formato inválido o que excedan los límites del formulario.
if (
    $nombre === ''
    || strlen($nombre) > 100
    || !filter_var($email, FILTER_VALIDATE_EMAIL)
    || strlen($email) > 254
    || strlen($asunto) > 120
    || $mensaje === ''
    || strlen($mensaje) > 5000
    || !$consentimiento
) {
    header('Location: paginas/Contacto.php?estado=datos', true, 303);
    exit;
}

// Elimina saltos de línea de los encabezados para evitar inyección de cabeceras de correo.
$nombreSeguro = preg_replace('/[\r\n]+/', ' ', $nombre);
$asuntoSeguro = preg_replace('/[\r\n]+/', ' ', $asunto);
// Prepara el asunto, el cuerpo de texto y los encabezados del mensaje de correo.
$asuntoCorreo = 'Mensaje desde EsterLibros.es';
if ($asuntoSeguro !== '') {
    $asuntoCorreo .= ' - ' . $asuntoSeguro;
}
$cuerpo = "Nombre: {$nombreSeguro}\nCorreo: {$email}\n\nMensaje:\n{$mensaje}\n";
$cabeceras = [
    'From: Web EsterLibros <web@esterlibros.es>',
    'Reply-To: ' . $email,
    'Content-Type: text/plain; charset=UTF-8',
];

// Informa del fallo de envío sin mostrar detalles internos del servidor.
if (!mail('contacto@ester.com', $asuntoCorreo, $cuerpo, implode("\r\n", $cabeceras))) {
    header('Location: paginas/Contacto.php?estado=no-disponible', true, 303);
    exit;
}

// Consume el token para que no pueda reutilizarse y confirma el envío mediante redirección.
unset($_SESSION['contacto_csrf']);
header('Location: paginas/Contacto.php?estado=enviado', true, 303);
exit;