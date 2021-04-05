<?php
	//Conecta ao banco de dados
	include("conecta.php");
	//crio uma variavel para pegar  o id do botao clicado
	$idcliente = $_GET['excluir'];
	// faço uma query de excluir tudo do banco rederente ao id que foi pego.
	$apagar= mysqli_query($conn,"DELETE FROM clientes WHERE id='$idcliente'") or die(mysqli_error($conn));

	echo ("<script>alert('Cadastro de Cliente Apagado com sucesso.');</script>");
	echo ("<script>location.href='cadastroCliente.php';</script>");

?>