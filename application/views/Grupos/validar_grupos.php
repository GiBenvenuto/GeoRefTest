<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Descrição</th>
			<th>Ver</th>
			
		</tr>
	</thead>
	<tbody>
		<!-- Aquele foreach basico para percorrer o array de $atributos e preencher cada linha da tabela -->
		<?php
		if (isset($grupos)){
		foreach($grupos as $ai){
			
			echo "<tr>";
			echo "<td>".$ai->Nome."</td>";
			echo "<td>".$ai->Descricao."</td>";
			echo "<td>".
				// anchor funciona como a tag <a>, e redireciona para outra página, eu prefiro usar com anchor, por isso está assim.
				//anchor(base_url(controlador/funcao/parametro),"Nome do botão", array('class' => 'nome da classe', 'id' = > 'nome do id', 'name' => 'nome do name kkk que bosta'... mas é aqui que são passado os parametros que custumam ficar dentro da tag a));.
			anchor(base_url("Grupo/ver_grupo/".$ai->Nome),"Ver",array('class'=>'btn btn-danger'))." ".
			"</td>"."</tr>";
			
		}
	}
		?>
	</tbody>
</table>

<form method="post" action="<?php echo base_url('Home/area_moderador') ?>">	

	<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Finalizar</button>		
</form>

<br><br>

