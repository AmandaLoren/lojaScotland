<?php
/**
 * Created by PhpStorm.
 * User: JEFFERSON
 * Date: 09/11/2017
 * Time: 10:40
 */

require_once __DIR__."/Conexao.php";


class Produto {

    public $codigo;
    public $nome;
    public $preco;
    public $categoria;
    public $quant_estoque;

    public function __construct($nome, $preco, $categoria, $quantidade, $codigo = null){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->categoria = $categoria;
        $this->quant_estoque = $quantidade;
        $this->codigo = $codigo;

    }

    public function estaDisponivel(){
        if ($this->quant_estoque>0){
            return 'Disponível';
        }else{
            return 'Indisponível';
        }
    }
}
