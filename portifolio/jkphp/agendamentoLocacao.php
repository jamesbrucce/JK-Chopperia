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
				<form method="POST" action="verificaLocacao.php">
					<div class="form-group">
						<label for="nome">Nome do Cliente</label>
						<input type="text" name ="nome" class="form-control" id="nome" placeholder="Digite seu nome " required>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-6">
								<label for="celular">Celular de Contato</label>
								<input type="text"  name ="celular" class="form-control" id="celular" placeholder="Digite somente o numero com DDD" required pattern="[0-9]{11}">
							</div>
							<div class="col-6">
								<label for="celular2">Celular de Contato 2</label>
								<input type="text"  name ="celular2" class="form-control" id="celular2" placeholder="Opcional" pattern="[0-9]{11}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="endereco">Endereco</label>
						<input type="text" name ="endereco" class="form-control" id="endereco" required placeholder="Digite o endereco" >
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-8">
								<label for="bairro">Bairro</label>
								<input type="text" name ="bairro" class="form-control" id="bairro" required placeholder="Digite o bairro" >
							</div>
							<div class="col-4">
								<label for="numero">Numero</label>
								<input type="text" name="numero" class="form-control" id="numero" required placeholder="EX:174">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-6">
								<label for="data_entrega">Data da Entrega</label>
								<input type="date" name ="data_entrega" class="form-control" id="data_entrega" required > 
							</div>  
							<div class="col-6"> 
								<label for="data_retirada">Data da Retirada</label>
								<input type="date" name ="data_retirada" class="form-control" id="data_retirada" required >
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-6">
								<label for="qtdlitro">Quantidade de Litro</label>
								<input type="text" name="qtdlitro" class="form-control" id="qtdlitro" required placeholder="EX:100">
							</div>  
							<div class="col-6"> 
								<label for="consignacao">Consignação</label>
								<input type="text" name ="consignacao" class="form-control" id="consignacao"  placeholder="Caso nao tenha consignado digite 0" required>
							</div>
						</div>
					</div>
					<div class="form-group"> 
						<label for="observacao">Observação</label>
						<textarea name="observacao" id="observacao" rows="5" cols="102" placeholder="Digite uma observação caso necessario"></textarea>
					</div>
					<button type="submit" class="btn btn-warning">Agendar</button>
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