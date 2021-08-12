<?php
    session_start();
    include('conn.php'); //Inclui conexao

    //Verifica se existe os $_POST[''] do usuário
    if(empty($_POST['user']) || empty($_POST['psw'])){
        header('Location: login.php');
        exit();
    }
    
    $login = mysqli_real_escape_string($strcon, $_POST['user']);
    $senha = mysqli_real_escape_string($strcon, $_POST['psw']);

    $senhaCod = hash('sha512',$senha);

    $query = "SELECT nome, email FROM cliente WHERE email = '{$login}' AND senha ='{$senhaCod}' LIMIT 1";
    

        $result= mysqli_query($strcon, $query);
        

        $row = mysqli_num_rows($result);
        
        if($row == 1){
            session_start();
            $_SESSION['user'] = $login;
            header('Location: index.php');
            exit();
        }else{
            echo "<script>window.alert('E-mail ou senha incorretos!');</script>";
            echo "<script>window.location = 'loginCliente.php';</script>";
            exit();
        }

    fclose($strcon);

?>