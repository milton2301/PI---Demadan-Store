<?php
    include('validaADM.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../logo/apim.png" type="image/x-icon">
    <title>Cadastro de Peças</title>
    <style>

        body {
            text-align: center;
            font-family: candara, arial, helvetica;
            background-image: linear-gradient(to right, #fff6e1, #ffc637);
        }

        .container{
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px solid;
            border-radius: 10px;
            margin-left: 200px;
            margin-right: 200px;
            margin-top: 10%;
        }

        .dados{
            margin: 15px;
            font-size: 20px ;
        }

        label{
        display: inline-block;
        width: 15%;
        }

        input{
            background-color: whitesmoke;
            text-align: center;
            font-size: 80%;
            height: 10%;
            width:50%;
            border: 1px solid;
            border-radius: 0px;
        }

        button {
            background-color: #f58f51;
            color: black;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 20%;
            border-radius: 20px;
        }
        
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Tela de cadastro de peças</h1>
    <h1>Insira os dados da peça que deseja cadastrar!</h1>
        <form action="cadPecas.php" method="POST">
            <div class="dados">
                <label for="cod">Código</label>
                <input name="cod" type="text" placeholder="Código da peça" required >
            </div>
            <div class="dados">
                <label for="nome">Nome</label>
                <input name="nome" type="text" placeholder="Nome da peça a ser cadastrada" required >
            </div>
            <div class="dados">
                <label for="cor">Cor</label>
                <input name="cor" type="text" placeholder="Cor da peça a ser cadastrada" required>
            </div>
            <div class="dados">
                <label for="val">Preço</label>
                <input name="val" type="text" placeholder="Valor do produto" required>
            </div>
            <div class="dados">
                <label for="qtd">Quantidade</label>
                <input name="qtd" type="text" placeholder="Quantidade de peças cadastradas" required>
            </div>
            <div class="dados">
                <label for="marca">Marca</label>
                <input name="marca" type="text" placeholder="Marca da peça cadastrada" required>
            </div>
            <div class="dados">
                <label for="id">Fornecedor</label>
                <input name="id" type="text" placeholder="Codigo do fornecedor" required>
            </div>
            <div class="dados">
            <div class="dados">
                <label for="tam">Tamanho</label>
                <select name="tam" style="width: 50%; height: 30px; border-radius: 10px;">
                    <option value="PP">PP</option>
                    <option value="P">P</option>
                    <option value="M">M</option>
                    <option value="G">G</option>
                    <option value="GG">GG</option>
                    <option value="EXG">EXG</option>
                </select>
            </div>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
        <button><a href="pagina.php">Voltar</a></button>
    </div>    
</body>
</html>

<?php
    include_once('../header/header.php');
    include('conexao.php');

    if(empty($_POST['']) == ''){
        echo "<script>window.alert('Preencha todos os campos por favor!')</script>";
        exit();
    }elseif(isset($_POST['cod']) || isset($_POST['nome']) || isset($_POST['cor']) || isset($_POST['tam']) || isset($_POST['val']) || isset($_POST['qtd']) || isset($_POST['id'])){

        $codigo = $_POST['cod'];
        $nome = $_POST['nome'];
        $cor = $_POST['cor'];
        $tamanho = $_POST['tam'];
        $valor = $_POST['val'];
        $quantidade = $_POST['qtd'];
        $marca = $_POST['marca'];
        $fornecedor = $_POST['id'];

    $pegaNome = "SELECT codigo FROM produto WHERE codigo ='{$codigo}'";

    $queryNome = mysqli_query($strcon, $pegaNome);

    if(mysqli_num_rows($queryNome) ==  1){
        echo "<script>window.alert('Peça já cadastrada!')</script>";
        echo "<script>window.location = 'cadPecas.php'</script>";
    }else{
    $cad = "INSERT INTO produto VALUES ('$codigo', '$nome', '$valor', '$tamanho', '$cor', '$marca', '$fornecedor')";

        $insere = mysqli_query($strcon, $cad) or die("Não foi possivel cadastrar!");

        $estoque = "INSERT INTO estoque VALUES ('$nome','$quantidade','$codigo')";

        $inEstoque = mysqli_query($strcon, $estoque) or die("Não foi possivel cadastrar no estoque!");

        echo "Cadastro de ".$nome ." realizado com sucesso!";
        }
    }
?>
