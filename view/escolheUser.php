<!DOCTYPE html>
<html>

<head lang="pt-br">
  <title>Criar conta | Minha Urna</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/escolheUser.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <img src="illustrations/loginSecurity.png">
    <p class="title">Registrar</p>
    <p class="subtitle">Selecione um cargo</p>
    <br>

    <?php
    include('../model/conexao.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    ?>

    <form name="frmUEscolha" action="../model/incluirCadastro.php" method="POST" enctype="multipart/form-data">
        <div class="comum">
            <input type="radio" id="normal" name="user" value="0">
            <label for="user">Usuário Comum</label>
            <p>●  Registre votos</p>
            <p>●  Busque resultados</p>
        </div>
        <div class="admin">
            <input type="radio" id="adm" name="user" value="1">
            <label for="adm">Administrador</label>
            <p>●  Registre votos</p>
            <p>●  Busque resultados</p>
            <p>●  Verifique boletins</p>
            <p></p>
        </div>

        <input type="hidden" name="nome" id="idUF" value="<?php echo $nome ?>">
        <input type="hidden" name="email" id="idUF" value="<?php echo $email ?>">
        <input type="hidden" name="senha" id="idUF" value="<?php echo $senha ?>">

        <button class="entrar" type="submit" class="entrar">Finalizar registro</button><br>

    </form>
</body>