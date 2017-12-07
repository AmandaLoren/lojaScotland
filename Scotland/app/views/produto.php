<?php
require_once __DIR__."/../models/CrudProdutos.php";

$crud = new CrudProdutos();
//seguranca
$codigo = filter_input(INPUT_GET, 'codigo', FILTER_VALIDATE_INT); //consulte os slides.
$produto = $crud->buscarProduto($codigo);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BW</title>

    <!-- Bootstrap core CSS -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ifc-style.css" rel="stylesheet">

</head>
<script>
    function Desativar() {
        var quant = $produto['quant_estoque'];
        if(quant<=0){
            if(!document.getElementById('comprar').disabled) document.getElementById('comprar').disabled=true;
        }
        else
        {
            if(document.getElementById('comprar').disabled) document.getElementById('comprar').disabled=true;
        }
    }
</script>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../../index.php"><img src="../../assets/imagens/logo.png" alt="" width="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../../index.php">Início</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container product-content">

    <!-- Page Features -->
    <div class="row" id="produto">

        <div class="col-md-5">
            <img src="../../assets/imagens/product-default.png" alt="" class="img-fluid">
        </div>

        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <h2><?= $produto['nome']; ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span class="badge badge-primary"><?= $produto['categoria']; ?></span>
                    <span class="badge badge-warning"><?php if ($produto['quant_estoque']>0){echo 'Disponivel';}else{echo 'Indisponivel';}; ?></span>
                </div>
            </div>
            <!-- end row -->

            <div class="row description-wrapper">
                <div class="col-md-12">
                    <p class="description">Consectetur adipisicing elit. Accusantium ad, adipisci commodi delectus ea eius eligendi expedita in ipsum magnam modi mollitia nisi, obcaecati perspiciatis quae quo repellendus temporibus velit.
                    </p>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-12 bottom-rule">
                    <h2 class="product-price"><?= $produto['preco']; ?></h2>
                </div>
            </div>
            <!-- end row -->

            <div class="row add-to-cart">
                <div class="col-md-5 product-qty">
                    <form action="../controllers/controladorProduto.php?acao=comprar&codigo=<?=$codigo?>" method="post">
                        <input class="btn btn-default btn-lg btn-qty" name="quant_nova" value="1" />
                        <input type="submit" id="comprar" class="btn btn-lg btn-brand btn-full-width" value="Comprar" onkeypress="Desativar()">
                    </form>
                </div>
            </div><!-- end row -->

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Instituto Federal Catarinense de Educação, Ciência e Tecnologia</p>
    </div>
    <!-- /.container -->
</footer>

</body>

</html>