<?php
include_once('../header/header.php');
include('conexao.php');
include('validaADM.php');

$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

$result_produto = "SELECT * FROM produto WHERE nome = '$nome'";
$resultado_produto = mysqli_query($strcon, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel administration</title>
    <style>
        body{
            background-image: linear-gradient(to right, #fff6e1, #ffc637);
        }
        .container{
            text-align: center;
            border: 1px solid;
            margin: 100px;
            margin-top: 10%;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.5);
        }
        div{
            margin: 10px;
        }

        label{
        display: inline-block;
        width: 10%;
        }

        input{
            background-color: whitesmoke;
            text-align: center;
            font-size: 15px;
            height: 15px;
            width:50%;
            border: 1px solid;
            border-radius: 0px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        button{
            background-color: #f58f51;
            color: black;
            border-radius: 10px;
            width: 8%;
        }
        
    </style>		
</head>
<body>
<div class="container">
    <div>
    	<h1>Editar Produto</h1>
    </div>
    <div>	
    <form action="edita.php" method="post">
            <label for="nome">Buscar</label>
            <input type="text" name="name" placeholder="Para editar insira aqui o nome da peça" style="width: 42% !important;">
            <button type="submit">Buscar</button>
    </form>
    </div>

    <form method="POST" action="edita_produto.php">
        <div>
            <label>Código</label>
			<input type="number" name="codigo" value="<?php echo $row_produto['codigo']; ?>">
        </div>
        <div>
			<label>Nome</label>
			<input type="text" name="nome"  value="<?php echo $row_produto['nome']; ?>">
        </div>
        <div>
            <label>Preço</label>
            <input type="number" name="preco" value="<?php echo $row_produto['valor']; ?>">
        </div>
        <div>
            <label>Tamanho</label>
            <input type="text" name="tamanho" value="<?php echo $row_produto['tamanho']; ?>">
        </div>
		<div>
        	<label>Cor</label>
			<input type="text" name="cor" value="<?php echo $row_produto['cor']; ?>">
        </div>
        <div>
            <label>Marca</label>
            <input type="text" name="marca" value="<?php echo $row_produto['marca']; ?>">
        </div>
        <div>
            <label>Fornecedor</label>
            <input type="number" name="id_fornecedor" value="<?php echo $row_produto['id_fornecedor']; ?>">
        </div>
        <div>
            <button type="submit">Salvar</button>
        </div>
    </form>
    <div>    
        <button><a href="pagina.php">Voltar</a></button>
    </div>
</div>
</body>
</html>
