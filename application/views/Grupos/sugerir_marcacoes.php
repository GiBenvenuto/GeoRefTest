<div class="marcacoes">
	<h3> <?php echo $this->session->userdata('nomeGrupo'); ?></h3>
	<?php $this->session->set_userdata('att', $atributos) ?>

	<form method="post" action="<?php echo base_url('Grupo/salvar_marcacao') ?>">

		<?php 
		foreach ($atributos as $at) {

			echo "<label>".$at[0]->Nome."</label>";

			switch ($at[0]->Tipo) {
				case 'Varchar':
				echo "<input type='text' class='form-control' name=".$at[0]->Nome." required>";
				break;

				case 'Date':
				echo "<input type='textdatetime-local' class='form-control' name=".$at[0]->Nome." required>";
				break;
				
				default:
				echo "<input type='number' class='form-control' name=".$at[0]->Nome." required>";
				break;
			}
			echo "<br>";
		}

		?>


	<label>Clique no mapa ou digite o endereço</label>
	<input type="text" id="endereco" placeholder="Ex : Estado, Cidade, Rua, Número" class="form-control" >
	<button id="ver" class="btn btn-lg btn-info btn-block">Buscar</button>

	<br>
	<label>Latitude</label>
	<input type="text" name="lat" id="lat" class="form-control" required>
	<br>
	<label>Longitude</label>
	<input type="text" name="long" id="long" class="form-control" required>
	<br>

	<button type="submit" class="btn btn-lg btn-info btn-block">Salvar Marcação</button>
		<br>

	</form>

</div>