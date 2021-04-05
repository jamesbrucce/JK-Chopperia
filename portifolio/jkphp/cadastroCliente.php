
<body>
	<!-- alinhando o nome do login no centro da tela -->
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
					<form method="POST" action="verificaCliente.php">
					  <div class="form-group">
					    <label for="nome">Nome do Cliente</label>
					    <input type="text" name ="nome" class="form-control" id="nome" placeholder="Digite o nome " required>
					  </div>
					  <div class="form-group">
					    <label for="celular">Celular de Contato</label>
					    <input type="text"  name ="celular" class="form-control" id="celular" placeholder="Digite somente o numero : EX (XX)X XXXX-XXXX" required pattern="[0-9]{11}">
					  </div>
					  <div class="form-group">
					    <label for="data_cadastro">Data do Cadastro do Cliente</label>
					    <input type="date" name ="data_cadastro" class="form-control" id="data_cadastro" required >
					  </div>
					  <button type="submit" class="btn btn-warning">Cadastrar</button>
					</form>
				</div>
				<div class="col-2"></div>
		</div>
	</div>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-2"></div>
				<div class="col-8">
					<table class="table table-hover table-dark" >
						  <thead> 
						    <tr>
						      <th>ID</th>
						      <th>NOME</th>
						      <th>CELULAR</th>
						      <th>ULTIMO CADASTRO</th>
						      <th>USUÁRIO/CADASTROU</th>
						      <th>AÇÕES </th> 
						    </tr>
						    <?php
								// abre conexao com o banco
								include("conecta.php");
								// faco uma query pra selecionar tudo que esta na tabela clientes.
								$buscar = "SELECT * FROM clientes";
								//variavel $resultdo se  comunica com o banco e pega os dados
								$resultado = $conn->query($buscar);
								//se a variavel resultado atribuir linha 
								if($resultado->num_rows > 0){
									// faço um laço de repeticao e coloco num fetch_array para mostrar os dados
									while($registro = $resultado->fetch_array()){	    
								
							?>
						  </thead>
						    <tr>
						      <!--	 coloco os paramentos dentro da variavel $registro que desejo que mostre -->
						      <th scope="row"> <?php echo $registro['id']; ?></th>
						      <td><?php echo $registro['nome']; ?>  </td>
						      <td><?php echo $registro['celular']; ?></td>
						      <!-- coloca a funcao date para retornar o ano conforme desejado, e a funcao STRTOTIME espera que seja informada uma string contendo um formato de data em inglês US para interpreta-la. -->
						      <td><?php echo  date('d/m/Y',strtotime( $registro['data_cadastro']));?></td>
						      <td><?php echo $registro['usuario_fk']; ?></td>
						      <!-- coloco ?editar/ecluir e abro php para pegar o id que vai ser editado ou excluido  -->
						      <td><a href="clienteEditar.php?editar=<?php echo $registro["id"]; ?>"><button type="submit" class="btn btn-success"> EDITAR</button> </a></td>
						   	  <td><a href="clienteExcluir.php?excluir=<?php echo $registro["id"]; ?>"><button type="submit" class="btn btn-danger"> EXCLUIR</button></a></td> 
						    </tr> <?php } } ?>
						    <!-- Aqui abro o PHP novamente para poder fecharo o if e o while para que a tabela fique dentro do laço enquanto houver dados.   -->
					</table>
				</div>
				<div class="col-2"></div>	
		</div>			
	</div>				
</body>
<!-- abro o php para chamar o rodapé -->
  <?php
  	include('footer.html');
  ?>
