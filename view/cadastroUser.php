<!DOCTYPE html>
<html>

<head lang="pt-br">
  <title>Criar conta | Minha Urna</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/cadastroUser.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

  <img src="illustrations/loginSecurity.png">
  <p class="title">Registrar</p>
  <p class="subtitle">Digite as suas informações</p>

  <div class="container-fluid">

    <form name="frmUsuario" action="escolheUser.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
      <div class="nomeTextField">
        <input type="text" name="nome" class="form-control" placeholder="Nome" required>
      </div>

      <div class="emailTextField">
        <input name="email" type="email" class="form-control" placeholder="E-mail" required>
      </div>

      <div class="passwordTextField">
        <input name="senha" type="password" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Senha" required minlength="8" maxlength="15">
        <small id="passwordHelpBlock" class="passwordHelp">
          Sua senha deve conter de 8 a 15 caracteres.
        </small>
      </div>
  </div>
</div>
<br>
<button type="submit" class="entrar">Criar conta</button><br>

<p class="helpText">Se já esteve aqui antes, faça o login!</p>
<a href="login.php">Fazer login</a>
<br>

</form>
</fieldset>
<script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {

      var forms = document.getElementsByClassName('needs-validation');

      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>