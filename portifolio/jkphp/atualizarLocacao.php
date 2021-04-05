<?php
//abro uma sessao por causa do usuario
session_start();
//conecta com o banco
include("conecta.php");
// se clicar no botao de atualizar vai executar os script que esta dentro do if
if(isset($_POST['atualizar_idlocacao'])){
	// recebe os dados passado do forms atraves de GET de locacaoEditar.php


	
	$idlocacao = $_POST['atualizar_idlocacao'];
	$nome = $_POST['nome'];
	$celular= $_POST['celular'];
	$celular2 = $_POST['celular2'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST ['bairro'];
	$numero = $_POST['numero'];
	$data_entrega = $_POST['data_entrega'];
	$data_retirada = $_POST['data_retirada'];
	$qtd_litro = $_POST['qtd_litro'];
	$consignado = $_POST['consignado'];
	$obs = $_POST['observacao'];
	// pego o usuario que esta logado para poder colocar quem fez a ultima alteração no banco.
	$user = $_SESSION['user'];

	//query que conecta com o banco e atualiza a tabela de acordo com o id que necessita ser editado.
	$atualizar = mysqli_query($conn,"UPDATE locacao SET nome ='$nome', celular ='$celular', celular2 = '$celular2', endereco ='$endereco', bairro ='$bairro',numero ='$numero',data_entrega ='$data_entrega',data_retirada = '$data_retirada',qtd_litro = '$qtd_litro',consignado = '$consignado', observacao = '$obs',usuario_fk ='$user' WHERE id = '$idlocacao'") or die(mysqli_error($conn));

	echo ("<script>alert('Cadastro de Locação atualizado com sucesso.');</script>");
	echo ("<script>location.href='agendamentoRealizado.php';</script>");
	//fecha comunicacao com o banco.
	mysqli_close($conn);
}
if(isset($_POST['cancelar'])){
	echo ("<script>location.href='agendamentoRealizado.php';</script>");
}








?>