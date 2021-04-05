<?php
//abro uma sessao por causa do usuario
session_start();
//conecta com o banco
include("conecta.php");
// se clicar no botao de atualizar vai executar os script que esta dentro do if
if(isset($_POST['atualizar_idproduto'])){
	// recebe os dados passado do forms atraves de POST de produtoEditar.php
	$idproduto = $_POST['atualizar_idproduto'];
	$nome = $_POST['nome'];
	$categoria = $_POST['categoria'];
	$custo = $_POST['custo'];
	$venda = $_POST['valor_venda'];
	$estoque = $_POST['estoque'];
	// pego o usuario que esta logado para poder colocar quem fez a ultima alteração no banco.
	$user = $_SESSION['user'];

	//query que conecta com o banco e atualiza a tabela de acordo com o id que necessita ser editado.
	$atualizar = mysqli_query($conn,"UPDATE produtos SET nome ='$nome', categoria ='$categoria', custo = '$custo', venda ='$venda', estoque ='$estoque',usuario_fk ='$user' WHERE id = '$idproduto'") or die(mysqli_error($conn));

	echo ("<script>alert('Cadastro de Produto Atualizado com sucesso.');</script>");
	echo ("<script>location.href='cadastroProduto.php';</script>");
	//fecha comunicacao com o banco.
	mysqli_close($conn);
}

if(isset($_POST['cancelar'])){
	echo ("<script>location.href='cadastroProduto.php';</script>");
}






?>