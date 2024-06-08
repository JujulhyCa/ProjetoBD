<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD com Bootstrap Modals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">CRUD com Bootstrap Modals</h2>
    <div class="text-right mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoriaModal">Adicionar Categoria</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Categoria 1</td>
                    <td>
                        <form action="index.php" method="post" class="d-inline">
                            <input type="hidden" name="id_editar" value="1">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                        <form action="index.php" method="post" class="d-inline">
                            <input type="hidden" name="id_excluir" value="1">
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Categoria 2</td>
                    <td>
                        <form action="index.php" method="post" class="d-inline">
                            <input type="hidden" name="id_editar" value="1">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                        <form action="index.php" method="post" class="d-inline">
                            <input type="hidden" name="id_excluir" value="1">
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Adicionar Usuário -->
<div class="modal" id="addCategoriaModal" tabindex="-1" aria-labelledby="addCategoriaModalLabel" data-bs-backdrop="false" aria-modal="true" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoriaModalLabel">Adicionar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="name" class="form-label">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="btnAddCategoria">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Usuário -->
<?php 
    if (isset($_POST['id_editar'])){
        $edit_id = $_POST['id_editar'];
?>
    <div class="modal" id="editarCategoriaModal" tabindex="-1" aria-labelledby="editarCategoriaModalLabel" aria-modal="true" role="dialog" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarCategoriaLabel">Editar Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='index.php'"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_editar_formulario" name="id" value="">
                        <div class="row">
                            <div class="col">
                                <label for="name" class="form-label">Descrição</label>
                                <input type="text" class="form-control" id="descrica" name="descricao" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href='index.php'">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php 
    } elseif (isset($_POST['id_excluir'])) {
        $delete_id = $_POST['id_excluir'];
?>
    <div class="modal" id="deletarCategoriaModal" tabindex="-1" aria-labelledby="deletarCategoriaModalLabel" aria-modal="true" role="dialog" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="index.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletarCategoriaModalLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="window.location.href='index.php'"></button>
                    </div>
                    <div class="modal-body">
                        <p>Tem certeza que deseja excluir essa categoria?</p>
                        <p><strong>ID:</strong> </p>
                        <p><strong>Descrição:</strong> </p>
                        <input type="hidden" name="id_excluir_formulario" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href='index.php'">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php 
    } 
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>
</html>
