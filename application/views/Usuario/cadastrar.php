
<script src="assets/js/login_1.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login_1.css');?>">

<div class="container">
  
  <div class="row">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="<?php echo base_url('Usuario/cadastrar') ?>" role="login">
          <img  width="300px" height="100px" src="Imagens/Logo_new.png" class="img-responsive" alt=""/>

          <input type="text"  name="nome" placeholder="Nome completo" required class="form-control input-lg" value="" />

          <input type="email" name="email" placeholder="Email" required class="form-control input-lg" value="" />

          
         <div id="pwd-container">     	
         	
         	 <input type="password" class="form-control input-lg" name="senha" placeholder="Senha" required="" />
         	 <div class="pwstrength_viewport_progress"> </div>

         </div>
         

          
          <input type="password" class="form-control input-lg" name="csenha" placeholder="Confirme sua senha" id="csenha" />
          
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Criar</button>
          
          
        </form>
        
        
      

  </div>
  
  <p>
    <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fbootsnipp.com%2Fiframe%2FW00op" target="_blank"></a>
    <br>
    <br>
    
  </p>     
  