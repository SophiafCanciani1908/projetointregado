<?php
// Confere se a pessoa está logada antes de deixar apagar
require_once __DIR__ . '/login/verifica_user.php';

// Puxa as funções do banco de dados
require_once __DIR__ . '/includes/functions.php';

// Pega o ID que veio na URL quando clica em Apagar
$id = $_GET['id'] ?? null;

// Se encontrou o ID, executa a exclusão no banco
if ($id) {
    deletar($conexao, $id);
}

// Manda de volta para a lista atualizada
header("Location: app/select_w.php");
exit();
?>