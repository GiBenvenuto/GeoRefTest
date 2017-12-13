<div id="homebody" onload="showMsg('Mensagem')" >

	<div class="alinhado-centro borda-base espaco-vertical">
		<?php 
		//echo "<h3> Projeto Base </h3>";
		echo heading("Projeto Base",3);
		echo heading("Ver pessoa",4);
		?>
	</div>

	<!-- Novamente o foreach para colocar o dado que está em $pessoa em $p e poder utilizar como $p->id, $p->nome... simples simples simples. -->
	<?php foreach($pessoa as $p) { ?>
	<div class="col-md-12">

		<div class="col-md-6">
			<label for="nome">Id: <?= $p->id ?></label><br>
			<label for="nome">Nome: <?= $p->nome ?></label><br>
			<label for="nome">Cpf: <?= $p->cpf ?></label><br>
			<label for="nome">Criado em: <?= $p->log ?></label><br>
			<a class="btn btn-primary" href="<?= base_url('cadastrar_usuario'); ?>">Voltar</a>
		</div>

	</div>
	<?php } ?>

</div>
