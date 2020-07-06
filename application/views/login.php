<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">

<div class="wrapper fadeInDown">
  <div id="formContent">

    <!-- Login Form -->
    <?php if (isset($login)) { echo "<h4>Erro ao Logar. Tente novamente.</h4>"; }  ?>

    <form action="<?= base_url("/login/autentica") ?>" method="post">
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="e-mail"
             value="<?php if (isset($login)) { echo $login; }  ?>">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="senha">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Esqueçeu a senha?</a>
    </div>

  </div>
</div>