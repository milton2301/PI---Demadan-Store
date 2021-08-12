<?php
session_start();
include('../header/header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel de Administração</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
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
            margin-top: 100px;
        }

        .dados{
            margin: 15px;
            font-size: 20px ;
        }

        label{
        display: inline-block;
        width: 50%;
        font-size: 200%;
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
            color: white;
        }
        
    </style>
</head>
<body>
    <section class="hero is-success is-fullheight">
                    <h1>Sistema de Login</h1>
                    <h1>Administrador</h1>
                    <div class="container">
                        <div>
                            <img src="../imagens/avatar.png" alt="imagem" style="width: 20%;">
                        </div>
                        <form action="login.php" method="POST">
                            <div>
                                <label for="admin">Insira seu login</label>
                                <input name="admin" placeholder="Seu usuário" required>
                            </div>
                            <div>
                                <label for="senha">Insera sua senha</label>
                                <input name="senha"  type="password" placeholder="Sua senha" required>
                        </div>
                    <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
                </form>
            </div>
    </section>
</body>
</html>