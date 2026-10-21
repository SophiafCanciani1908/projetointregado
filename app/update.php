<?php
// essa parte protege a págima só para quem esta já logado para conseguir agendar
require_once __DIR__ . '/../login/verifica_user.php';
require_once __DIR__ . '/../includes/functions.php';

$mensagem = '';
$erro = '';

// Quando preenche o formulário e clica no botão para agendar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_aluna = trim($_POST['nome_aluna'] ?? '');
    $personal   = trim($_POST['personal'] ?? '');
    $data_treino = trim($_POST['data_agendamento'] ?? '');
// Salva o novo treino agendado no banco de dados
    if (!empty($nome_aluna) && !empty($personal) && !empty($data_treino)) {
        try {
            $stmt = $conexao->prepare("INSERT INTO agendamentos (nome_aluna, personal, data_agendamento) VALUES (:nome, :personal, :data)");
            $stmt->execute([
                ':nome' => $nome_aluna,
                ':personal' => $personal,
                ':data' => $data_treino
            ]);

// Manda o usuario direto para a tela de histórico de treinos
            header("Location: select_w.php");
            exit;
        } catch (PDOException $e) {
            $erro = "Erro ao guardar o agendamento: " . $e->getMessage();
        }
    } else {
        $erro = "Por favor, preencha todos os campos do formulário.";
    }
}
?>

<!-- E esse resto, é o formulário para escolher o personal e a data do treino -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Personal - Academia Girl Power</title>
    <style>
        .container-form {
            max-width: 500px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #f8c1d9;
            box-shadow: 0 4px 15px rgba(214, 51, 132, 0.1);
        }

        .container-form h2 {
            color: #d63384;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #495057;
            font-weight: 600;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #f8c1d9;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
            outline: none;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #d63384;
            box-shadow: 0 0 5px rgba(214, 51, 132, 0.3);
        }

        .btn-submit {
            width: 100%;
            background-color: #d63384;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 20px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #b8256f;
        }

        .alerta-erro {
            background-color: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main>
        <div class="container-form">
            <h2>Agendar Personal Trainer 🏋️‍♀️</h2>

            <?php if (!empty($erro)): ?>
                <div class="alerta-erro"><?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>

            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="nome_aluna">Nome da Aluna:</label>
                    <input type="text" id="nome_aluna" name="nome_aluna" placeholder="Digite seu nome completo" required>
                </div>

                <div class="form-group">
                    <label for="personal">Escolha a Personal Trainer:</label>
                    <select id="personal" name="personal" required>
                        <option value="">-- Selecione uma Personal --</option>
                        <option value="Giovanna">Giovanna - Musculação</option>
                        <option value="Sophia">Sophia - Musculação</option>
                        <option value="Amanda">Amanda - Musculação</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="data_agendamento">Data do Treino:</label>
                    <input type="date" id="data_agendamento" name="data_agendamento" required>
                </div>

                <button type="submit" class="btn-submit">Confirmar Agendamento ✨</button>
            </form>
        </div>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>