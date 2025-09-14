<?php

function verificarLogin() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_login'])) {
        header('Location: entrar-usuario.php');
        exit();
    }
}

function obterUsuarioLogado() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (isset($_SESSION['user_id'])) {
        return [
            'cpf' => $_SESSION['user_id'],
            'login' => $_SESSION['user_login'],
            'nome' => $_SESSION['user_nome'],
            'email' => $_SESSION['user_email']
        ];
    }
    
    return null;
}

function estaLogado() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    return isset($_SESSION['user_id']) && isset($_SESSION['user_login']);
}
?>