<?php

session_start();
//destruir a sessao
session_destroy();

// linpar as variaves de sesao
unset($_SESSION['cpf']);
unset($_SESSION['senha']);

//mande para o login
header('location:..index.php');

?>