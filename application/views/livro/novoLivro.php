<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
    <style>
        .erro {color: #f00;}
    </style>

</head>
<body>
    <div class="container">
        <h1 class="text-center">Novo livro</h1>
        <div class="col-md-6">
            <?= form_open('livro/gravar'); ?>
                <div class="form-group">
                    <label for="nome">Nome </label><span class="erro"><?php echo form_error('nome') ? : ''; ?></span>
                    <input type="text" name="nome" id="nome" value="<?= set_value('nome') ? : (isset($nome) ? $nome : ''); ?>" class="form-control" autofocus/>
                </div>

                <div class="form-group">
                    <label for="autor">Autor </label><span class="erro"><?php echo form_error('autor') ? : ''; ?></span>
                    <input type="text" name="autor" id="autor" value="<?= set_value('autor') ? : (isset($autor) ? $autor : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="editora">Editora </label><span class="erro"><?php echo form_error('editora') ? : ''; ?></span>
                    <input type="text" name="editora" id="editora" value="<?= set_value('editora') ? : (isset($nome) ? $nome : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="lancamento">Lancamento </label><span class="erro"><?php echo form_error('lancamento') ? : ''; ?></span>
                    <input type="text" name="lancamento" id="lancamento" value="<?= set_value('lancamento') ? : (isset($lancamento) ? $lancamento : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="genero">genero </label><span class="erro"><?php echo form_error('genero') ? : ''; ?></span>
                    <input type="text" name="genero" id="genero" value="<?= set_value('genero') ? : (isset($genero) ? $genero : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="origem">origem </label><span class="erro"><?php echo form_error('origem') ? : ''; ?></span>
                    <input type="text" name="origem" id="origem" value="<?= set_value('origem') ? : (isset($origem) ? $origem : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="distrubuidora">distribuidora </label><span class="erro"><?php echo form_error('distrubuidora') ? : ''; ?></span>
                    <input type="text" name="distrubuidora" id="distrubuidora" value="<?= set_value('distrubuidora') ? : (isset($distrubuidora) ? $distrubuidora : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="linguagem">linguagem </label><span class="erro"><?php echo form_error('linguagem') ? : ''; ?></span>
                    <input type="text" name="linguagem" id="linguagem" value="<?= set_value('linguagem') ? : (isset($linguagem) ? $linguagem : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="traducao">traducao </label><span class="erro"><?php echo form_error('traducao') ? : ''; ?></span>
                    <input type="text" name="traducao" id="traducao" value="<?= set_value('traducao') ? : (isset($traducao) ? $traducao : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="tradutor">tradutor </label><span class="erro"><?php echo form_error('tradutor') ? : ''; ?></span>
                    <input type="text" name="tradutor" id="tradutor" value="<?= set_value('tradutor') ? : (isset($tradutor) ? $tradutor : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="titulo_origem">titulo_origem </label><span class="erro"><?php echo form_error('titulo_origem') ? : ''; ?></span>
                    <input type="text" name="titulo_origem" id="titulo_origem" value="<?= set_value('titulo_origem') ? : (isset($titulo_origem) ? $titulo_origem : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="designer_conteudo">designer_conteudo </label><span class="erro"><?php echo form_error('designer_conteudo') ? : ''; ?></span>
                    <input type="text" name="designer_conteudo" id="designer_conteudo" value="<?= set_value('designer_conteudo') ? : (isset($designer_conteudo) ? $designer_conteudo : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit"  value="Salvar" class="btn btn-success"/>
                </div>
                <input type="hidden" name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>" />

            <?= form_close(); ?>
        </div>
    </div>

</body>
</html>