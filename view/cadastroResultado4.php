<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Registrar | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/cadastroResultado4.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <img src="illustrations/picture.png">
    <p class="title">Foto do boletim de urna</p>
    <div class="warning">
        <img src="illustrations/warning.png">
        <p class="title">Antes de informar os votos, adicione uma foto do boletim de urna, isso ajuda na verificação dos dados.</p>
    </div>
    <br>
    <p class="pageTitle">Registrar resultados</p>
    <br>

    <?php
    include("../model/conexao.php");
    $idUF = $_POST['selectUF'];
    $Municipio = $_POST['selectMuni'];
    $idZona = $_POST['selectZona'];
    $idSecao = $_POST['selectSecao'];
    $turno = $_POST['turno'];

    $query = ("SELECT * FROM urna
        WHERE idUF = '$idUF' and idMuni = '$Municipio' 
        and zona = '$idZona' and secao = '$idSecao'");

    $rs = mysqli_query($conectado, $query);
    while ($registro = mysqli_fetch_array($rs)) {
        $idUrna = $registro['idUrna'];
    }
    ?>

    <div class="card">
        <div class="card-body">
            <form name="frmResul2" action="../model/incluirBoletim.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <input name="fileUpload" type="file" class="form-control-file" required>
                </div>
                <input type="hidden" name="idUrna" id="idUrna" value="<?php echo $idUrna ?>">
                <input type="hidden" name="idUF" id="idUF" value="<?php echo $idUF ?>">
                <input type="hidden" name="turno" id="turno" value="<?php echo $turno ?>">

        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Próximo</button><br>
    <img class="progress" src="illustrations/progress3.png">

</body>

</html>