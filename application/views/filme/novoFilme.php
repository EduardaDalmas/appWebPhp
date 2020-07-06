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
        <h1 class="text-center">Novo filme</h1>
        <div class="col-md-6">
            <?= form_open('filme/gravar'); ?>
                <div class="form-group">
                    <label for="titulo">titulo </label> <span class="erro"><?php echo form_error('titulo') ? : ''; ?></span>
                    <input type="text" name="titulo" id="titulo" value="<?= set_value('titulo') ? : (isset($titulo) ? $titulo : ''); ?>" class="form-control" autofocus/>
                </div>

                <div class="form-group">
                    <label for="genero">genero </label> <span class="erro"><?php echo form_error('genero') ? : ''; ?></span>
                    <input type="text" name="genero" id="genero" value="<?= set_value('genero') ? : (isset($genero) ? $genero : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="produtor">produtor </label> <span class="erro"><?php echo form_error('produtor') ? : ''; ?></span>
                    <input type="text" name="produtor" id="produtor" value="<?= set_value('produtor') ? : (isset($produtor) ? $produtor : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="gravadora">gravadora </label> <span class="erro"><?php echo form_error('gravadora') ? : ''; ?></span>
                    <input type="text" name="gravadora" id="gravadora" value="<?= set_value('gravadora') ? : (isset($gravadora) ? $gravadora : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="classificacao">classificacao </label> <span class="erro"><?php echo form_error('classificacao') ? : ''; ?></span>
                    <input type="text" name="classificacao" id="classificacao" value="<?= set_value('classificacao') ? : (isset($classificacao) ? $classificacao : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="diretor">diretor </label> <span class="erro"><?php echo form_error('diretor') ? : ''; ?></span>
                    <input type="text" name="diretor" id="diretor" value="<?= set_value('diretor') ? : (isset($diretor) ? $diretor : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="diretor_musical">diretor_musical </label> <span class="erro"><?php echo form_error('diretor_musical') ? : ''; ?></span>
                    <input type="text" name="diretor_musical" id="diretor_musical" value="<?= set_value('diretor_musical') ? : (isset($diretor_musical) ? $diretor_musical : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="roteirista">roteirista </label> <span class="erro"><?php echo form_error('roteirista') ? : ''; ?></span>
                    <input type="text" name="roteirista" id="roteirista" value="<?= set_value('roteirista') ? : (isset($roteirista) ? $roteirista : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="cinegrafista">cinegrafista </label> <span class="erro"><?php echo form_error('cinegrafista') ? : ''; ?></span>
                    <input type="text" name="cinegrafista" id="cinegrafista" value="<?= set_value('cinegrafista') ? : (isset($cinegrafista) ? $cinegrafista : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="origem">origem </label> <span class="erro"><?php echo form_error('origem') ? : ''; ?></span>
                    <input type="text" name="origem" id="origem" value="<?= set_value('origem') ? : (isset($origem) ? $origem : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="lancamento">lancamento </label> <span class="erro"><?php echo form_error('lancamento') ? : ''; ?></span>
                    <input type="text" name="lancamento" id="lancamento" value="<?= set_value('lancamento') ? : (isset($lancamento) ? $lancamento : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="tempo">tempo </label> <span class="erro"><?php echo form_error('tempo') ? : ''; ?></span>
                    <input type="text" name="tempo" id="tempo" value="<?= set_value('tempo') ? : (isset($tempo) ? $tempo : ''); ?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit"  value="Salvar" class="btn btn-success"/>
                </div>
                <input type="hidden" name="id" value="<?= set_value('id') ? : (isset($id) ? $id : '') ?>" />
            <?= form_close(); ?>
        </div>
    </div>

</body>
</html>