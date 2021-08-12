<?php
include('conexao.php');

if(empty($_POST['admin']) || empty($_POST['senha'])){
    echo "<script>window.alert('Login ou Senha não preenchido!')</script>";
    echo "<script>window.location = 'loginAdmin.php'</script>";
    exit();
}

$login = mysqli_real_escape_string($strcon, $_POST['admin']);
$senha = mysqli_real_escape_string($strcon, $_POST['senha']);

$senhaCod = hash('sha512', $senha);

$query = "SELECT login FROM admin WHERE login = '{$login}' and senha ='{$senhaCod}' LIMIT 1";

$result= mysqli_query($strcon, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    session_start();
    $_SESSION['admin'] = $login;
    header('Location: pagina.php');
    exit();
}else{
    echo "<script>window.alert('Usuário ou Senha inexistente!');</script>";
    echo "<script type='text/javascript'>window.location = 'loginAdmin.php'</script>";
    exit();
}


?>