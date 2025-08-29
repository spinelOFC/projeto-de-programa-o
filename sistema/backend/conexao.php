<?php

$endereco = "localhost";
$nome = "bancorics";
$usuario  = "root";
$senha  = "";

$conexao=mysqli_connect($endereco,$usuario,$senha, $nome);


if(!$conexao){
die("erro com a conecxão com o banco!".mysqli_connect_error());
}


?>