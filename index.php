<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Girl Power Gym</title>
</head>
<body style="background-color: #fce4ec; margin: 0; font-family: sans-serif;">

    <?php include __DIR__ . '/includes/header.php'; ?>

    <main style="max-width: 500px; margin: 60px auto; padding: 20px; text-align: center;">
        <?php if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])): ?>
            
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                <h2 style="color: #d63384; margin-top: 0;">Sessão Ativa</h2>
                <p style="color: #555;">Você já está conectado como <strong><?php echo $_SESSION['user_nome'] ?? $_SESSION['user_email']; ?></strong>.</p>
                <p style="color: #555; margin-bottom: 25px;">Deseja encerrar a sessão e sair da conta?</p>
                
                <a href="login/logout.php" style="padding: 12px 24px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block;">
                    Sim, Desejo Sair
                </a>
            </div>
        <?php else: ?>
           
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                <h2 style="color: #d63384; margin-top: 0;">Bem-vinda ao Girl Power!</h2>
                <p style="color: #555; margin-bottom: 20px;">Aceda à tua conta ou regista-te para continuar.</p>
                <div style="display: flex; gap: 10px; justify-content: center;">
                    <a href="login/login.php" style="padding: 10px 20px; background-color: #d63384; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">Fazer Login</a>
                    <a href="login/cadastrar.php" style="padding: 10px 20px; background-color: #851987; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">Criar Conta</a>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>