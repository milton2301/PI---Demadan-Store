<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações da conta</title>
<style>
body{
    font-family: candara, arial, helvetica;
    text-align: center;
    background-image: linear-gradient(to right, #fff6e1, #ffc637);
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
    width: 70%;
}

input{
    background-color: whitesmoke;
    text-align: center;
    font-size: 80%;
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
    <h1>Exclusão de contas</h1>
        <form action="deleta.php" method="post">
            <div>
            <label for="motivo">Qual motivo da exclusão da conta</label>
            <input type="text" name="motivo" placeholder="Insira seu motivo aqui" limit="255">
            </div>
            <div>
                <label for="senha">Informe sua senha</label>
                <input type="text" name="senha" placeholder="Insira sua senha" required>
            </div>
            <div>
                <label for="confSenha">Confirme sua senha</label>
                <input type="text" name="confSenha" placeholder="Confirme sua senha" required>
            </div>
            <div>
                <button type="submit">Excluir</button>
            </div>
            <div>
                <button><a href="index.php">Voltar</a></button>
            </div>
        </form>
    </div>

</body>
</html>
<?php
    include('validaCliente.php');
    include('../header/header.php');
    include('conn.php');
    
if(isset($_POST['senha']) && $_POST['confSenha']){
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $confSenha = filter_input(INPUT_POST, 'confSenha', FILTER_SANITIZE_STRING);

    $senhaCod = hash('sha512', $senha);

    $user = $_SESSION['user'];

    if(isset($_POST['senha']) != isset($_POST['confSenha'])){
        echo "<script>window.alert('As senhas digitas não conferem!');</script>";
    }else{
        
        $exlui = "DELETE FROM cliente WHERE email='$user' and senha='$senhaCod'";

        $deleta = mysqli_query($strcon, $exlui) or die ("Erro ao deltar conta!");

        session_destroy();
        echo "<script>window.alert('Usuário ecluido com sucesso!');</script>";
        echo "<script>window.location ='cadastro.php';</script>";
    }   
}
?>
