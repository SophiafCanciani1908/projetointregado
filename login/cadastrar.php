<?php
// faz a sessão para quem tem acesso do usuario
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// carrega as funções do sistema
require_once __DIR__ . '/../includes/functions.php';

$mensagem = "";

// ele verifica se foi feito o POST no formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $senha = $_POST['senha'] ?? '';

// se quase todos os campos foram preenchidos, ele salva no banco
    if (!empty($nome) && !empty($email) && !empty($senha)) {
        try {
// esse é o comando para salvar o usuario novo na tabela
            $sql = "INSERT INTO alunos (nome, email, turma, data_nasc, ativo) 
                    VALUES (:nome, :email, 'Geral', CURRENT_DATE, :senha)";
            
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();
// essa parte ela guarda as informações e envia para a página inicial
            $_SESSION['user_email'] = $email;
            $_SESSION['user_nome']  = $nome;

            header("Location: ../index.php");
            exit();
        } catch (PDOException $e) {
            $mensagem = "Erro ao cadastrar: " . $e->getMessage();
        }
    } else {
        $mensagem = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - Girl Power</title>
    <style>
        body {
            background-color: #fce4ec;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .box-card {
            max-width: 400px;
            margin: 50px auto;
            background: #ffffff;
            padding: 35px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(214, 51, 132, 0.15);
            border: 1px solid #f8c1d9;
        }
        .box-card h2 {
            color: #d63384;
            text-align: center;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }
        .campo-group {
            margin-bottom: 18px;
        }
        .campo-group label {
            display: block;
            margin-bottom: 6px;
            color: #495057;
            font-weight: 600;
            font-size: 0.95rem;
        }
        .campo-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #f1aeb5;
            border-radius: 8px;
            font-size: 0.95rem;
            box-sizing: border-box;
            outline: none;
            transition: all 0.2s ease;
        }
        .campo-group input:focus {
            border-color: #d63384;
            box-shadow: 0 0 0 3px rgba(214, 51, 132, 0.2);
        }
        .btn-acao {
            width: 100%;
            padding: 13px;
            background: #d63384;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 10px;
        }
        .btn-acao:hover {
            background: #c2185b;
            box-shadow: 0 4px 12px rgba(214, 51, 132, 0.3);
        }
        .btn-acao:active {
            transform: scale(0.98);
        }
        .alerta-erro {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 600;
        }
        .link-rodape {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #6c757d;
        }
        .link-rodape a {
            color: #d63384;
            text-decoration: none;
            font-weight: bold;
        }
        .link-rodape a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<!-- isso é o MENU da página -->
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main>
        <div class="box-card">
            <h2>Criar Conta 🌸</h2>
<!-- Mostra mensagem se der algum erro-->
            <?php if (!empty($mensagem)): ?>
                <div class="alerta-erro">
                    <?php echo $mensagem; ?>
                </div>
            <?php endif; ?>
<!-- o formulario HTML onde a pessoa pssa os dados dela -->
            <form action="" method="post">
                <div class="campo-group">
                    <label>Nome Completo:</label>
                    <input type="text" name="nome" required placeholder="Digite o seu nome completo">
                </div>

                <div class="campo-group">
                    <label>E-mail:</label>
                    <input type="email" name="email" required placeholder="seuemail@exemplo.com">
                </div>

                <div class="campo-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" required placeholder="Digite a sua senha">
                </div>

                <button type="submit" class="btn-acao">Cadastrar</button>
            </form>

            <div class="link-rodape">
                Já tem conta? <a href="login.php">Fazer Login</a>
            </div>
        </div>
    </main>
<!-- esse é o rodapé da página -->
    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>