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

		<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Cpf</th>
				<th>Log</th>
				<th>Mais</th>
			</tr>
		</thead>
		<tbody>
		<!-- Aquele foreach basico para percorrer o array de $pessoas e preencher cada linha da tabela -->
			<?php
			foreach($pessoas as $pessoa){
				echo "<td>".$pessoa->id."</td>";
				echo "<td>".$pessoa->nome."</td>";
				echo "<td>".$pessoa->cpf."</td>";
				echo "<td>".$pessoa->log."</td>";
				echo "<td>".
				// anchor funciona como a tag <a>, e redireciona para outra página, eu prefiro usar com anchor, por isso está assim.
				//anchor(base_url(controlador/funcao/parametro),"Nome do botão", array('class' => 'nome da classe', 'id' = > 'nome do id', 'name' => 'nome do name kkk que bosta'... mas é aqui que são passado os parametros que custumam ficar dentro da tag a));
				anchor(base_url("pessoa/apagar/".$pessoa->id),"Apagar",array('class'=>'btn btn-danger'))." ".
				anchor(base_url("pessoa/editar_pessoa/".$pessoa->id),"Editar",array('class'=>'btn btn-success'))." ".
				anchor(base_url("pessoa/ver/".$pessoa->id),"Visualizar",array('class'=>'btn btn-info')).
				"</td>"."</tr>";
			}
			?>
		</tbody>
	</table>
