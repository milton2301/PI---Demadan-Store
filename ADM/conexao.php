<?php 

define('HOST','localhost'); //Local da banco
define('USER','root'); //Nome do usuário
define('PASSWORD',''); //Senha do usuário (Root por padrão vazio)
define('BASE','demadanstore'); //Nome do banco

//Link de conexao com banco de dados
$strcon = mysqli_connect(HOST, USER, PASSWORD, BASE) or die ("Falha ao conectar-se ao banco!");


?>