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

        .container{
            border: 1px solid;
            border-radius: 10px;
            margin-left: 10%;
            margin-right: 10%;
            margin-top: 1% !important;
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
            border-radius: 0px !important;
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
        <h2><strong>CADASTRO</button></h2>
  
        <div id="container">
            
            <form action="cadastro.php" method="POST">
                    <div class="container">
                        <div class="row">
                            <label for="name">Nome completo: </label>
                            <input type="text" name="name" placeholder="Nome completo" required>
                        </div>
                        <div class="row">
                            <label for="cpf">Insira seu CPF: </label>
                            <input type="text" name="cpf" placeholder="Insira seu CPF" required>
                        </div>
                        <div class="row">
                            <label for="nasc">Data de nascimento: </label>
                            <input type="text" name="nasc" required placeholder="dd / mm / aaaa" maxlength="12" id="calendario">
                        </div>
                        <div class="row">
                            <label for="email">Informe seu E-mail: </label>
                            <input type="text" name="email" required placeholder="Insira seu E-mail">
                        </div>
                        <div class="row">
                            <label for="psw">Cadastre uma senha: </label>
                            <input type="password" name="psw" id="psw" required placeholder="Cadastre sua senha">
                        </div>
                        <div class="row">
                            <label for="cpsw">Confirme sua senha: </label>
                            <input type="password" name="cpsw" id="cpsw" required placeholder="Confirme sua senha">
                        </div>
                        <button type="submit">Cadastrar-se</button>
                    </div>
                    <button type="button"><a href="login.php">Voltar</a></button>
            </form>
        </div>

</body>
</html>

<?php
    include('conn.php'); //Inclui a conex??o a esta p??gina
    include_once('../header/header.php');
    //Verifica se existe post do usu??rio com so dados solicitados
    if(isset($_POST['name']) || isset($_POST['cpf']) || isset($_POST['nasc']) || isset($_POST['email']) || isset($_POST['psw']) || isset($_POST['cpsw'])){

            //Pega o $_POST[''] do usu??rio e insere em uma vari??vel
            $nome = $_POST['name']; 
            $CPF = $_POST['cpf'];
            $data = $_POST['nasc'];
            $nascimento = implode("-", array_reverse(explode('/',$data)));
            $email = $_POST['email'];
            $senha = $_POST['psw'];
            $Confsenha = $_POST['cpsw'];
            
            $codificada = hash('sha512',$senha); //Criptografa a senha

            $pegaCPF = "SELECT cpf FROM cliente WHERE cpf = '$CPF'"; //Query que pega cpf do banco
            $pegaEmail = "SELECT email FROM cliente WHERE email = '$email'"; //Query que pega email do banco


            $resultCPF = mysqli_query($strcon, $pegaCPF); //Faz a consulta no banco
            $resultEmail = mysqli_query($strcon, $pegaEmail); //Faz a consulta no banco

            if(mysqli_num_rows($resultCPF) == 1){ //Se j?? existir CPF digitado gera mensagem de erro
                echo "<script>window.alert('CPF j?? cadastrado!');</script>";
                exit();
            }elseif(mysqli_num_rows($resultEmail) == 1){ //Se existir e-mail digitado no banco gera mensagem de erro
                echo "<script>window.alert('Este e-mail j?? est?? cadastrado!');</script>";
                exit();
            }elseif($senha != $Confsenha){ //Se as senhas digitados forem diferentes gera mensagem de erro
                echo "<script>window.alert('Por favor insira senhas iguais!');</script>";
            }else{
                //Se passar por todos as valida????es insere os dados no banco
                $cad = "INSERT INTO cliente VALUES (DEFAULT,'$nome','$CPF','$nascimento','$email','$codificada')";
                
                //Conecta ao banco e insere os dados
                $insere = mysqli_query($strcon, $cad) or die("N??o foi possivel cadastrar-se!");
                
                echo "<script>window.alert('Cadastro realizado com sucesso. Bem vindo ".$nome."');</script>";
                echo "<script>window.location = 'loginCliente.php';</script>";
            }
        }
?>


<script>

//Fun????o para mostrar datas ao usu??rio
$(function() {
    $("#calendario").datepicker({
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        maxDate: new Date(),
        minDate: new Date(1980, 12, 31),
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Ter??a','Quarta','Quinta','Sexta','S??bado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S??b','Dom'],
        monthNames: ['Janeiro','Fevereiro','Mar??o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});

</script>