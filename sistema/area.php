<?php
include './backend/conexao.php';
include './backend/validacao.php';
include'./recursos/cabecalho.php';
$destino = "./backend/area/inserir.php";

//caso eu esteja alterando algum registro
//se for diferente de vazio, se tiver is na url
if(!empty($_GET['id'])){
 $id = $_GET['id'];
$sql = "SELECT * FROM area WHERE id='$id' ";
//executa sql
$dados = mysqli_query($conexao,$sql);
$areas = mysqli_fetch_assoc($dados);
$destino = "./backend/area/alterar.php";
}
?>


<body>
<?php include'./recursos/menuSuperior.php'?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2 menu">
        <?php include './recursos/menuLateral.php'?>
      </div>

      <div class="col-3">
        <h1> cadastro </h1>

        <form action="<?= $destino ?>" method="post">
           <div class="mb-3">
              <label class="form-label">numero</label>
              <input name="numero" type="text" autofocus value="<?php echo isset($areas) ? $areas['numero']: ""?>" class="form-control ">
            </div>

           <div class="mb-3">
              <label class="form-label">nome</label>
              <input name="nome" type="text" autofocus value="<?php echo isset($areas) ? $areas['nome']: ""?>" class="form-control ">
            </div>

              <div class="mb-3">
              <label class="form-label">id</label>
              <input readonly name="id" type="text" value="<?php echo isset($areas) ? $areas['id']: ""?>" class="form-control ">
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
              <th scope="col">opçoões</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql = "SELECT * FROM area";
            //executa o comando
            $dados = mysqli_query($conexao, $sql);
            //percorrer todos registros do banco
            while ($coluna = mysqli_fetch_assoc($dados)) {
              ?>
              <tr>
                <th scope="row"><?php echo $coluna['id'] ?>
            </th>
                <td><?php echo $coluna['nome'] ?></td>
                <td> 
                  <a href="./area.php?id=<?= $coluna ['id'] ?>"><i class="fa-solid fa-pen-to-square me-3" style="color: #B197FC;"></i></a>
                  <a href="<?php echo "./backend/area/excluir.php?id=" .$coluna['id'] ?>" onclick="return confirm('deseja realmente excluir?')"><i class="fa-solid fa-trash" style="color: #63E6BE;"></i> </a>
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