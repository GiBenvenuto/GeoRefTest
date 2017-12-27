

<form method="post" action="<?php echo base_url('Grupo/add_atributo') ?>">	
	<div class="alert alert-danger">
		 <?php echo $this->session->flashdata('msg');?>
	</div>


	<?php echo $this->session->userdata("nome") ?>
	<br><br>
	<label> Escolha os atributos desta categoria</label>	
	<select class="form-control" name="select">
		<?php 
		foreach ($atributos as $at) {
			echo "<option value = '$at->Id'>".$at->Nome." ".$at->Tipo." ".$at->Tam."</option>";
		}

		?>
	</select>
	<br>
	<button type="submit" name="go" class="btn btn-lg btn-info btn-block">Adicionar</button>		
</form>

<br><br>

<form method="post" action="<?php echo base_url('Grupo/inserir_atributo') ?>">	

	<br>
	<label> Crie um novo atributos </label>	


	<div class="form-group">
		<label for="exampleInputEmail1">Nome do Atributo</label>
		<input type="text" class="form-control" size="50" name="nome" placeholder="Ex : Nome" required class="form-control input-lg">
		
		<label>Tipo</label>
		<select class="form-control" name="tipo">
			
			<option value = 'Varchar'>String</option>;
			<option value = 'Int'>Inteiro</option>;
			<option value = 'Float'>Real</option>;
			<option value = 'Date'>Horário</option>;


		</select>

		<label>Tamanho</label>
		<input type="number" class="form-control"  placeholder="Ex : 100" name="tamanho" >
		<br>



		<br><br>

		<button type="submit" name="go" class="btn btn-lg btn-info btn-block">Criar</button>

	</div>


</form>

<br><br>