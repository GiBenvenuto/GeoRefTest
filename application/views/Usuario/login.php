 <script src="assets/js/login.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css');?>">

<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Faça o Login</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST" action="<?php echo base_url('Usuario/logar') ?>">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Senha" name="senha" type="password" value="">
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">

			    	</fieldset>
			      	</form>
			    </div>
			    </div>
          					<a href="<?= base_url('cadastrar_usuario') ?>" class="text-center new-account">Crie uma conta</a>
       					 </div>
			</div>    	
		</div>
</div>
</div>
