<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Tipo</th>
			<th>Tamanho</th>
			<th>Deletar</th>
		</tr>
	</thead>
	<tbody>
		<!-- Aquele foreach basico para percorrer o array de $atributos e preencher cada linha da tabela -->
		<?php
		if (isset($atributos)){
		foreach($atributos as $ai){
			
			echo "<tr>";
			echo "<td>".$ai[0]->Nome."</td>";
			echo "<td>".$ai[0]->Tipo."</td>";
			echo "<td>".$ai[0]->Tam."</td>";
			echo "<td>".
				// anchor funciona como a tag <a>, e redireciona para outra página, eu prefiro usar com anchor, por isso está assim.
				//anchor(base_url(controlador/funcao/parametro),"Nome do botão", array('class' => 'nome da classe', 'id' = > 'nome do id', 'name' => 'nome do name kkk que bosta'... mas é aqui que são passado os parametros que custumam ficar dentro da tag a));.
			anchor(base_url("Grupo/apagar_atributo_categoria/".$ai[0]->Id."/".$this->session->userdata("nome")),"Apagar",array('class'=>'btn btn-danger'))." ".
			"</td>"."</tr>";
			
		}
	}
		?>
	</tbody>
</table>



