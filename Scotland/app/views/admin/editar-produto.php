<!-- ## !!ADICIONE O CABECALHO E O RODAPE PARA A PAGINA -->
<?php require_once 'cabecalho.php';
      require_once __DIR__.'/../../models/CrudProdutos.php';
      require_once __DIR__.'/../../models/Produto.php';

$crud = new CrudProdutos();
$produto = $crud->buscarProduto($_GET['codigo']);
?>
<h2>Editar Produtos</h2>
<form action="../../controllers/controladorProduto.php?acao=editar&codigo=<?=$produto['codigo']?>" method="post">
    <div class="form-group">
        <label for="produto">Produto:</label>
        <input name="nome" type="text" class="form-control" id="produto" aria-describedby="nome produto" value="<?=$produto['nome']?>">
    </div>

    <div class="form-group">
        <label for="preco">Preco</label>
        <input name="preco" type="number" step="0.01" class="form-control" id="preco" value="<?=$produto['preco']?>">
    </div>

    <div class="form-group">
        <label for="quantidade">Quantidade</label>
        <input name="quantidade" type="number" class="form-control" id="quantidade" value="<?=$produto['quant_estoque']?>">
    </div>

    <div class="form-group">
        <label for="Categoria">Categoria</label>
        <select name="categoria" class="form-control" id="Categoria">
            <option>Futebol</option>
            <option>Volêi</option>
            <option>Rugbi</option>
            <option>Soccer</option>
            <option>Baseball</option>
            <option>Basquete</option>
            <option>Hóquei</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>

</form>

<?php require_once 'rodape.php'?>