<?php
// ele inicia a sessão se ainda não tiver começado
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ve se a pessoa está logada, e se não tiver ela vai para a tela inicial
if (!isset($_SESSION['user_email']) || empty($_SESSION['user_email'])) {
    header("Location: ../index.php");
    exit();
}
?>