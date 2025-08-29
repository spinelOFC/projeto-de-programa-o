<?php
include('../conexao.php');
$id = $_REQUEST['id'];

$sql = "DELETE FROM regiao WHERE id='$id' ";

$resultado = mysqli_query($conexao, $sql);

session_start();
$_SESSION['mensagem'] = "excluido com succeso!";

header('location:../../regiao.php');
?>