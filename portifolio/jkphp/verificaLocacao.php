<?php
//abre uma sessao;
session_start();
//conecta com o banco
include("conecta.php");
// recebe os dados passado do forms atraves de POST
$nome = $_POST['nome'];
$celular = $_POST['celular'];
$celular2 =  $_POST['celular2'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$data_entrega = $_POST['data_entrega'];
$data_retirada = $_POST['data_retirada'];
$qtdlitro = $_POST['qtdlitro'];
$consignacao = $_POST['consignacao'];
$observacao = $_POST['observacao'];

//puxa o usuario atraves da SESSION la da pagina login.php para inserir que esta logado na pagina.
$user = $_SESSION['user'];

// criar uma query para inserir dados da locacao no banco.
$dados =mysqli_query($conn,"INSERT INTO locacao (nome,celular,celular2,endereco,bairro,numero,data_entrega,data_retirada,qtd_litro,consignado,observacao,usuario_fk) VALUES ('$nome','$celular','$celular2','$endereco','$bairro','$numero','$data_entrega','$data_retirada','$qtdlitro','$consignacao','$observacao','$user')") or die(mysqli_error($conn));

	//escreve atraves do echo
	echo ("<script>alert('Agendamento de Locação realizado com sucesso.');</script>");
	echo ("<script>location.href='agendamentoLocacao.php';</script>");
	//fecha comunicacao com o banco.
	mysqli_close($conn);






?>