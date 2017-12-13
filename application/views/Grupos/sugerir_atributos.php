<form method="post" action="<?php base_url('Grupo/add_atributo') ?>">	

		<?php echo $nome ?>
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
			<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Adicionar</button>		
		</form>
