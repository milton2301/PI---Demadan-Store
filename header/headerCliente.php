<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>Demadan Store</title>       
        <link rel="stylesheet" type="text/css" href="estilo.css">
        
        <script src="script.js"></script>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="shortcut icon" href="../logo/apim.png" type="image/x-icon">
        <style>
body{
    max-width: 100%;
    margin: 0 auto;
    /*background-color:ffffff;*/

}

.header{
    position:fixed;
    top:0;
    width: 100%;
    height: 130px;
    margin-top: 0;
    margin: 0;
    /*background-color: #282524;*/
    background-image: linear-gradient(to right, #fff6e1, #ffc637);
    /*background-color: rgba(255, 255, 255, 5);*/
    
}
.ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;

}


.ul > li{
    float: left;
}

.logo{
    padding: 30px 0px 0px 5px;
    height: 90px;
}
.logoim{
    padding: 10px 0px 0px 5px;
    margin-top: 23%;
}

.configura{
    position: absolute;
    overflow: hidden;
    margin-top: 4%;
    /*margin-left: 20px;*/
    right: 3%;
}

.fv{
    position: absolute;
    margin-top: 3%;
    padding-top: 1%;
    right: 20%;

}

.icfm{
    position: absolute;
    padding-top: 20px;
    right: 170px; 
}

.ul img:hover{
    transform: scale(1.1);
}

.pesq > input[type=text] {
margin-left: 20%;
position: relative;
margin-top: 20%;
width: 200%;
box-sizing: border-box;
border: 1px solid #ccc;
border-radius: 4px;
font-size: 16px;
background-color: white;
background-position: 12px 10px; 
background-repeat: no-repeat;
padding: 10px 20px 10px 20px;
-webkit-transition: width 0.4s ease-in-out;
transition: width 0.4s ease-in-out;

}


</style>

</head>

<body>
    <header class="menu-principal">
        <div class="header">
            <ul class="ul">
                <li><img class="logo" src="../logo/aplg.png" width="300px" height="100px" alt="Foto de fundo" style="max-width: 100%;"></li>
                <li><img class="logoim" src="../Logo/apim.png" width="60px" height="60px" alt="Foto de fundo" style="max-width: 100%;"></li>
                <li><form class="pesq">
                        <input type="text" name="pesq" placeholder="Buscar:">
                    </form></li>
                <li><a href="../CLIENTE/login.php"><img class="fv" src="../logo/iconefeminino.png" width="5%" height="50%" alt="icone feminino" style="max-width: 100%"></a></li> 
                <li><a href="../CLIENTE/deleta.php"><img class="configura" src="../Logo/configura.png" width="4%" heigth="4%"style="max-width: 100%;"></a></li>
            <!--<li><a href=""><img class="fv" src="../logo/fv.png" width="35px" heigth="30px" style="max-width: 100%"></  a></li>
            <li><a href=""><img class="carrinho" src="../Logo/carrinho.png" width="70px" heigth="70px"style="max-width: 100%;"></a></li>-->
            </ul>
        </div>
    </header>      
</body>
</html>