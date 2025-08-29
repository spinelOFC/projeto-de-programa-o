<?php
include 'conexao.php';
// receber o cpf e senha do formulario de login por requisicao
$cpf = $_REQUEST['cpf'];
$senha = $_REQUEST['senha'];

//comando sql que busca no banco um usuario com cpf e senha especiafica
$sql = "SELECT * FROM usuario WHERE cpf= '$cpf' AND senha= '$senha' ";

// execulta sql
$resultado = mysqli_query($conexao, $sql);

// cada valor dos resultados é assosiado ao nome da coluna no banco
$coluna = mysqli_fetch_assoc($resultado);

// inprime o nome da pessoa, se achar no banco
echo $coluna['nome'];

if(mysqli_num_rows($resultado) > 0){
    session_start();//inciar a sessao


    $_SESSION['usuario'] = $coluna['nome'];
        $_SESSION['cpf'] = $coluna['cpf'];
    $_SESSION['senha'] = $coluna['senha'];

    header('location:../principal.php');
} else{
    header('location:../index.php?erro=1');
}
?>