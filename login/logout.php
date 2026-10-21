<?php
// essa parte inicia a sessao para poder encerrar ela
session_start();
// limpa todos os dados que estavam salvos na sessão
session_unset();
// apaga a sessão do usuario de vez
session_destroy();
// manda a pessoa de volta para a página inicial
header("Location: ../index.php");
exit();
?>