<?php
	//Conecta ao banco de dados
	include("conecta.php");
	//crio uma variavel para pegar  o id do botao clicado
	$idproduto = $_GET['excluir'];
	// faço uma query de excluir tudo do banco rederente ao id que foi pego.
	$apagar= mysqli_query($conn,"DELETE FROM produtos WHERE id='$idproduto'") or die(mysqli_error($conn));

	echo ("<script>alert('Cadastro de Produto Apagado com sucesso.');</script>");
	echo ("<script>location.href='cadastroProduto.php';</script>");

?>