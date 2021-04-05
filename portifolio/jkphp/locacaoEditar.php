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
	    $idlocacao = $_GET['editar'];
	    // faço uma consuta no banco de dados para pegar todas as informações referente ao ID
	    $sql = "SELECT * from locacao WHERE id = '$idlocacao'";
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
	   	
	?>
	<div class=" container">
					<div class="row">
						<div class="col-2"></div>
						<div class="col-8"> 
							<form method="POST" action ="atualizarLocacao.php" >
								<div class="form-group">
									<label for="nome">Nome do Cliente</label>
									<input type="text" name ="nome" class="form-control" id="nome"   value="<?php echo $nome;  ?>" > 
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<label for="celular">Celular de Contato</label>
											<input type="text"  name ="celular" class="form-control" id="celular" value ="<?php echo $celular;  ?>">
										</div>
										<div class="col-6">
											<label for="celular2">Celular de Contato 2</label>
											<input type="text"  name ="celular2" class="form-control" id="celular2" value="<?php echo $celular2;  ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="endereco">Endereco</label>
									<input type="text" name ="endereco" class="form-control" id="endereco" value="<?php echo $endereco;  ?>">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-8">
											<label for="bairro">Bairro</label>
											<input type="text" name ="bairro" class="form-control" id="bairro" value="<?php echo $bairro;  ?>">
										</div>
										<div class="col-4">
											<label for="numero">Numero</label>
											<input type="text" name="numero" class="form-control" id="numero" value="<?php echo $numero;  ?>" >
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<label for="data_entrega">Data da Entrega</label>
											<input type="date" name ="data_entrega" class="form-control" id="data_entrega" value="<?php echo $data_entrega;  ?>"> 
										</div>  
										<div class="col-6"> 
											<label for="data_retirada">Data da Retirada</label>
											<input type="date" name ="data_retirada" class="form-control" id="data_retirada" value="<?php echo $data_retirada;  ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<label for="qtdlitro">Quantidade de Litro</label>
											<input type="text" name="qtd_litro" class="form-control" id="qtdlitro" value="<?php echo $qtd_litro;  ?>">
										</div>  
										<div class="col-6"> 
											<label for="consignacao">Consignação</label>
											<input type="text" name ="consignado" class="form-control" id="consignacao"  value="<?php echo $consignado;  ?>">
										</div>
									</div>
								</div>
								<!-- coloquei o (...) para aparecer as informacoes, pois no textarea nao atribui value. -->
								<div class="form-group"> 
									<label for="observacao">Observação</label>
									<textarea name="observacao" id="observacao" rows="5" cols="102" (...)> <?php echo $obs;  ?></textarea>
								</div>
								<button name ="atualizar_idlocacao" type="submit" class="btn btn-success"value="<?php echo $id;  ?>">Atualizar</button>
								<button name="cancelar" type="submit" class="btn btn-danger">Cancelar</button>
							</form>
						</div>
						<div class="col-2"></div>
					</div>
					</div>
</body>