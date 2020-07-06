<div class="container">

<?php

?>
<div class="container">
        <div class="row">
            <h3>Usuarios </h3>
        </div>
    </div>

    <table>
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Senha</td>
        </td>
        <?php 
             foreach ($usuarios as $usuario) {
        ?>
        <tr>
            <td><?php echo $usuario['nome'] ?></td>
            <td><?php echo $usuario['email'] ?></td>
            <td><?php echo $usuario['senha'] ?></td>
        </td>
        <?php
        }
        ?>
    </table>
    </div>
