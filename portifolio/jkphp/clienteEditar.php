<body>
	<!-- alinhando o nome do login no centro da tel -->
	<div align="center">
		<!-- abre php -->
		<?php 
			// chamando o navbar
			include("nav.php");
			
		?>
		<hr>
	</div>
	<?php
	   //Conecta ao banco de dados
	    include("conecta.php");
	    //crio uma variavel para pegar  o id do botao clicado
	    $idcliente = $_GET['editar'];
	    // faço uma consuta no banco de dados para pegar todas as informações referente ao ID
	    $sql = "SELECT * from clientes WHERE id = '$idcliente'";
	    // faço conexão com o banco, e coloco dentro de um array para pegar todas as informações e atribuo as informações para variaveis para facilitar.
	    $query = $conn->query($sql);
	    while ($dados = $query->fetch_assoc()) {
	    	$id = $dados['id'];
	    	$nome = $dados['nome'];
	    	$celular = $dados['celular'];
	    	$data_cadastro = $dados['data_cadastro'];
	    }
	    
	?>
	<div class=" container">
			<div class="row">
				<div class="col-2"></div>
					<div class="col-8"> 
						<form method="POST" action="atualizarCliente.php">
						  <div class="form-group">
						    <label for="nome">Nome do Cliente</label>
						    <input type="text" name ="nome" value="<?php echo $nome;  ?>" class="form-control" id="nome" placeholder="Digite seu nome " required>
						  </div>
						  <div class="form-group">
						    <label for="celular">Celular de Contato</label>
						    <input type="text"  name ="celular"  value="<?php echo $celular ; ?>" class="form-control" id="celular" placeholder="Digite somente o numero : EX (XX)X XXXX-XXXX" required pattern="[0-9]{11}">
						  </div>
						  <div class="form-group">
						    <label for="data_cadastro">Data do Cadastro Modificação</label>
						    <input type="date" name ="data_cadastro" value="<?php echo $data_cadastro; ?>" class="form-control" id="data_cadastro" required  >
						  </div>
						  <button type="submit" name = "atualizar_id" value="<?php echo $id;  ?>" class="btn btn-success">Atualizar</button>
						  <button type="submit" name="cancelar" class="btn btn-danger">Cancelar</button>
						</form>
					</div>
					<div class="col-2"></div>
			</div>
		</div>
</body>
<!-- abro o php para chamar o rodapé -->
  <?php
  	include('footer.html');
  ?>