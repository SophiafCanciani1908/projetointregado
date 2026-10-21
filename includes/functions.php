<?php
// Carrega o arquivo que conecta com o banco de dados
require_once __DIR__ . '/../database/connect.php';

// Cadastra uma nova aluna no banco de dados
function cadastrar($conexao, $nome, $cpf, $email, $telefone, $endereco, $turma, $data_nasc, $ativo)
{
// Prepara o comando do sql para colocar uma aluna nova na tabela
    $sql = "INSERT INTO alunos (nome, cpf, email, telefone, endereco, turma, data_nasc, ativo) 
            VALUES (:nome, :cpf, :email, :telefone, :endereco, :turma, :data_nasc, :ativo)";

    try {
// passa os dados para o comando de forma segura
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":cpf", $cpf);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":telefone", $telefone);
        $stmt->bindValue(":endereco", $endereco);
        $stmt->bindValue(":turma", $turma);
        $stmt->bindValue(":data_nasc", $data_nasc);
        $stmt->bindValue(":ativo", $ativo);

// Faz o comando no banco de dados
        $stmt->execute();
        echo "<div class='msg-sucesso'>✨ Aluna cadastrada com sucesso!</div>";
    } catch (PDOException $e) {
// Mostra o erro caso não consiga cadastrar
        echo "<div class='msg-erro'>Erro ao cadastrar: " . $e->getMessage() . "</div>";
    }
}


// mostra o relátório ou lista das alunas
function relatorio($conexao) {
// mostra todas as alunas cadastradas no banco
    $sql = "SELECT * FROM alunos";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $alunas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// cria a tabela do HTML na tela
    echo "<table border='1' style='width:100%; text-align:left; border-collapse: collapse;'>";
    echo "<tr style='background: #f2f2f2;'>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
          </tr>";

// Passa por cada aluna encontradae exibe na linha da tabela
    foreach ($alunas as $linha) {
        echo "<tr>";
        echo "<td>" . $linha['id'] . "</td>";
// Botão para apagar a aluna com confirmação
        echo "<td>" . $linha['nome'] . "</td>";
        echo "<td>" . $linha['email'] . "</td>";
        echo "<td>
                <a href='delete.php?id=" . $linha['id'] . "' onclick=\"return confirm('Tem a certeza que deseja apagar este registo?');\" style='color:red; font-weight:bold;'>Apagar</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
}

//  Função para ver os dados de alguma aluna por id
function consultar($conexao, $id)
{
    $sql = "SELECT * FROM alunos WHERE id = :id";
    try {
// alguma aluna especifica que tem o id informado
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        return $aluno;
    } catch (PDOException $e) {
        echo "<div class='msg-erro'>Erro ao consultar aluna: " . $e->getMessage() . "</div>";
        return false;
    }
}

// Edita os dados da alunas
function editar($conexao, $id, $nome, $cpf, $email, $telefone, $endereco, $turma, $data_nasc, $ativo)
{

// O comando sql atualiza os dados da aluna no banco de dados
    $sql = "UPDATE alunos 
            SET nome = :nome, 
                cpf = :cpf, 
                email = :email, 
                telefone = :telefone, 
                endereco = :endereco, 
                turma = :turma, 
                data_nasc = :data_nasc, 
                ativo = :ativo 
            WHERE id = :id";

    try {
        // Passa os novos valores atualizados
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":cpf", $cpf);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":telefone", $telefone);
        $stmt->bindValue(":endereco", $endereco);
        $stmt->bindValue(":turma", $turma);
        $stmt->bindValue(":data_nasc", $data_nasc);
        $stmt->bindValue(":ativo", $ativo);

        $stmt->execute();
        echo "<div class='msg-sucesso'>✨ Dados atualizados com sucesso!</div>";
    } catch (PDOException $e) {
        echo "<div class='msg-erro'>Erro ao atualizar dados: " . $e->getMessage() . "</div>";
    }
}

// Apaga uma aluna do banco
function deletar($conexao, $id)
{
    $sql = "DELETE FROM alunos WHERE id = :id";
    try {
// exclui a aluna pelo id
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<div class='msg-sucesso'>🗑️ Cadastro da aluna removido com sucesso!</div>";
        } else {
            echo "<div class='msg-erro'>❌ Nenhuma aluna encontrada com esse ID para remover.</div>";
        }
    } catch (PDOException $e) {
        echo "<div class='msg-erro'>Erro ao remover aluna: " . $e->getMessage() . "</div>";
    }
}

// Consulta se o usuário existe na hora do login
function consulta_user($conexao, $email)
{
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    try {
// Prepara o comando sql para buscar o usuario pelo email
        $stmt = $conexao->prepare($sql);
// passa o email que está digitado para a consulta de forma segura
        $stmt->bindValue(":email", $email);
        $stmt->execute();
// ele retorna os dados da aluna se for encontrado no banco
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
// se der erro no banco, retorna falso
        return false;
    }
}

// função que devolve a lista de equipamentos cadastrados no sistema
function getEquipamentos() {
// uma lista que mostra os aparelhos da academia e descrições
    return [
        [
            "nome" => "Esteira ergométrica",
            "descricao" => "O aparelho de cardio mais disputado e essencial para aquecimento e treinos aeróbicos."
        ],
        [
            "nome" => "Leg Press",
            "descricao" => "O preferido e mais comum para o treino de pernas, por ser seguro e eficiente."
        ],
        [
            "nome" => "Puxada alta (Pulley)",
            "descricao" => "O equipamento principal e mais frequentado para o treino de costas."
        ],
        [
            "nome" => "Banco regulável com halteres",
            "descricao" => "A área de pesos livres mais utilizada, serve para peito, ombros, braços e pernas."
        ],
        [
            "nome" => "Cadeira extensora",
            "descricao" => "Presente em 100% das academias para o isolamento das coxas."
        ],
        [
            "nome" => "Cross Over (Polias)",
            "descricao" => "A máquina mais versátil do salão, usada para treinar o corpo inteiro."
        ]
    ];
}
?>