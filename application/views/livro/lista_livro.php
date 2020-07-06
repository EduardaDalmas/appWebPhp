<div class="container">

<?php

?>

<div class="container">
        <div class="row">
            <h3>Livros </h3>
        </div>
    </div>

    <table>
        <tr>
            <td>Nome</td>
            <td>Gerero</td>
            <td>Autor</td>
        </td>
        <?php 
             foreach ($livros as $livro) {
        ?>
        <tr>
            <td><?php echo $livro['nome'] ?></td>
            <td><?php echo $livro['genero'] ?></td>
            <td><?php echo $livro['autor'] ?></td>
        </td>
        <?php
        }
        ?>
    </table>

    </div>
