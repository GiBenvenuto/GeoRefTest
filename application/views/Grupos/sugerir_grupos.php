

<form method="post" action="<?php echo base_url('Grupo/inserir_grupo') ?>">

	<div class="alert alert-danger">
		 <?php echo $this->session->flashdata('msg');?>
	</div>

<div class="form-group">
	<label for="exampleInputEmail1">Nome da Categoria</label>
	<input type="text" class="form-control" name="nome" placeholder="Ex : Árvores" required class="form-control input-lg">
	<br>

	<label for="exampleTextarea">Descrição</label>
	<input type="text" class="form-control" id="descricao" placeholder="Ex : Árvores frutíferas" name="descricao" rows="2">
	<br>



	<br><br>

	<button type="submit" name="go" class="btn btn-lg btn-info btn-block">Sugerir</button>

</div>

</form>