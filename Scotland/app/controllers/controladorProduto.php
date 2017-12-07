<?php

// O Controlador é a peça de código que sabe qual classe chamar, para onde redirecionar e etc.
// Use o método $_GET para obter informações vindas de outras páginas.

//faça um require_once para o arquivo Produto.php
require_once __DIR__."/../models/Produto.php";
//faça um require_once para o arquivo CrudProduto.php
require_once __DIR__."/../models/CrudProdutos.php";

//quando um valor da URL for igual a cadastrar faça isso
if ( $_GET['acao'] == 'cadastrar'){

    $produto = new Produto($_POST['titulo'],$_POST['preco'],$_POST['categoria'],$_POST['quantidade']);
    //crie um objeto $crud
    $crud = new CrudProdutos();
    $crud->salvar($produto);

    //redirecione para a página de produtos
    header("Location: ../views/admin/produtos.php");
}

//quando um valor da URL for igual a editar faça isso
if ( $_GET['acao'] == 'editar'){

    //algoritmo para editar
    $crud = new CrudProdutos();
    $crud->editarProduto($_GET['codigo'],$_POST['nome'],$_POST['preco'],$_POST['quantidade'],$_POST['categoria']);

    //redirecione para a página de produtos
    header("Location: ../views/admin/produtos.php");
}

//quando um valor da URL for igual a excluir faça isso
if ( $_GET['acao'] == 'excluir'){

    //algoritmo para excluir
    $crud = new CrudProdutos();
    $crud->excluirProduto($_GET['codigo']);
    //redirecione para a página de produtos
    header("Location: ../views/admin/produtos.php");
}
if ( $_GET['acao'] == 'comprar'){
        $crud = new CrudProdutos();
        $produto = $crud->buscarProduto($_GET['codigo']);
        $produto['quant_estoque'] -= $_POST['quant_nova'];
        $crud->editarProduto($produto['codigo'],$produto['nome'],$produto['preco'],$produto['quant_estoque'],$produto['categoria']);
    header("Location: ../views/admin/produtos.php");

}

function buscar($nome){

    $crud = new CrudProdutos();
    $produtos = $crud->getProdutos();
    $encontrados = [];
    if ($nome == null){
        return $produtos;
    } else {

        foreach ($produtos as $produto){
            if ($nome == $produto['nome']){
                $encontrados[] = $produto;
            }
        }

        return $encontrados;
    }

}