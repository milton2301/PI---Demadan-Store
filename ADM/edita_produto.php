<?php
include("conexao.php");
include('validaADM.php');

$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT);
$tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_SANITIZE_STRING);
$cor = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);
$fornecedor = filter_input(INPUT_POST, 'id_fornecedor', FILTER_SANITIZE_NUMBER_INT);


$result_produto = $strcon->query("UPDATE produto SET codigo='$codigo', nome='$nome', valor='$valor', tamanho='$tamanho', cor='$cor', marca='$marca', id_fornecedor='$fornecedor' WHERE nome='$nome'");
$resultado_produto = mysqli_query($strcon, $result_produto);

if(mysqli_affected_rows($strcon)){
	echo "<script>window.alert('Produto alterado com sucesso!');</script>";
    echo "<script>window.location = 'edita.php';</script>";
}else{
	echo "<script>window.alert('Falha ao alterar produto!');</script>";
    echo "<script>window.location = 'edita.php';</script>";

}