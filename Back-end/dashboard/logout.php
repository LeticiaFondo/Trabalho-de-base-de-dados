<?php
// Inicie a sessão se ainda não estiver iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destrua todas as variáveis de sessão
$_SESSION = array();

// Se desejar excluir a sessão, também é necessário excluir o cookie de sessão
// Nota: isso destruirá a sessão e não apenas os dados da sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destrua a sessão
session_destroy();

// Redirecione para a página de login ou para onde desejar
header("Location: ../login.html");
exit();
?>
