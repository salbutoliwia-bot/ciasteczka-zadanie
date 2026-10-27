<?php
session_start();

// usun zmienne sesyjne
$_SESSION = [];

// usun cookie sesyjne 
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        [
            'expires' => time() - 42000,
            'path' => $params['path'],
            'domain' => $params['domain'],
            'secure' => $params['secure'],
            'httponly' => $params['httponly'],
            'samesite' => $params['samesite'] ?? 'Lax'
        ]
    );
}

// zniszcz sesje
session_destroy();

// przejdz do strony logowania
header("Location: login.php");
exit;

?>