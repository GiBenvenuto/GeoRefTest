<form method="post" action="<?php echo base_url('Grupo/sugerir_marcacao') ?>">	

	<label> Escolher categoria :</label>	
	<select class="form-control" name="selectGrupo">
		<?php 
		foreach ($grupo as $g) {
			echo "<option value = '$g->Nome'>".$g->Nome."</option>";
		}

		?>
	</select>
	<br>
	<button type="submit" name="go" class="btn btn-lg btn-info btn-block">Escolher</button>
	<br>

</form>