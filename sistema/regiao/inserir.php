<?php
include '../conexao.php';

//receber dados do front-end
$nome = $_REQUEST['nome'];

$sql = "INSERT iNTO regiao (nome) VALUES ('$nome')";

$resultado = mysqli_query($conexao,$sql);

session_start();
$_SESSION['mensagem'] = "cadastro com succeso!";

//mandar para pagina principal
header('location:../../regiao.php');
?>
