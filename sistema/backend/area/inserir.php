<?php
include '../conexao.php';

//receber dados do front-end
$nome = $_REQUEST['nome'];
$numero =$_REQUEST['numero'];

$sql = "INSERT iNTO area (nome, numero) VALUES ('$nome','$numero')";

$resultado = mysqli_query($conexao,$sql);

session_start();
$_SESSION['mensagem'] = "cadastro com succeso!";

//mandar para pagina principal
header('location:../../area.php');
?>
