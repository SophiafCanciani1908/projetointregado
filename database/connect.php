<?php
// Liga o nosso site ao banco de dados PostgreSQL
// Vê as informações para encontrar o servidor do Bnaco de Dados
$host = "192.168.10.70";
$dbname = "academiagirl";
$user = "postgres";
$pass = "SENAI@1908"; 

try {
    // Tenta fazer a conexão com o banco de dados do postegresql
    $conexao = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    // se der algum tipo de erro na conexão, mostra essa mensagem na tela e para o sistema
    echo "<div style='color: #d81b60; text-align: center; font-weight: bold;'>Erro na conexão: " . $e->getMessage() . "</div>";
    exit();
}
?>