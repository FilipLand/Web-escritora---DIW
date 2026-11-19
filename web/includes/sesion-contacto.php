<?php
// La sesión solo se usa para validar el token CSRF del formulario de contacto.
if (session_status() !== PHP_SESSION_ACTIVE) {
    $scriptPath = parse_url($_SERVER['SCRIPT_NAME'] ?? '/', PHP_URL_PATH);
    $scriptDirectory = dirname(is_string($scriptPath) ? $scriptPath : '/');
    if (basename($scriptDirectory) === 'paginas') {
        $scriptDirectory = dirname($scriptDirectory);
    }

    $cookiePath = rtrim(str_replace('\\', '/', $scriptDirectory), '/');
    if ($cookiePath === '' || $cookiePath === '.') {
        $cookiePath = '/';
    } else {
        $cookiePath .= '/';
    }

    $httpsActivo = !empty($_SERVER['HTTPS']) && strtolower((string) $_SERVER['HTTPS']) !== 'off';
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => $cookiePath,
        'secure' => $httpsActivo,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    foreach (['session.use_strict_mode' => '1', 'session.use_only_cookies' => '1'] as $opcion => $valor) {
        if (ini_set($opcion, $valor) === false) {
            throw new RuntimeException('No se pudo aplicar la configuración segura de sesión.');
        }
    }

    if (!session_start()) {
        throw new RuntimeException('No se pudo iniciar la sesión del formulario de contacto.');
    }
}
