<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto PHP</title>
</head>
<body>
  <?php 
    // Criando uma variavel
    $nome = 'Vardo';
    $idade = 75;
    $peso = 70.51;
    $ativo = true;
    // Para exibir na tela
    echo 'O meu nome é '.$nome.' e tenho '.$idade.' anos <br>';
    echo "O meu nome é $nome e tenho $idade anos";

    // Verificar se é maior de idade
    if($idade >= 18 && $idade < 75){
      echo "<br> $nome é maior de idade! " ;
    }elseif($idade >= 75){
      echo "<br> $nome é idoso!";
    }else{
      echo "<br> $nome é menor de idade! " ;
    }

    echo '<table border = ".5">';
    for($i = 1; $i <= 10; $i++){
      echo "
      <tr>
      <td> contador </td>
      <td> $i </td>
      </tr>
      ";
    }
      echo '</table>';

      // aprendendo a montar lista
      //          0         1         2         3           4         5
    $lista = ['Gilmar', 'jhonas', 'Macabeu', 'Arlindo', 'Amadeu', 'Norberto'];
    echo '<br>';
    echo $lista[5];

    for($i = 0; $i < count($lista); $i++){
      echo '<hr>';
      echo $lista[$i];
    }

    $conta = 0;
    while($conta < 4){
      echo '<br>';
      echo $conta;
      $conta++;
    } 
  ?>
</body>
</html>
