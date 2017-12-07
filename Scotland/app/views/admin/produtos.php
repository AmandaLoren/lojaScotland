<?php

    require_once __DIR__."/../../models/CrudProdutos.php";
    $crud = new CrudProdutos();

    $listaProdutos = $crud->getProdutos();
    if (isset($_GET['nome_buscado'])){
        $listaProdutos = buscar($_GET['nome_buscado']);
    }else{
        $listaProdutos = $crud->getProdutos();
    }

    require_once 'cabecalho.php';

?>

<!--Barra de busca-->
<div class="row">
    <div class="col-md-12">
        <div class="input-group">


                <input type="text" name="nome_buscado" class="form-control" placeholder="Digite o nome do produto" aria-describedby="basic-addon2">
                <button type="submit" class="input-group-addon" id="basic-addon2">Buscar</button>

        </div>
    </div>
</div>
<br>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Título</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Categoria</th>
        <th>Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($listaProdutos as $produto): ?>
    <tr>
        <th scope="row"><?=$produto->codigo?></th>
        <td><?=$produto->nome?></td>
        <td><?=$produto->preco?></td>
        <td><?=$produto->quant_estoque?></td>
        <td><?=$produto->categoria?></td>
        <td><a href="editar-produto.php?codigo=<?=$produto->codigo?>">Editar</a> | <a href="../../controllers/controladorProduto.php?acao=excluir&codigo=<?=$produto->codigo?>">Remover</a></td>
    </tr>
   <?php endforeach; ?>

    </tbody>
</table>

<?php require_once 'rodape.php';?>