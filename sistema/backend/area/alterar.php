<?php
include '../conexao.php';
// receber dados do front-end
$id = $_REQUEST['id'];
$nome = $_REQUEST['nome'];

$sql = "UPDATE regiao SET nome='$nome', WHERE id='$id' ";

//executar o sql
mysqli_query($conexao, $sql);
//retornar para tela pincipal
session_start();
$_SESSION['mensagem'] = "$nome Alterado com succeso!";

header("location:../../regiao.php");
?>