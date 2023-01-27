 <!DOCTYPE html>

 <head lang="pt-br">
    <title>Minha Conta | Minha Urna</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/perfilUser.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

 <?php
  include('../model/conexao.php');
  include('../control/verificar.php');

  $email = $_SESSION['email'];
  $sql = "SELECT * from usuario where email = '$email'";
  $produtos = mysqli_query($conectado, $sql);
  while ($produto = mysqli_fetch_assoc($produtos)) {
    $nome = $produto['nome'];
    $img = $produto['img'];
    $idUsuario = $produto['idUsuario'];
  }
  ?>

  <body>
  <div class="profilePic">
          <?php
            if ($img == $email) {
              echo '  <img src="../img/semIm.jpg" alt=""style=" width: 216px; height: 216px; border-radius: 999px">';
            } else {
              echo '  <img src="../img/' . $img . '" alt=""style="width: 216px; height: 216px; border-radius: 999px">';
            }
            ?>
  </div>
    <p class="title">Suas informações</p>
    <p class="subtitle">Verifique ou edite seus dados</p>

  <div class="container-fluid">
    <form name="att" method="POST" action="../model/attUser.php" enctype="multipart/form-data">
      <div>
        <input type="text" class="nomeTextField" name="nome" value="<?php echo $nome; ?>">
      </div>
      <div>
        <input name="email" type="email" class="emailTextField" value="<?php echo $email; ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario ?>">
      </div>
      <div>
        <input type="file" class="imgField" id="exampleFormControlFile1" name="fileUpload">
      </div>
      <br>
      <button type="submit" class="entrar">Salvar alterações</button>
  </div>
  <br>
    <a href="../control/sair.php">Sair</a>
  </form>

 </body>

 </html>