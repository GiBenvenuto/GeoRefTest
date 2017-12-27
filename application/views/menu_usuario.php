

<div id="wrapper">
    <div class="overlay"></div>
    
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">Menu
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buscar<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Opções</li>
                    <li><a href="<?= base_url('sugerir_grupos') ?>">Categoria Específica</a></li>
                    <li><a href="<?= base_url('Grupo/escolher_grupo') ?>">Todas</a></li>
                    
                </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sugerir<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-header">Opções</li>
                <li><a href="<?= base_url('sugerir_grupos') ?>">Categorias</a></li>
                <li><a href="<?= base_url('Grupo/escolher_grupo') ?>">Marcações</a></li>

            </ul>
        </li>
        <li>
            <a href="<?= base_url('Usuario/sair') ?>">Logout</a>
        </li>


    </ul>
</nav>
<!-- /#sidebar-wrapper -->
<div id="page-content-wrapper">
    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
    </button>
    <div class="container">
        <div class="row">


    <!-- /#wrapper -->