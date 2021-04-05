<?php
//abre uma sessao;
session_start();
//conecta com o banco
include("conecta.php");
// recebe os dados passado do forms atraves de POST
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$custo = $_POST['custo'];
$valor_venda = $_POST['valor_venda'];
$estoque = $_POST['estoque'];
//puxa o usuario atraves da SESSION la da pagina login.php para inserir que esta logado na pagina.
$user = $_SESSION['user'];

// criar uma query para inserir cadastro do cliente no banco.
$cadastro =mysqli_query($conn,"INSERT INTO produtos (nome,categoria,custo,venda,estoque,usuario_fk) VALUES ('$nome','$categoria','$custo','$valor_venda','$estoque','$user')") or die(mysqli_error($conn));
	//escreve atraves do echo e script cria a janela e vai para a janela desejada.
	echo ("<script>alert('Cadastro de Produto realizado com sucesso.');</script>");
	echo ("<script>location.href='cadastroProduto.php';</script>");
	//fecha comunicacao com o banco.
	mysqli_close($conn);


?>
