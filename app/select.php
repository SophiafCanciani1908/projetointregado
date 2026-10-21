<?php
require_once __DIR__ . '/../login/verifica_user.php';
require_once __DIR__ . '/../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pessoas Cadastradas - Girl Power</title>
</head>
<body style="background-color: #fce4ec; margin: 0; font-family: sans-serif;">

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main style="max-width: 800px; margin: 40px auto; padding: 20px; background: white; border-radius: 10px;">
        <h2 style="color: #d63384; text-align: center;">Relatório de Pessoas Cadastradas</h2>
        <?php
        relatorio($conexao);
        ?>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>