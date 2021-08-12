<?php 
  session_start();
  include('../header/header.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache" />
  <title>Login</title>
  <style>
    body {
      font-family: candara, arial, helvetica;
      text-align: center;
      background-image: linear-gradient(to right, #fff6e1, #ffc637);
      margin-top: 11%;
    }

    .container {
      border: 1px solid;
      border-radius: 10px;
      margin-left: 10%;
      margin-right: 10%;
    }

    .dados {
      margin: 15px;
      font-size: 20px;
    }

    label {
      font-size: 18px;
      display: inline-block;
      width: 50%;
    }

    input {
      background-color: whitesmoke;
      text-align: center;
      font-size: 100%;
      height: 5% !important;
      width: 80% !important;
      border: 1px solid;
      border-radius: 0px !important;
    }

    button {
      background-color: #f58f51;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 20%;
      border-radius: 20px;
    }

    a {
      text-decoration: none;
      color: white;
    }
  </style>
  </head>

  <body>

    <h1>Login</h1>

    <div class="container">

      <form action="loginCliente.php" method="POST">
        <div>
          <img src="../imagens/avatar.png" alt="Avatar" style="width: 30%;">
        </div>
        <div>
          <label for="user"><b>E-mail para login</b></label>
          <input type="text" placeholder="E-mail de login" name="user" required>
        </div>
        <div>
          <label for="psw"><b>Senha</b></label>
          <input type="password" placeholder="Senha de acesso" name="psw" required>
        </div>
        <div>
          <button type="submit">Logar</button>
        </div>
      </form>
      <div>
        <button><a href="senha.php">Esqueci minha senha</a></button>
        <button><a href="cadastro.php">Cadastrar-se</a></button>
      </div>
    </div>
  </body>

</html>