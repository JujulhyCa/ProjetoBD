<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    }    
    if($_POST){
        $id = $_SESSION['id'];
        if (excluirProduto($_SESSION['id'])){
            header('Location: index.php');
        } else 
            echo "Erro ao excluir o registro.";
    }
        
   $dados = consultarProdutoId($id);
?>

    <h3>Excluir Produto</h3>
    <form action="excluir_produto.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control" name="nome" value="<?=$dados['nome']?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Informe a descrição</label>
                <input type="text" class="form-control"     name="descricao" value="<?=$dados['descricao']?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="valor" class="form-label">Informe o valor</label>
                <input type="text" class="form-control"     name="valor" value="<?=$dados['valor']?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="categoria" class="form-label"> Selecione a categoria</label>
                <select class="form-select" name="categoria" disabled>
                    <?php
                        $linhas = retornarCategorias();
                        while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                            if ($l['id'] == $dados["categoria_id"])
                                echo "<option selected value='{$l['id']}'>{$l['descricao']}</option>";
                            else
                                echo "<option value='{$l['id']}'>{$l['descricao']}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger" 
                value="Excluir" name="btnExcluir">
            </div>
        </div>
    </form>
<?php
    require_once("../rodape.php");