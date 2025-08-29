<?php
include '../conexao.php';

// receber dados do front-end
$id = $_REQUEST['id'];
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$cpf = $_REQUEST['cpf'];
$senha = $_REQUEST['senha'];

$sql = "UPDATE usuario SET nome='$nome', email='$senha' WHERE id='$id' ";

//executar o sql
mysqli_query($conexao, $sql);
//retornar para tela pincipal

session_start();
$_SESSION['mensagem'] = "$nome Alterado com succeso!";


header("location:../../principal.php");
?>