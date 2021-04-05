<?php
	//Conecta ao banco de dados
	include("conecta.php");
	//crio uma variavel para pegar  o id do botao clicado
	$idexcluir = $_GET['excluir'];
	// faço uma query de excluir tudo do banco rederente ao id que foi pego.
	$apagar= mysqli_query($conn,"DELETE FROM locacao WHERE id ='$idexcluir'") or die(mysqli_error($conn));
	// vai aparecer uma janela para dar ok e depois vai redirecionar a pagina para agendamentoRealizado.php
	echo ("<script>alert('Agendamento de Locação Apagado com sucesso.');</script>");
	echo ("<script>location.href='agendamentorealizado.php';</script>");
	// fecha comunicacao com o banco
	mysqli_close($conn);


?>