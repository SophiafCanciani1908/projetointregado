<?php
// Mostra que só quem está logado pode ver essa página
require_once __DIR__ . '/../login/verifica_user.php';
require_once __DIR__ . '/../includes/functions.php';

try {
    // mostra a lista de agendamentos slavos no banco de dados    
    $stmt = $conexao->query("SELECT * FROM agendamentos ORDER BY data_agendamento DESC");
    $agendamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $agendamentos = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apagar_id'])) {
    $id = filter_input(INPUT_POST, 'apagar_id', FILTER_VALIDATE_INT);

    if ($id) {
        $stmt = $conexao->prepare('DELETE FROM agendamentos WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Academia Girl Power</title>
    <style>
        .container-inicio {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: #fff;
            border: 1px solid #f8c1d9;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(214, 51, 132, 0.08);
            text-align: center;
        }

        .welcome-card h2 {
            color: #d63384;
            margin-top: 0;
        }

        .tabela-historico {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .tabela-historico th {
            background-color: #d63384;
            color: white;
            padding: 12px 15px;
            text-align: left;
        }

        .tabela-historico td {
            padding: 12px 15px;
            border-bottom: 1px solid #f8c1d9;
            color: #444;
            vertical-align: middle;
        }

        .tabela-historico tr:hover {
            background-color: #fff0f6;
        }

        .btn-novo-agendamento {
            display: inline-block;
            background-color: #d63384;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
        }

        .btn-novo-agendamento:hover {
            background-color: #b8256f;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            transition: background 0.2s ease;
        }

        .btn-delete:hover {
            background-color: #bb2d3b;
        }
    </style>
</head>

<body>

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container-inicio">
        <div class="welcome-card">
            <h2>Bem-vinda ao Painel Girl Power! 🌸</h2>
            <p>Gerencie seus treinos e acompanhe seus agendamentos com as nossas personal trainers.</p>
            <a href="update.php" class="btn-novo-agendamento">+ Agendar Novo Treino</a>
        </div>

        <h3 style="color: #d63384; margin-bottom: 15px;">📋 Histórico de Agendamentos</h3>
        <!-- Tabela do HTML para mostrar os agendamentos que estão salvos no banco-->

        <table class="tabela-historico">
            <thead>
                <tr>
                    <th>Aluna / Cliente</th>
                    <th>Personal Trainer</th>
                    <th>Data do Treino</th>
                    <th>Status</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Se tiver agendamentos no banco, ele mostra cada um deles -->
                <?php if (!empty($agendamentos)): ?>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?= htmlspecialchars($agendamento['nome_aluna'] ?? 'Aluna Girl Power') ?></td>
                            <td><?= htmlspecialchars($agendamento['personal'] ?? 'Não informado') ?></td>
                            <td><?= isset($agendamento['data_agendamento']) ? date('d/m/Y', strtotime($agendamento['data_agendamento'])) : '-' ?></td>
                            <td><span style="color: #198754; font-weight: bold;">Confirmado</span></td>
                            <td style="text-align: center;">
<!-- Botão para apagar as coisas -->
                                <form method="post" onsubmit="return confirm('Deseja apagar este agendamento?');">
                                    <input
                                        type="hidden"
                                        name="apagar_id"
                                        value="<?= (int) $agendamento['id'] ?>">
                                    <button type="submit" class="btn-delete">
                                        🗑️ Apagar
                                    </button>
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- se a lista estiver com ela vazia no banco -->
                    <tr>
                        <td colspan="5" style="text-align: center; color: #888; padding: 20px;">
                            Nenhum agendamento encontrado no histórico.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>

</html>