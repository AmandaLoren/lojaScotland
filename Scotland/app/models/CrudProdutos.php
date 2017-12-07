<?php
/**
 * Created by PhpStorm.
 * User: JEFFERSON
 * Date: 16/11/2017
 * Time: 10:56
 */

require_once __DIR__."/Conexao.php";
require_once __DIR__."/Produto.php";

class CrudProdutos {

    private $conexao;
    private $produto;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function salvar(Produto $produto){
        $sql = "INSERT INTO tb_produtos (nome, preco, categoria,quant_estoque) VALUES ('$produto->nome', $produto->preco, '$produto->categoria','$produto->quant_estoque')";

        $this->conexao->exec($sql);
    }

    public function buscarProduto(int $codigo){
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos WHERE codigo = $codigo");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC);

        return $produto;

    }

    public function getProdutos(){
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $lista_produtos = [];
        foreach ($arrayProdutos as $produto){
            $lista_produtos[] = new Produto($produto['nome'],$produto['preco'],$produto['categoria'],$produto['quant_estoque'],$produto['codigo']);
        }
        return $lista_produtos;
    }

    public function editarProduto($codigo,$nome,$preco,$quantidade,$categoria){
        $sql = "UPDATE tb_produtos SET nome='$nome', preco=$preco, quant_estoque=$quantidade,categoria='$categoria' WHERE codigo =$codigo";
        $this->conexao->exec($sql);
    }

    public function excluirProduto($codigo){
        $sql = "DELETE FROM tb_produtos WHERE codigo=$codigo";
        $this->conexao->exec($sql);
    }
}

