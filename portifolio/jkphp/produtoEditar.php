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
	    $idproduto = $_GET['editar'];
	    // faço uma consuta no banco de dados para pegar todas as informações referente ao ID
	    $sql = "SELECT * from produtos WHERE id = '$idproduto'";
	    // faço conexão com o banco, e coloco dentro de um array para pegar todas as informações e atribuo as informações para variaveis para facilitar.
	    $query = $conn->query($sql);
	    while ($dados = $query->fetch_assoc()) {
	    	$id = $dados['id'];
	    	$nome = $dados['nome'];
	    	$categoria = $dados['categoria'];
	    	$custo = $dados['custo'];
	    	$venda = $dados['venda'];
	    	$estoque = $dados['estoque'];
	    }
	    
	?>
	<div class=" container">
		<div class="row">
			<div class="col-2"></div>
				<div class="col-8"> 
					<form method="POST" action="atualizarProduto.php">
					  <div class="form-group">
					    <label for="nome">Nome do Produto</label>
					    <input type="text" name ="nome"  value="<?php echo $nome;  ?>"class="form-control" id="nome" placeholder="Digite nome do produto " required>
					  </div>
					  <div class="form-group">
					    <label for="categoria">Categoria:</label><br>
					    <select name="categoria">
					    	<option></option>
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
					    <input type="text" name ="custo"  value="<?php echo $custo;  ?>"class="form-control" id="custo" required placeholder="Digite o valor com ponto" >
					  </div>
					  <div class="form-group">
					    <label for="valor_venda">Valor de Venda do Produto</label>
					    <input type="text" name ="valor_venda"   value="<?php echo $venda; ?>"class="form-control" id="valor_venda" required  placeholder="Digite o valor com ponto">
					  </div>
					  <div class="form-group">
					    <label for="estoque">Quantidade em Estoque</label>
					    <input type="text" name ="estoque"  value="<?php echo $estoque;  ?>"class="form-control" id="estoque" required  placeholder="Digite a quantidade em estoque">
					  </div>
					  <button type="submit" name="atualizar_idproduto" value="<?php echo $id;  ?>"  class="btn btn-success">Atualizar</button>
					  <button type="submit" name="cancelar"  class="btn btn-danger">Cancelar</button>
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