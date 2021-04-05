<?php  
	// abrir uma sessao
	session_start();
	//conectar com o banco
	include("conecta.php");
	//pega os dados recebidos por post
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	// faz a verificacao no banco de dados para ver se ja tem usuario cadastro
	$verifica1 = mysqli_query($conn ,"SELECT * FROM usuario WHERE usuario = '$usuario' ") or die(mysqli_error($conn));
	// se tiver vai gerar linha 
	if (mysqli_num_rows($verifica1) > 0){
		//faz verificacao se a senha e igual
		$verifica2 = mysqli_query($conn,"SELECT * FROM usuario WHERE senha = '$senha'") or die(mysqli_error($conn));
		// se tiver ira gerar linha
		if(mysqli_num_rows($verifica2) > 0){
			// mostrara notificacao, ira para a pagina novoUsuario e fechara comunicacao
			echo ("<script>alert('Já existente no Banco de Dados usuário e senha!');</script>");
	        echo ("<script>location.href='novoUsuario.html';</script>");
	        mysqli_close($conn);
		}
		// se senha nao gerar linha, vai iserir o usuario como nome igual, mais senha tem que ser diferente.
		else{
				// comando para inserir usuario novo
				$cadastrar ="INSERT INTO usuario (usuario,senha) VALUES ('$usuario','$senha')";
				// se  conectar com o banco , fara o cadastro do novo usuario e mostrar mensagem.
				$novoUsuario = mysqli_query($conn,$cadastrar);
					echo ("<script>alert('Cadastro realizado com sucesso.');</script>");
					echo ("<script>location.href='index.html';</script>");
				mysqli_close($conn);
		}
	}
	// se usuario for diferente de qualquer nome que tenha no banco ele insere mesmo tendo a senha de outro usuario igual.
	else{
		// crio a variavel de insert
		$cadastrar ="INSERT INTO usuario (usuario,senha) VALUES ('$usuario','$senha')";
		// se  conectar com o banco , fara o cadastro do novo usuario e mostrar mensagem.
		$novoUsuario = mysqli_query($conn,$cadastrar);
			echo ("<script>alert('Cadastro realizado com sucesso.');</script>");
			echo ("<script>location.href='index.html';</script>");
		//fecha comunicacao com banco.
		mysqli_close($conn);
	}
	
?>