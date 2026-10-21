<?php
// Pega as funções de tudo do sistema, como a verifição de sessão
require_once __DIR__ . '/../login/verifica_user.php';
require_once __DIR__ . '/../includes/functions.php';
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
<!-- pega o topo da página e o MENU de navegação -->

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container-equipamentos">
        <h2 style="color: #d63384; text-align: center; margin-bottom: 25px;">Nossos Equipamentos 🏋️‍♀️</h2>
<!-- essa parte que divide cada equipamento, como se fosse cartões -->
        <div class="grid-equipamentos">
<!-- Cartão de algum equipamento (com foto, nome e descrição do que faz) -->
            <div class="cartao-equipamento">
                <img src="/imagens/Gemini_Generated_Image_29dh2s29dh2s29dh.jpg" alt="Esteira ergométrica">
                <h3>Esteira ergométrica</h3>
                <p>O aparelho de cardio mais disputado e essencial para aquecimento e treinos aeróbicos.</p>
            </div>
<!-- essa parte faz a mesma coisa para os outros aparelhos -->
            <div class="cartao-equipamento">
                <img src="/imagens/Gemini_Generated_Image_3lnu513lnu513lnu.jpg" alt="Leg Press">
                <h3>Leg Press</h3>
                <p>O preferido e mais comum para o treino de pernas, por ser seguro e eficiente.</p>
            </div>

            <div class="cartao-equipamento">
                <img src="/imagens/Gemini_Generated_Image_f1zhhjf1zhhjf1zh.jpg" alt="Puxada alta (Pulley)">
                <h3>Puxada alta (Pulley)</h3>
                <p>O equipamento principal e mais frequentado para o treino de costas.</p>
            </div>

            <div class="cartao-equipamento">
                <img src="/imagens/Gemini_Generated_Image_iz9pw0iz9pw0iz9p.jpg" alt="Banco regulável com halteres">
                <h3>Banco regulável com halteres</h3>
                <p>A área de pesos livres mais utilizada, serve para peito, ombros, braços e pernas.</p>
            </div>

            <div class="cartao-equipamento">
                <img src="/imagens/Gemini_Generated_Image_m0bxb8m0bxb8m0bx.jpg" alt="Cadeira extensora">
                <h3>Cadeira extensora</h3>
                <p>Presente em 100% das academias para o isolamento das coxas.</p>
            </div>

            <div class="cartao-equipamento">
                <img src="/imagens/Gemini_Generated_Image_y33j7ny33j7ny33j.jpg" alt="Cross Over (Polias)">
                <h3>Cross Over (Polias)</h3>
                <p>A máquina mais versátil do salão, usada para treinar o corpo inteiro.</p>
            </div>
        </div>
    </main>
<!-- pega o rodapé do site -->
    <?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>