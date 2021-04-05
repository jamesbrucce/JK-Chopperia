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
					<form method="POST" action="verificaProduto.php">
					  <div class="form-group">
					    <label for="nome">Nome do Produto</label>
					    <input type="text" name ="nome" class="form-control" id="nome" placeholder="Digite nome do produto " required>
					  </div>
					  <div class="form-group">
					    <label for="categoria">Categoria:</label><br>
					    <select name="categoria" required>
					    	<option ></option>
					    	<option value="bebidas">BEBIDAS</option>
					    	<option value="chips"> CHIPS</option>
					    	<option value="cigarros">CIGARROS</option>
					    	<option value="doces">DOCES</option>
					    	<option value="espetos">ESPETOS</option>
					    	<option value="refrigerantes">REFRIGERANTES</option>
					    </select>
					  </div>
					  <div class="form-group">
					    <label for="custo">Custo do Produto</label>
					    <input type="text" name ="custo" class="form-control" id="custo" required placeholder="Digite o valor com ponto" >
					  </div>
					  <div class="form-group">
					    <label for="valor_venda">Valor de Venda do Produto</label>
					    <input type="text" name ="valor_venda" class="form-control" id="valor_venda" required  placeholder="Digite o valor com ponto">
					  </div>
					  <div class="form-group">
					    <label for="estoque">Quantidade em Estoque</label>
					    <input type="text" name ="estoque" class="form-control" id="estoque" required  placeholder="Digite a quantidade em estoque">
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
						      <th>CATEGORIA</th>
						      <th>CUSTO PRODUTO</th>
						      <th>VALOR VENDA</th>
						      <th>ESTOQUE</th>
						      <th>AÇÕES </th> 
						    </tr>
						    <?php
								// abre conexao com o banco
								include("conecta.php");
								// faco uma query pra selecionar tudo que esta na tabela produtos.
								$buscar = "SELECT * FROM produtos";
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
						      <td><?php echo $registro['categoria']; ?></td>
						      <td><?php echo $registro['custo'];?></td>
						      <td><?php echo $registro['venda'];?></td>
						      <td><?php echo $registro['estoque'];?></td>   
						      <!-- coloco ?editar/excluir e abro php para pegar o id que vai ser editado ou excluido  -->
						      <td><a href="produtoEditar.php?editar=<?php echo $registro["id"]; ?>"><button type="submit" class="btn btn-success"> EDITAR</button> </a></td>
						   	  <td><a href="produtoExcluir.php?excluir=<?php echo $registro["id"]; ?>"><button type="submit" class="btn btn-danger"> EXCLUIR</button></a></td> 
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