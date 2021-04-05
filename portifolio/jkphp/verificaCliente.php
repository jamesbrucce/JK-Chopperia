<?php
//abre uma sessao;
session_start();
//conecta com o banco
include("conecta.php");
// recebe os dados passado do forms atraves de POST
$nome = $_POST['nome'];
$celular = $_POST['celular'];
$data_cadastro = $_POST['data_cadastro'];
//puxa o usuario atraves da SESSION la da pagina login.php para inserir que esta logado na pagina.
$user = $_SESSION['user'];

// criar uma query para inserir cadastro do cliente no banco.
$cadastro =mysqli_query($conn,"INSERT INTO clientes (nome,celular,data_cadastro,usuario_fk) VALUES ('$nome','$celular','$data_cadastro','$user')") or die(mysqli_error($conn));
	//escreve atraves do echo
	echo ("<script>alert('Cadastro de Cliente realizado com sucesso.');</script>");
	echo ("<script>location.href='cadastroCliente.php';</script>");
	//fecha comunicacao com o banco.
	mysqli_close($conn);


?>
