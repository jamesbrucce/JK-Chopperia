<?php 
	// abrir uma sessao
	session_start();	
	// conecta com o banco
	include("conecta.php");
	// recebe os dados passado do forms atraves de POST
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	// se usuario ou senha estiver em branco mostra mensagem e fecha conexao com o banco
	if ( $usuario == "" || $senha == ""){
		echo ("<script>alert('Usuário ou senha em branco!');</script>");
        echo ("<script>location.href='index.html';</script>");
        mysqli_close($conn);
	}
	// se existir no banco de dados o usuario e senha digitado ele se conectara e ira para a pagina home.php
	$logar = mysqli_query($conn, "SELECT * FROM usuario WHERE usuario ='$usuario' AND senha ='$senha'") or die("Erro ao selecionar");
	if(mysqli_num_rows($logar) > 0){
		$_SESSION['user'] = $_POST['usuario'];
		echo ("<script>location.href='home.php';</script>");
	}
	// se nao , mostrara mensagem , ira para a pagina index.html e fechara comunicacao com o banco
	else {
        echo ("<script>alert('Usuário ou senha incorretos! Tente novamente.');</script>");
        echo ("<script>location.href='index.html';</script>");
    }
    mysqli_close($conn);



?>