<?php
//abro uma sessao por causa do user
session_start();
//conecta com o banco
include("conecta.php");
// se clicar no botao de atualizar vai executar os script que esta dentro do if
if(isset($_POST['atualizar_id'])){
	// recebe os dados passado do forms atraves de POST de clienteEditar.php
	$idcliente = $_POST['atualizar_id'];
	$nome = $_POST['nome'];
	$celular = $_POST['celular'];
	$data_cadastro = $_POST['data_cadastro'];
	//pego o usuario que esta logado para poder colocar quem fez a ultima alteração no banco.
	$user = $_SESSION['user'];
	
	//query que conecta com o banco e atualiza a tabela de acordo com o id que necessita ser editado.
	$atualizar = mysqli_query($conn,"UPDATE clientes SET nome ='$nome', celular ='$celular', data_cadastro = '$data_cadastro', usuario_fk ='$user' WHERE id = '$idcliente'") or die(mysqli_error($conn));

	echo ("<script>alert('Cadastro de Cliente Atualizado com sucesso.');</script>");
	echo ("<script>location.href='cadastroCliente.php';</script>");
	//fecha comunicacao com o banco.
	mysqli_close($conn);
}
// se clilcar no botao cancelar vai voltar para a pagina cadastroCliente.php
if(isset($_POST['cancelar'])){
	echo ("<script>location.href='cadastroCliente.php';</script>");
}
?>