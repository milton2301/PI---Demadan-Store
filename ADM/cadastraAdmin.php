<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../logo/apim.png" type="image/x-icon">
    <title>Cadastro de administrador</title>
    <style>

        body {
            font-family: candara, arial, helvetica;
            text-align: center;
            background-image: linear-gradient(to right, #fff6e1, #ffc637);
        }

        .container{
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
        width: 50%;
        font-size: 130%;
        }

        input{
            background-color: whitesmoke;
            text-align: center;
            font-size: 18px;
            height: 30px;
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
        <h1>Bem vindo a tela de castro de administrador</h1>
        
            <form action="cadastraAdmin.php" method="POST">
                <div class="dados">
                    <label for="name">Nome </label>
                    <input name="name" type="text" placeholder="Insira seu nome completo">
                </div>
                <div class="dados">
                    <label for="login">Login </label>
                    <input name="login" type="text" placeholder="Insira um login para acessos">
                </div>
                <div class="dados">
                    <label for="email">E-mail </label>
                    <input name="email" type="emailtext" placeholder="Insira seu e-mail">
                </div>
                <div class="dados">
                    <label for="psw">Crie uma senha</label>
                    <input name="psw" type="password" placeholder="Insira uma senha">
                </div>
                <div class="dados">
                    <label for="cpsw">Confirme sua senha</label>
                    <input name="cpsw" type="password" placeholder="Confirme sua senha">
                </div>
                <div class="dados">
                    <button type="submit">Cadastrar</button>    
                </div>
            </form>
            <div>
                <button><a href="pagina.php">Voltar</a></button>
            </div>     
        </div>
</body>
</html>

<?php
    session_start();
    include('conexao.php');
    include_once('../header/header.php');

    if(isset($_POST['name']) || isset($_POST['login']) || isset($_POST['email']) || isset($_POST['psw']) || isset($_POST['cpsw'])){
        
        $nome = $_POST['name'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        $senha = $_POST['psw'];
        $confirma = $_POST['cpsw'];

        $senhaCod = hash('sha512', $senha);

        $pegaLogin = "SELECT login FROM admin WHERE login ='$login'";
        $pegaEamil = "SELECT email FROM admin WHERE email = '$email'";

        $queryLogin = mysqli_query($strcon, $pegaLogin);
        $queryEmail = mysqli_query($strcon, $pegaEamil);

        if(mysqli_num_rows($queryLogin) == 1){
            echo "<script>window.alert('Esse login já está em uso! Escolha outro por favor.');</script>";
        }elseif(mysqli_num_rows($queryEmail) == 1){
            echo "<script>window.alert('E-mail já utilizado!');</script>";
        }elseif($senha != $confirma){
            echo "<script>window.alert('As senhas que você digitou são diferentes!');</script>";
        }else{
            $cad = "INSERT INTO admin VALUES (DEFAULT,'$nome','$login','$email','$senhaCod')";

            $insere = mysqli_query($strcon, $cad) or die("Não foi possível realizar o cadastro!");

            echo "<script>window.alert('Cadastrado " .$nome." com sucesso!');</script>";   
            echo "<script>window.location = 'pagina.php';</script>";

        }
    }

?>