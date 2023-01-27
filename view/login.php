<!DOCTYPE html>
<html>

<head lang="pt-br">
<title>Entrar | Minha Urna</title>  
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <img src="illustrations/loginSecurity.png">
  <p class="title">Entrar</p>
  <p class="subtitle">Digite as suas informações</p>

  <div class="container-fluid">
    <form action="../control/autenticar.php" method="POST">
      <div class="emailTextField">
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" autofocus="">
      </div>
      <div class="passwordTextField">
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha">
      </div>
      
      <button type="submit" class="entrar">Entrar</button>
    </form>
  </div>
  
  <p class="helpText">Se nunca esteve aqui antes, crie uma conta!</p>
  <a href="cadastroUser.php"> Criar uma conta</a>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </div>
</body>

</html>