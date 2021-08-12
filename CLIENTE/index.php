<?php 
    session_start();
    include('conn.php');
    include('../header/headerCliente.php');
    
    //Se não existir usuário logado e tentar comprar ele redireciona para o login
    if(isset($_GET['adicionar']) && !isset($_SESSION['user'])){
            header('Location: login.php');
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <title>Carrinho</title>
    <style>
        *{
         margin: 0; padding:0; box-sizing: border-box;
        }
        .container{
            display: flex;
            margin-top: 10% !important;
            max-width: 90%;
            display: flex;
            flex-wrap: wrap;
        }

        .prod{
            width: 30%;
            padding: 0 30px;
            display: flex;
            flex-wrap: wrap;
        }
        
        .prod img{
            max-width: 100%;
            margin-top: 10%;
        }

        .prod img:hover{
            border: solid 3px ;
            transform: scale(1.2) 1s;
        }

        .itens a{
            display: block;
            padding: 10px;
            color: white;
            background-color: #f58f51;
            border-radius: 3px;
            text-align: center;
            text-decoration: none;
        }

        .carro{
            max-width:100%;
            padding-bottom: 10px;
            border-bottom: 2px dotted ;
        }   

        .carro p{
            font-size: 90%;

        }

        .car{
            text-align: center;
            position: fixed;
            right:0;
            top: 10%;
            border: dotted;
            max-width: 250px;
            margin-top: 5%;
            margin-left: 20%;
            background-color: whitesmoke;
        }

        .itens{
            margin-left: 5%;
            margin-right: 5%;
            margin-top: 1%;
            margin-bottom: 1%;
        }

        .verCarro{
            position: fixed;
            right:8%;
            top: 8%;
            width: 13%;
            margin-top: 0%;  
        }

        .verCarro img{
            width: 55%;
            height: 60px;
            margin-top:0%;
        }

        .verCarro img:hover{
            transform: scale(1.1);
            cursor: pointer;
        }

        form{
            all:initial;
        }

        .compra{
            background-color:#f58f51;
            font-size:10% !important;
            position: fixed;
            right:0%;
            top: 91%;
            width: 21%;
            border-radius: 20px;
            
        }

    </style>

</head>
<body>
   <div class="container">
   <a href="../imagens/short.png"></a> <!--Pegar link das imagens-->
    <?php
        $produtos = array(['codigo'=>'10','nome'=>'Body','imagem'=>'../imagens/body.png','valor'=>'75'],
                          ['codigo'=>'14','nome'=>'Blazer','imagem'=>'../imagens/blazer.png','valor'=>'90'],
                          ['codigo'=>'15','nome'=>'Cardigan','imagem'=>'../imagens/cardigan.png','valor'=>'110'],
                          ['codigo'=>'17','nome'=>'Casaco','imagem'=>'../imagens/casaco.png','valor'=>'150'],
                          ['codigo'=>'20','nome'=>'Conjunto','imagem'=>'../imagens/conjunto.png','valor'=>'99'],
                          ['codigo'=>'6','nome'=>'Jaqueta','imagem'=>'../imagens/jaqueta.png','valor'=>'89'],
                          ['codigo'=>'2','nome'=>'Macacao','imagem'=>'../imagens/macacao.png','valor'=>'65'],
                          ['codigo'=>'1','nome'=>'Mini Saia','imagem'=>'../imagens/miniSaia.png','valor'=>'49'],
                          ['codigo'=>'9','nome'=>'Short','imagem'=>'../imagens/short.png','valor'=>'59']);

        foreach($produtos as $key => $value){
    ?>
        <div class="prod">
            <img src="<?php echo $value['imagem']?>"/>
            <div class="itens"><a href="?adicionar=<?php echo $key ?>">+</a></div>
            <div class="itens"><p><?php echo $value['nome']," R$ " .$value['valor'].",00"?></p></div>
            <div class="itens"><a href="?remover=<?php echo $key ?>">-</a></div>
        </div>

    <?php 
        }
    ?>
    </div><!--container-->
        
        <?php
            if(isset($_GET['adicionar'])){
                //adcionar itens ao Carrinho
                $id = (int) $_GET['adicionar'];
                if(isset($produtos[$id])){
                    if(isset($_SESSION['carrinho'][$id])){
                        $_SESSION['carrinho'][$id]['quantidade']++;
                    }else{
                        $_SESSION['carrinho'][$id] = array('quantidade'=>1,'nome'=>$produtos[$id]['nome'],'valor'=>$produtos[$id]['valor']);
                    }
                }else{
                    die('Produto não existente');
                }
            }
            //Remove itens do carrinho
            if(isset($_GET['remover'])){
                $id = (int)$_GET['remover'];
                if(isset($_SESSION['carrinho'][$id])){
                    unset($_SESSION['carrinho'][$id]);
                }
            }
    ?>

    <div class="car" id="car" style="display:none"><!--Class car-->
    <?php
        $total = null;
        $user = null;
        $dia = null;
        $valor = null;
        $nome = null;
        $quantidade = null;
        echo "<h2>Itens do carrinho</h2><br>";
        if(isset($_SESSION['carrinho']))
        foreach($_SESSION['carrinho'] as $key => $value){
            echo '<div class="carro">';
            echo '<p><strong>Nome</strong>: '.$value['nome'].'<br> <strong>Qunatidade</strong>: '.$value['quantidade'].'<br> <strong>Total</strong>: R$ '.($value['quantidade'] * $value['valor']).',00</p>';
            echo '</div>';
            $valor = $valor + $value['valor'] * $value['quantidade'];
            //$total = $total + $value['valor'] * $value['quantidade'];
        }
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $user = $_SESSION['user'];
            $data = date('Y-m-d\TH:i:s.uP', time());
            $atualiza = "INSERT INTO compra VALUES (DEFAULT,'$data','$valor','$user')";
            $query = mysqli_query($strcon, $atualiza) or die ("Não possivel realizar a compra!");
            
            foreach($_SESSION['carrinho'] as $key => $value){
                    $nome = $value['nome'];
                    $quantidade = $value['quantidade'];     
                    $estoque = "UPDATE estoque SET quantidade = (quantidade -" .$quantidade. ") WHERE nome = '".$nome."'";
                    $queryEstoque = mysqli_query($strcon, $estoque) or die ("Item não localizado");
            
                }
        }
        echo "Total a pagar: R$" .$valor. ",00";

    ?>  
    </div> <!--Classe car-->
    <div class="verCarro" onMouseOver="mostra();" onmouseleave="esconde();">
        <img src="../logo/carrinho.png" alt="Imagem carrinho">
    </div>
    <?php 
    if(isset($_SESSION['carrinho'])){
    echo '<div class="compra">
        <form action="index.php" method="POST" style="border:none">
            <button type="submit"; onclick="alertar();">Finalizar compra</button>
        </form>
    </div>';
    }
    ?>
<?php include('../header/cookies.php') ?>

<script>
    function mostra(){
            document.getElementById('car').style.display="block";
        }

        function esconde(){
            document.getElementById('car').style.display="none";
    }

    function alertar(){
        window.alert('Compra realizada com sucesso!');
    }

</script>
</body>
</html>
