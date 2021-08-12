<?php 
    include('../header/headerCli.php');
    include('validaCliente.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../logo/apim.png" type="image/x-icon">
    <title>Cadastro</title>
    <style>
        .alert{ /* Estilo do aletrta*/
            padding: 25px;
            border: 1px solid gray;
            border-radius: 10px;
            margin: 10px;
            font-size: 18px; border-color: #e8273b;
            color: #FFF;
            background-color: #ed5565;
        }

        body {
            font-family: candara, arial, helvetica;
            text-align: center;
            background-image: linear-gradient(to right, #fff6e1, #ffc637);
            margin-top: 10% !important;
        }


        label{
        font-size: 100%;
        display: inline-block;
        width: 50%;
        }

        input{
            background-color: whitesmoke;
            text-align: center;
            font-size: 80%;
            height: 5% !important;
            width:100% !important;
            border: 1px solid;
            border-radius: 0% !important;
        }

        button {
            background-color: #f58f51 !important;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 20%;
            border-radius: 20px;
        }

        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
        <h2><strong>SELECIONAR FORMAS DE PAGAMENTO</button></h2>
  
        <div id="container">
            
            <form action="#" method="POST">
                    <div class="container">
                        <?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?>
                        <br>
                        <label for=""><h2>Selecione a forma de pagamento</h2></label>
                        <select name="tam" style="width: 50%; height: 30px; border-radius: 10px;">
                            <option value="PP">Débito</option>
                            <option value="P">Crédito</option>
                            <option value="M">Boleto bancário</option>
                    </select>
                        <br><br>
                        <button type="button" onclick="alerta();"><a href="#">Realizar pagamento</a></button>
                    </div>
                    <button type="button"><a href="index.php">Voltar</a></button>
            </form>
        </div>

        <script>
        
        function alerta(){
            window.alert('Pagamento realizado com sucesso!');
        }

        </script>

</body>
</html>