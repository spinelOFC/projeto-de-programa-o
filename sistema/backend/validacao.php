<?php
session_start();

//se nao tiver logado manda para o login
//se nao existir variavel de sessao cpf ou senha


if (!isset($_SESSION['cpf']) or !isset($_SESSION['senha'])){
// destruir sessão
session_destroy();
unset($_SESSION['cpf']);
unset($_SESSION['senha']);

//manda para o login
header('location:./index.php');
}