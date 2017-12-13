

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login_1.css');?>">

<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="<?php echo base_url('Usuario/logar') ?>" role="login">
          <img  width="300px" height="100px" src="Imagens/Logo_new.png" class="img-responsive" alt=""/>
          <input type="email" name="email" placeholder="Email" required class="form-control input-lg" value="" />
          
          <input type="password" class="form-control input-lg" name="senha" placeholder="Senha" required="" />
          
          
          
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Login</button>
          <div>
            Ainda não tem uma conta ? <a href="<?= base_url('cadastrar_usuario') ?>">Crie aqui</a>
          </div>
          
        </form>
        
        
      

  </div>
  
 
  
  
</div>