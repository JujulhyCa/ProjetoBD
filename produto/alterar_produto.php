<?php
    require_once("../cabecalho.php");
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        session_start();
        $_SESSION['id'] = $id;
    } else
        session_start();
        $id = $_SESSION['id'];
    
        if($_POST){
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];
            $categoria = $_POST['categoria'];
            if ($nome!= "" && $descricao !="" && $valor != "" && $categoria != ""){
                if (alterarProduto($nome, $descricao, $valor, $categoria, $_SESSION['id'])){
                    echo "Produto alterado com sucesso.";
                } else {
                    echo "Erro ao alterar o produto.";
                }
    
            } else {
                echo "Preencha todos os campos!";
            }
        }
    $dados = consultarProdutoId($id);
?>

    <h3>Alterar Produto</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control" name="nome" value="<?=$dados['nome']?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Informe a descrição</label>
                <input type="text" class="form-control"     name="descricao" value="<?=$dados['descricao']?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="valor" class="form-label">Informe o valor</label>
                <input type="text" class="form-control"     name="valor" value="<?=$dados['valor']?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="categoria" class="form-label"> Selecione a categoria</label>
                <select class="form-select" name="categoria">
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
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </div>
    </form>

<?php
    
    require_once("../rodape.php");