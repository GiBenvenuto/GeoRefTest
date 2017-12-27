
<form action="<?php echo base_url('Grupo/aceitar_grupo/'.$grupo->Id) ?>">
	<button type="submit" name="go" class="btn btn-lg btn-success btn-block">Validar</button>
</form>

<br>
<form action="<?php echo base_url('Grupo/excluir_grupo/'.$grupo->Id) ?>">
	<button type="submit" name="go" class="btn btn-lg btn-danger btn-block">Excluir</button>
</form>

<br>
<form action="<?php echo base_url('Grupo/validar_grupos') ?>">
	<button type="submit" name="go" class="btn btn-lg btn-info btn-block">Voltar</button>
</form>
