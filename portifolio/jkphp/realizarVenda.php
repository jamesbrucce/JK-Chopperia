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
	<div class=" container">
		<div class="row">
			<div class="col-2"></div>
				<div class="col-8"> 
					<!-- coloco <?php $_SERVER['HTTP_REFERER'] ?> para mostrar na mesma pagina -->
					<form method="GET"  <?php $_SERVER['HTTP_REFERER'] ?> >
						<div class="form-group">
							<label for="cliente_cadastrado"><h6>Cliente Cadstrado? :</h6></label><br>
							<br>
							<button type="submit" class="btn btn-info" name='sim' >Sim</button>
							<button type="submit" class="btn btn-danger" name='nao' >Não</button>
						</div>
					</form>
				</div>
			<div class="col-2"></div>
		</div>
	</div>
	<hr>
	<?php
		// se o botao clicado for sim...
		if(isset($_GET['sim'])){ 
			// fecho o php para abrir depois la na frente
			?>
			<div class=" container">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-8"> 
						<!-- abro php e dps fecho novamente e mando formulario pra mesma pagina atraves do $_SERVER -->
						<form method="GET" <?php  $_SERVER['HTTP_REFERER'] ?> >
							<div class="form-group">
								<label for="nome_cliente">Nome do Cliente</label><br>
								<select name="nome_cliente">
									<option>Selecione Cliente</option> 
										<!-- abro php novamente -->
										<?php
											//conecto com o banco.
											include("conecta.php");
											// faco uma query de busca no banco
											$buscar = mysqli_query($conn,"SELECT * FROM clientes" ) or die (mysqli_error($conn));
											//se a variavel resultado atribuir linha 
											if($buscar->num_rows > 0){
												// faço um laço de repeticao e coloco num fetch_array para mostrar os dados e a tag option para mostrar o tanto de opcoes que tiver enquanto houver dados
												while($registro = $buscar->fetch_array()){
													//pego o numero do ID atravez do value para manipular o os dados.
													echo '<option value ="'.$registro['id'].'">'.$registro['nome']. '</option>' ;
												}

											}

										?> 
								</select>
								<br><br>
								<button type="submit" class="btn btn-info" name='avancar' >Avançar</button>
							</div>
						</form> 
					</div>
				</div>
			</div> 
		}
	
	<!--abre phph -->
	<?php
		// se cliclar no botao avancar..
		if(isset($_GET['avancar'])) 
		// fecha php

			//ESTA DANDO ERRO DE SINTAXE, VERIFICAR O PQ.
		{ ?>
			<div class="container">
				<div class="row">
					<div class="col-2"></div>
					<div class="col -8">
						<form>
						  <div class="row">
						  	<div class="col-6">
							    <label for="id" class="form-label">ID</label>
							    <input type="text"  name ="id" class="form-control" id="id" disabled>
							</div>
							<div class="col-6">
								<label for="nome" class="form-label">Nome</label>
								<input type="text" name="nome" class="form-control" id="nome" disabled>
							</div>
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputPassword1" class="form-label">Password</label>
						    <input type="password" class="form-control" id="exampleInputPassword1">
						  </div>
						  <button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
					<div class="col-2"></div>
					
				</div>
			</div>
	<!-- abre php -->
	<?php
		}
		if(isset($_GET['nao']))
		{
			echo "okkk";
		}

	?>
				
					
</body>
<!-- abro o php para chamar o rodapé -->
  <?php
  	include('footer.html');
  ?>