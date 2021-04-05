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
						<label for="nome_pesquisa">Nome dos Cliente Agendados</label><br>
						<select name="nome_agendamento">
							<option>Selecione Cliente</option>
							<?php
								// conecta com o banco
								include("conecta.php");
								//faco uma query pra selecionar tudo que esta na tabela locacao.
								$buscar = "SELECT * FROM locacao";
								//variavel $resultdo se  comunica com o banco e pega os dados
								$resultado = $conn->query($buscar);
								//se a variavel resultado atribuir linha 
								if($resultado->num_rows > 0){
									// faço um laço de repeticao e coloco num fetch_array para mostrar os dados e a tag option para mostrar o tanto de opcoes que tiver enquanto houver dados
									while($registro = $resultado->fetch_array()){
										//pego o numero do ID atravez do value para manipular o os dados.
										echo '<option value ="'.$registro['id'].'">'.$registro['nome']. '</option>';
									}
								}
							?>			
						</select>
						<br><br>
						<button type="submit" class="btn btn-info" name='pesquisar' >Pesquisar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<hr>
	<?php
		// se clicar no botao pesquisar, vai abrir o html.
		if(isset($_GET['pesquisar'])){
			// conecta com o banco.
			include("conecta.php");
			//faco uma query pra pegar da tabela produto o atributo especifico , que no caso aqui e venda com o numero do id 14 que e onde foir cadastrado o litro do hopp colonia.
			$operacao =mysqli_query($conn, "SELECT venda FROM produtos WHERE id ='14'") or die (mysqli_error($conn));
			//se a variavel operacao criar linha no banco...
			if($operacao->num_rows > 0)
			{
				//coloco o resultado da pesquisa dentro da variavel mostrar 
				while ($mostrar = $operacao->fetch_array()) {
						// atraves da variavel valor peguei a busca desejada.
						$valor_litro = $mostrar['venda'];
						
				}
			}
			// crio uma vairavel e pego o id atraves do value clicado no nome.
			$idbusca = $_GET['nome_agendamento'];
			// faco uma query que seleciona tudo do banco referente a variavel $idbusca
			$mostrar = "SELECT * FROM locacao WHERE id ='$idbusca'";
			// crio a variavel resultado e conecto com o banco
			$resultado = $conn->query($mostrar);
			// se a variavel resultado criar linha no banco.....
			if($resultado->num_rows > 0)
			{
				// coloco o resultado da pesquisa dentro da variavel registro para poder manipular onde eu quiser.
				while($registro = $resultado->fetch_array())
				{
					// aqui uso uma variavel para pegar a quantidade de litro
					$litro = $registro['qtd_litro'];
					//aqui uso uma variavel pra pegar a quantidade em consignado
					$consignado = $registro['consignado'];
					//aqui crio uma variavel que vai pegar a quantiade de litro da locacao e tambem caso ele tenha litro consignado e multiplicar com a variavel valor(que e o preco do litro do chopp).
					$preco = ($litro + $consignado)* $valor_litro;
					// crio uma variavel para formatar o numero na moeda nossa(real)
					$formatar = number_format($preco,2,',','.'); 
					// coloquei dentro de uma variavel global para poder passar para poder usar em qualquer lugar do projeto.
					$_SESSION['valor'] = $formatar;

					echo '<div class=" container">
					<div class="row">
						<div class="col-2"></div>
						<div class="col-8"> 
							<form method="GET" action ="'.$_SERVER['HTTP_REFERER'].'" >
								<div class="form-group">
									<label for="nome">Nome do Cliente</label>
									<input type="text" name="nome" class="form-control" id="nome"   value=" '.$registro['nome'].'" disabled> 
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<label for="celular">Celular de Contato</label>
											<input type="text"  name ="celular" class="form-control" id="celular" value ="'.$registro['celular'].'" disabled>
										</div>
										<div class="col-6">
											<label for="celular2">Celular de Contato 2</label>
											<input type="text"  name ="celular2" class="form-control" id="celular2" value="'.$registro['celular2'].'" disabled>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="endereco">Endereco</label>
									<input type="text" name ="endereco" class="form-control" id="endereco" value="'.$registro['endereco'].'"  disabled>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-8">
											<label for="bairro">Bairro</label>
											<input type="text" name ="bairro" class="form-control" id="bairro" value="'.$registro['bairro'].'" disabled>
										</div>
										<div class="col-4">
											<label for="numero">Numero</label>
											<input type="text" name="numero" class="form-control" id="numero" value="'.$registro['numero'].'" disabled>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<label for="data_entrega">Data da Entrega</label>
											<input type="date" name ="data_entrega" class="form-control" id="data_entrega" value="'.$registro['data_entrega'].'" disabled> 
										</div>  
										<div class="col-6"> 
											<label for="data_retirada">Data da Retirada</label>
											<input type="date" name ="data_retirada" class="form-control" id="data_retirada" value="'.$registro['data_retirada'].'" disabled >
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<label for="qtdlitro">Quantidade de Litro</label>
											<input type="text" name="qtdlitro" class="form-control" id="qtdlitro" value="'.$registro['qtd_litro'].'" disabled>
										</div>  
										<div class="col-6"> 
											<label for="consignacao">Consignação</label>
											<input type="text" name ="consignacao" class="form-control" id="consignacao"  value="'.$registro['consignado'].'" disabled>
										</div>
									</div>
								</div>
								<!-- coloquei a variavel formatar para colocar no formato do real -->
								<div class="form-group">
									<div class="row"> 
										<div class="col-6">
											<label for="valor_locacao">Valor da Locação</label>
											<!-- deixei dislab o input para nao poder ser alterado -->
											<input type="text" name ="valor_locacao" class="form-control" id="valor_locacao" value= "'.$formatar.'" disabled>
										</div>
										<div class="col-6">
											<label for="valor_litro">Valor do Litro</label>
											<!-- deixei dislab o input para nao poder ser alterado -->
											<input type="text" name ="valor_litro" class="form-control" id="valor_litro"  value= "'.$valor_litro.'"disabled>
										</div>

									</div>
								</div> 
								<!-- coloquei o (...) para aparecer as informacoes, pois no textarea nao atribui value. -->
								<div class="form-group"> 
									<label for="observacao">Observação</label>
									<textarea name="observacao" id="observacao" rows="5" cols="102" (...) disabled>' .$registro['observacao'].'</textarea>
								</div>
								<a href="locacaoEditar.php?editar='.$registro['id'].'"<button type="submit" class="btn btn-success" >Editar</button></a>
								<a href="locacaoFinalizar.php?finalizar='.$registro['id'].'"<button type="submit" class="btn btn-primary">Finalizar</button></a>
								<a href="locacaoExcluir.php?excluir='.$registro['id'].'"<button type="submit" class="btn btn-danger">Excluir</button></a>
							</form>
						</div>
						<div class="col-2"></div>
					</div>
					</div>';	
				
					
				}
			}
				
		}
	?>	
</body>
<!-- abro o php para chamar o rodapé -->
<?php
	include('footer.html');

?>