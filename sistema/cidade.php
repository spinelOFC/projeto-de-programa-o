<?php
include './backend/conexao.php';
include './backend/validacao.php';
include './recursos/cabecalho.php';
$destino = "./backend/cidade/inserir.php";

//caso eu esteja alterando algum registro
//se for diferente de vazio, se tiver is na url
if (!empty($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM cidade WHERE id='$id' ";
  //executa sql
  $dados = mysqli_query($conexao, $sql);
  $cidades = mysqli_fetch_assoc($dados);
  $destino = "./backend/cidade/alterar.php";
}
?>


<body>
  <?php include './recursos/menuSuperior.php' ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2 menu">
        <?php include './recursos/menuLateral.php' ?>
      </div>

      <div class="col-3">
        <h1> cadastro </h1>

        <form action="<?= $destino ?>" method="post">

  <div class="mb-3">
            
            <label class="form-label">id</label>
            <input name="id" type="text" readonly value="<?php echo isset($cidades) ? $cidades['id'] : "" ?>"
              class="form-control ">
          </div>

          <div class="mb-3">

            <label class="form-label">nome</label>
            <input name="nome" type="text" autofocus value="<?php echo isset($cidades) ? $cidades['nome'] : "" ?>"
              class="form-control ">
          </div>

          <form action="<?= $destino ?>" method="post">
            <div class="mb-3">
              <label class="form-label">cep</label>
              <input name="cep" type="text" autofocus value="<?php echo isset($cidades) ? $cidades['cep'] : "" ?>"
                class="form-control cep">
            </div>

            <div class="mb-3">
              <label class="form-label">estado</label>
              <input name="estado" type="text" autofocus value="<?php echo isset($cidades) ? $cidades['estado'] : "" ?>"
                class="form-control">
            </div>

            <div class="mb-3">
              <label> regiao </label>
              <select name="regiao" class="form-select" required>
                <option> selecione uma regiao</option>
                <?php
                $sql = "SELECT * FROM regiao ORDER BY nome";
                $resultado = mysqli_query($conexao, $sql);
          $regiaoSelecionada = isset($cidades) ? $cidades["id_regiao_fk"] :'' ;

          while($reg = mysqli_fetch_assoc($resultado)) {
         $selecao = ($reg['id'] == $regiaoSelecionada) ?'selected':'';
         echo"<option value='{$reg['id']}' $selecao> {$reg['nome']} </option>";
          }
                ?>  
              </select>

            </div>
            <button type="submit" class="btn btn-primary">salvar</button>
          </form>
      </div>
      <div class="col-7">
        <h1> listagem</h1>

        <table id="tabela" class="table table-striped table-bordered">
          <thead class="table-primary">
            <tr>
              <th scope="col">#id</th>
              <th scope="col">nome</th>
              <th scope="col">cep</th>
              <th scope="col">estado</th>,
              <th scope="col">regiao</th>
              <th scope="col">opçao</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql = "SELECT * FROM cidade";
            //executa o comando
            $dados = mysqli_query($conexao, $sql);
            //percorrer todos registros do banco
            while ($coluna = mysqli_fetch_assoc($dados)) {
              ?>
              <tr>
                <th scope="row"><?php echo $coluna['id'] ?>
                <th scope="row"><?php echo $coluna['nome'] ?>
                <th scope="row"><?php echo $coluna['cep'] ?>
                <th scope="row"><?php echo $coluna['estado'] ?>
              <?php 
              $sql = "SELECT * FROM regiao  WHERE id=".$coluna['id_regiao_fk'];
              $resultado = mysqli_query($conexao, $sql);
              $regiao = mysqli_fetch_assoc($resultado);
              ?>
              <td> <?php echo $regiao['nome'] ?> </td>
              <td>
                  <a href="./cidade.php?id=<?= $coluna['id'] ?>"><i class="fa-solid fa-pen-to-square me-3"
                      style="color: #B197FC;"></i></a>
                  <a href="<?php echo "./backend/cidade/excluir.php?id=" . $coluna['id'] ?>"
                    onclick="return confirm('deseja realmente excluir?')"><i class="fa-solid fa-trash"
                      style="color: #63E6BE;"></i> </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
  <font></font>
  <div class="row">

    <div class="col-2 menu">
      coluna 1

    </div>
    <div class="col-2 "> coluna 2</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
      integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>