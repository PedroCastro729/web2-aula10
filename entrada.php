<?php
require('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$comando = "SELECT * FROM `usuario` WHERE `email` = '$email' AND `senha` = '$senha'";

$stm = $conexao->prepare($comando);
$stm->execute();

$resultado = $stm->fetch(PDO::FETCH_ASSOC);

if(isset($resultado['id']))
    {
        session_start();
        $_SESSION['id'] = $resultado['id'];
        $_SESSION['nome'] = $resultado['nome'];
        echo "Bem vindo $resultado['nome']";
        echo "<br><br>";
        echo "<a href= 'sair.php'>Sair</a>"
    } else{
        echo "erro";
    }

    $conexao = null;
?>