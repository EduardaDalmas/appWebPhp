<div class="container">

<?php

?>
<div class="container">
        <div class="row">
            <h3>Filmes </h3>
        </div>
    </div>

    <table>
        <tr>
            <td>titulo</td>
            <td>genero</td>
            <td>lancamento</td>
        </td>
        <?php 
             foreach ($filmes as $filme) {
        ?>
        <tr>
            <td><?php echo $filme['titulo'] ?></td>
            <td><?php echo $filme['genero'] ?></td>
            <td><?php echo $filme['lancamento'] ?></td>
        </td>
        <?php
        }
        ?>
    </table>
    </div>
