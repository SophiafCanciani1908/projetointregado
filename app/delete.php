<?php
// Confere se a pessoa está logada antes de deixar apagagar qualquer coisa
require_once __DIR__ . '/../login/verifica_user.php';
// Puxa o ficheiro com as funções do banco de dados
require_once __DIR__ . '/../includes/functions.php';


if (isset($_GET['id'])) {
deletar($conexao, $_GET['id']);
} else {
    echo "<div class='msg-erro'>❌ ID da aluna não fornecido para remoção.</div>";
}


header("Location: select_w.php");
exit();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipamentos - Academia Girl Power</title>
    <style>
        .container-equipamentos {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .grid-equipamentos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .cartao-equipamento {
            width: calc(50% - 10px);
            box-sizing: border-box;
            border: 1px solid #f8c1d9;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(214, 51, 132, 0.08);
        }

        .cartao-equipamento img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cartao-equipamento h3 {
            margin: 12px 0 6px 0;
            color: #d63384;
            font-size: 1.1rem;
        }

        .cartao-equipamento p {
            margin: 0;
            font-size: 0.9rem;
            color: #6c757d;
            line-height: 1.4;
        }

        @media (max-width: 600px) {
            .cartao-equipamento {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<!-- Pega o MENU e o topo do site -->
    <?php include __DIR__ . '/../includes/header.php'; ?>

<!-- Pega o rodapé do site -->
    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>