<?php
include '../conexao.php';

//receber dados do front-end
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$cpf = $_REQUEST['cpf'];
$senha = $_REQUEST['senha'];

$sql = "INSERT iNTO usuario(nome, email, cpf, senha) VALUES ('$nome', '$email','$cpf', '$senha')";
//executa sql
$resultado = mysqli_query($conexao,$sql);

session_start();
$_SESSION['mensagem'] = "cadastro com succeso!";

//mandar para pagina principal
header('location:../../principal.php');
?>
