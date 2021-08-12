<?php
    include('conexao.php');
    include('validaADM.php');
    include_once('../header/header.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-image: linear-gradient(to right, #fff6e1, #ffc637);
            font-family: candara, arial, helvetica;
        }
        .container{
            background-color: rgba(255, 255, 255,0.5);
            text-align: center;
            border: 1px solid;
            border-radius: 10px;
            margin: 150px;
        }
        .row{
            margin: 20px;
            font-size: 30px;
        }
        a{
            text-decoration: none;
            color: black;
        }
        button a{
            text-decoration: none;
            color: black;
            font-size: 25px;
        }

        button {
            background-color: #f58f51;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 20%;
            border-radius: 20px;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>BEM VINDO A PAGINA ADMINISTRATIVA</h1> 
    <div class="row">
        <?php echo "<strong>Bem vindo " .$_SESSION['admin'] ."</strong>"; ?>
    </div>
    <div class="row">
        <a href="cadPecas.php">Cadastro de peças</a>
    </div>
    <div class="row">
        <a href="estoque.php">Relatório de estoque</a>
    </div>
    <div class="row">
        <a href="edita.php">Editar produtos</a>
    </div>
    <div class="row">
        <a href="cadastraAdmin.php">Cadastrar Administrador</a>
    </div>
    <div class="row">    
        <button><a href="logout.php">Sair</a></button> 
    </div>
</div>
</body>
</html>