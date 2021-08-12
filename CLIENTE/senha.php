<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../logo/apim.png" type="image/x-icon">
    <title>Esqueci minha senha</title>
    <style>

        body {
            font-family: candara, arial, helvetica;
            text-align: center;
            background-image: linear-gradient(to right, #fff6e1, #ffc637);
            margin-top: 5%;
        }

        .container{
            border: 1px solid;
            border-radius: 10px;
            margin-left: 10%;
            margin-right: 10%;
            margin-top: 10%;
        }

        label{
        font-size: 100%;
        display: inline-block;
        width: 50%;
        }

        input{
            background-color: whitesmoke;
            text-align: center;
            font-size: 70%;
            height: 5% !important;
            width:90% !important;
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
        <div class="container">
        <h2>Recuperação de senha</h2>
        <h3>Insira seus dados para recuperar sua senha</h3>
          <form action="senha.php" method="POST">
                <div>
                    <label for="cpf">Insira seu CPF:</label>
                    <input type="text" name="cpf" placeholder="Digite seu CPF aqui" required>
                </div>
                <div>
                    <label for="email">Insira seu E-mail</label>
                    <input type="text" name="email" placeholder="Insira seu e-mail cadastrado" required>
                </div>
                <div>
                    <label for="novaSenha">Digite sua nova senha</label>
                    <input type="password" name="novaSenha" placeholder="Digite sua nova senha" required>
                </div>
                <div>
                    <label for="confSenha">Confirme sua senha</label>
                    <input type="password" name="confSenha" placeholder="Confirme sua senha" required>
                </div>
                <button type="submit">Confirmar</button>
            </form>
            <button><a href="login.php">Fazer Login</a></button>
        </div>
</body>
</html>

<?php
    include('conn.php');
    include_once('../header/header.php');

if(isset($POST['cpf'])){
    echo "<script>window.alert('Preencha todos so dados!')</script>";
    }
    
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    
    $novaSenha = filter_input(INPUT_POST, 'novaSenha', FILTER_SANITIZE_STRING);
    $confSenha = filter_input(INPUT_POST, 'confSenha', FILTER_SANITIZE_STRING);
    $senhaCod = hash('sha512', $novaSenha);

    $confereCPF = "SELECT cpf FROM cliente WHERE cpf ='$cpf'";
    $confereEMAIL = "SELECT email FROM cliente WHERE email ='$email'";

    $queryCPF = mysqli_query($strcon, $confereCPF);
    $queryEMAIL = mysqli_query($strcon, $confereEMAIL);
    
    //echo "<script>window.alert('$cpf')</script>";
if(isset($_POST['cpf'])|| isset($_POST['email']) || isset($_POST['novaSenha']) || isset($_POST['confSenha'])){
    if(mysqli_num_rows($queryCPF) == 0){
        echo "<script>window.alert('CPF não cadastrado')</script>";
    }elseif(mysqli_num_rows($queryEMAIL) == 0){
        echo "<script>window.alert('E-mail não cadastrado')</script>";
    }elseif($novaSenha != $confSenha){
        echo "<script>window.alert('Por favor insira senhas iguais!');</script>";
    }else{
        $altera = "UPDATE cliente SET senha='$senhaCod' WHERE cpf='$cpf' AND email='$email'";
        $altSenha = mysqli_query($strcon, $altera) or die("Erro ao alterar senha!");
        
        echo "<script>window.alert('Senha alterada com sucesso!')</script>";
    }
}
?>