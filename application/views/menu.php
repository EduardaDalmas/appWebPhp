<?php
    $usuario = $this->session->userdata("usuario_logado");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <script src="<?=base_url('assets//bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('inicio'); ?>">Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=" <?=base_url('/inicio/sobre'); ?>">Sobre</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=" <?=base_url('/filme/listaFilme'); ?>">Lista de Filmes</a>
        </li>
        <?php if ($usuario) { ?>
        <li class="nav-item">
            <a class="nav-link" href=" <?=base_url('/usuario/lista'); ?>">Lista de Usuários</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=" <?=base_url('/livro/listaLivro'); ?>">Lista de Livros</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href=" <?=base_url('/login/logoff'); ?>">logoff</a>
        </li>
        <?php } else { ?> 
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disable="true">Lista de Usuários</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#"  tabindex="-1" aria-disable="true">Lista de Livros</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#"  tabindex="-1" aria-disable="true">Lista de Filmes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href=" <?=base_url('/login'); ?>">login</a>
        </li>
        <?php } ?>

        
    </ul>
    </div>
    <br><br><br>
</body>
</html>