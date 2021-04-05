<?php

	//abro uma sessao por causa do usuario
	session_start();
	//conecta com o banco
	include("conecta.php");
	// crio uma variavel idfinalizar para pegar o id do botao clicado.
	$idfinalizar = $_GET['finalizar'];

	// faço uma consuta no banco de dados para pegar todas as informações referente ao ID
	$sql = "SELECT * from locacao WHERE id = '$idfinalizar'";
	// faço conexão com o banco, e coloco dentro de um array para pegar todas as informações e atribuo as informações para variaveis para facilitar.
	$query = $conn->query($sql);
	while ($dados = $query->fetch_assoc()) {
	    	$id = $dados['id'];
	    	$nome = $dados['nome'];
	    	$celular= $dados['celular'];
	    	$celular2 = $dados['celular2'];
	    	$endereco = $dados['endereco'];
	    	$bairro = $dados ['bairro'];
	    	$numero = $dados['numero'];
	    	$data_entrega = $dados['data_entrega'];
	    	$data_retirada = $dados['data_retirada'];
	    	$qtd_litro = $dados['qtd_litro'];
	    	$consignado = $dados['consignado'];
	    	$obs = $dados['observacao'];
	}

	//puxa o usuario atraves da SESSION la da pagina login.php para inserir que esta logado na pagina.
	$user = $_SESSION['user'];
	// puxo o valor da locacao atraves da SESSION da pagina agendamentoRealizado.php para inserir no banco.
	$valor = $_SESSION['valor'];

	//crio uma query que inseri os dados na tabela locacao_realizada.
	$cadastro = mysqli_query($conn,"INSERT INTO locacao_realizada (nome,celular,celular2,endereco,bairro,numero,data_entrega,data_retirada,qtd_litro,consignado,valor,observacao,usuario_fk) VALUES('$nome','$celular','$celular2','$endereco','$bairro','$numero','$data_entrega','$data_retirada','$qtd_litro','$consignado','$valor','$obs','$user')  ") or die(mysqli_error($conn));
	// crio uma query que deleta da tabela locacao cujo o id e recebido atraves do cliente selecionado(idfinalizar).
	$deletar = mysqli_query($conn,"DELETE FROM locacao WHERE id = '$idfinalizar'") or die(mysqli_error($conn));
	//escreve atraves do echo e cria uma janela atraves do comando java .
	echo ("<script>alert('Finalização realizada com sucesso.');</script>");
	// e recdireciona para agendamentoRealizado.php
	echo ("<script>location.href='agendamentoRealizado.php';</script>");
	//fecha comunicacao com o banco.
	mysqli_close($conn);


 ?>

 