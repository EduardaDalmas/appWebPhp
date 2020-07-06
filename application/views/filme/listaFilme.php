<?php
    $usuario = $this->session->userdata("usuario_logado");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inicio</title>

</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Lista de filmes</h3>
        </div>
        <div class="row">
            <h4> <?= $filmes->num_rows(); ?> registro(s) </h4>
        </div>
        <li class="nav-item">
            <a class="nav-link" href=" <?=base_url('/filme/novoFilme'); ?>">Adicionar Filmes</a>
        </li></br>

        <?php echo form_open('filme/pesquisaFilme', 'method="get"'); ?>
            <table>
                <tr>
                <td> <input type="text" name="titulo" style="border-radius"> </td>
                <td> <input type="submit" value="Pesquisar"> </input> </td>
                </tr>
            </table> </br>
        <?php echo form_close(); ?>

        <a href="<?php echo base_url('filme/exportaFilme'); ?>" class="link blue float-right">Exportar filmes </a>

        <?php if ($filmes->num_rows() > 0) { ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>titulo </th>
                        <th>genero </th>
                        <th>produtor </th>
                        <th>gravadora </th>
                        <th>classificação </th>
                        <th>diretor </th>
                        <th>diretor musical </th>
                        <th>roteirista </th>
                        <th>cinegrafista </th>
                        <th>origem </th>
                        <th>lançamento </th>
                        <th>tempo </th>
                        <th>Criado em </th>
                        <?php if ($usuario){
                        if ($usuario["tipo"]=="adm"){  ?> 
                            <th scope="col">Ações</th>
                        <?php } ?>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($filmes -> result() as $cadastro) { ?>
                    <tr>
                        <td><?= $cadastro->id ?></td>
                        <td><?= $cadastro->titulo ?> </td>
                        <td><?= $cadastro->genero ?> </td>
                        <td><?= $cadastro->produtor ?> </td>
                        <td><?= $cadastro->gravadora ?> </td>
                        <td><?= $cadastro->classificacao ?> </td>
                        <td><?= $cadastro->diretor ?> </td>
                        <td><?= $cadastro->diretor_musical ?> </td>
                        <td><?= $cadastro->roteirista ?> </td>
                        <td><?= $cadastro->cinegrafista ?> </td>
                        <td><?= $cadastro->origem ?> </td>
                        <td><?= $cadastro->lancamento ?> </td>
                        <td><?= $cadastro->tempo ?> </td>
                        <td><?= $cadastro->criado ?> </td>
                        <?php if ($usuario){
                        if ($usuario["tipo"]=="adm"){  ?> 
                        <td><?= anchor("filme/editar/$cadastro->id", "Editar") ?>
                        | <a href="#" class='confirma_exclusao' 
                                data-id="<?= $cadastro->id ?>"
                                data-titulo="<?= $cadastro->titulo ?>"> Excluir </a>
                        </td>
                        <?php } ?>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                    

                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        <?php }  ?>
    </div>

    <div class="modal fade" id="modal_confirmation">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmação de exclusão</h4>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente deletar o registro <strong><span id="titulo_exclusao"></span></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Agora não</button>
                    <button type="button" class="btn btn-danger" id="btn_excluir"> Sim, tenho certeza</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>" ></script>

    <script>

        var base_url = "<?=base_url();?>";

        $(function(){
            $('.confirma_exclusao').on('click', function(e) {
                e.preventDefault();

                var titulo = $(this).data('titulo');
                var id = $(this).data('id');

                $('#modal_confirmation').data('titulo', titulo);
                $('#modal_confirmation').data('id', id);
                $('#modal_confirmation').modal('show');
            });

            $('#modal_confirmation').on('show.bs.modal', function () {
                var titulo = $(this).data('titulo');
                $('#titulo_exclusao').text(titulo);
            });

            $('#btn_excluir').click(function() {
                var id = $('#modal_confirmation').data('id');
                document.location.href = base_url + "/filme/excluir/"+id;
            });
        });

    </script>

</body>
</html>