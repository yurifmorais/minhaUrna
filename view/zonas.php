<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Candidato | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/zonas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

</head>

<body style="width:390px; text-align: left;">
    <p class="pageTitle">Seções da zona</p>

    <?php
    include("../model/conexao.php");
    $zona = $_GET['idZona'];
    $idMuni = $_GET['idMuni'];
    $verif = $_GET['verif'];
    $votos = 0;
    echo '<h5 style="position: relative;
        text-align: left;
        height: 25px;
        padding-top: 18px;
        padding-left: 20px;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 25px;
        
        box-sizing: border-box;
        margin-top: 32px;
        width: 358px;
        height: 88px;
        margin-left: 8px;
        background: linear-gradient(104.06deg, rgba(174, 171, 228, 0.5) 1.9%, rgba(173, 170, 228, 0.75) 106.2%);
        border: 0.5px solid rgba(0, 0, 0, 0.25);
        border-radius: 16px;"">Zona</h5>';
    echo '<h5 style="position: relative;
        width: auto;
        text-align: left;
        margin-top: -72px;
        margin-left: 30px;
        height: 18px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;"">' . $zona . '</h5>';

    echo '<h5 style="position: relative;
        text-align: right;
        margin-right: 42px;
        height: 25px;
        float: right;
        margin-top: -68px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;""">  Votos totais da zona</h5><br><br>';
    ?>
    <p style="position: relative; margin-left: 16px; display: flex; font-size: 14px; margin-top: -28px;">Seções</p>
    <?php
    $sql = "SELECT * FROM urna WHERE zona=" . $zona . " ORDER BY secao";
    $registro = mysqli_query($conectado, $sql);
    while ($registros = mysqli_fetch_array($registro)) {

        $sql2 = "SELECT * FROM boletim WHERE valido = $verif and idUrna = " . $registros['idUrna'];
        $registro2 = mysqli_query($conectado, $sql2);
        while ($registros2 = mysqli_fetch_array($registro2)) {

            $sql3 = "SELECT sum(votos) as tVotos FROM votos WHERE idBoletim = " . $registros2['idBoletim'];
            $registro3 = mysqli_query($conectado, $sql3);
            while ($registros3 = mysqli_fetch_array($registro3)) {
                $votos = $votos + $registros3['tVotos'];
            }
    ?>
            <form name="secao" action="secao.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idBol" id="idBol" value="<?php echo $registros2['idBoletim'] ?>">
                <input type="hidden" name="zona" id="zona" value="<?php echo $zona ?>">
                <input type="hidden" name="idMuni" id="idMuni" value="<?php echo $idMuni ?>">
                <input type="hidden" name="secao" id="secao" value="<?php echo $registros['secao'] ?>">
                <p class="secaoText">Seção</p>
                <p class="secaoNumber"><?php echo '' . $registros['secao'] ?></p>
                <input class="button" id="enviar" name="enviar" type="submit" value="">

                <br>

            </form>

    <?php
        }
    }
    echo '<h5 style="position: relative;
    text-align: right;    
    width: auto;
    height: 25px;
    margin-right: 42px;
    margin-top: -174px;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 25px;""">' . $votos  . '</h5><br><br>';
