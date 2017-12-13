<div id="homebody" onload="showMsg('Mensagem')" >

	<div class="alinhado-centro borda-base espaco-vertical">
		<?php 
		//echo "<h3> Projeto Base </h3>";
		echo heading("Projeto Base",3);
		echo heading("Editar pessoa",4);


		// Verificando a existência de uma mensagem de erro via session.
		//A vantagem de se usar a flashdata é que a session é "temporaria". Após seu uso ela é descartada da memória.
		if ($this->session->flashdata('sucesso')) { ?>
		<div class="alert alert-success"> <?= $this->session->flashdata('sucesso') ?> </div>
		<?php } 
		if ($this->session->flashdata('erro')) { ?>
		<div class="alert alert-danger"> <?= $this->session->flashdata('erro') ?> </div>
		<?php } ?>

	</div>


	<!-- Aqui a coisa muda um pouco. Essa é a página de edição, ela recebe os dados no indice ['pessoa'] de um vetor de dados. Para utilizar esses dados (mesmo sabendo que é apenas um dado), eu passei num foreach e no value="" de cada campo eu preenchi com o dado da pessoa carregada, utilizando  value="<?= $p->nome ?>"... E o action desse formulário leva para 'pessoa/editar/'.$p->id, para que a função editar($id) receba o id da pessoa como parametro e consiga fazer o update no banco na pessoa certa. -->
	<?php foreach($pessoa as $p) { ?>
	<div class="col-md-12">
		<form method="POST" action="<?php echo base_url('pessoa/editar/'.$p->id); ?>">
			
			<div class="col-md-6">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?= $p->nome ?>" />
			</div>

			<div class="col-md-6">
				<label for="cpf">Cpf</label>
				<input type="text" class="form-control" name="cpf" id="cpf" value="<?= $p->cpf ?>" />
			</div>
			<div class="col-md-12">
				<br>
				
				<!-- Esse <a> é só um botão simples de voltar, que redireciona para cadastrar_usuario. Lembre-se das rotas, foi criado uma rota de pessoa/cadastrar para cadastrar_usuario, deixando a URL mais simples. -->
				<a class="btn btn-info" href="<?= base_url('cadastrar_usuario') ?>">Voltar</a>
				
				<input type="submit" class="btn btn-success" value="Editar">
			</div>
		</form>
	</div>
	<?php } ?>

</div>
