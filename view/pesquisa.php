<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Busca | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/pesquisa.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<p class="pageTitle">Resultados da busca</p>
<img class="searchIcon" src="illustrations/search.svg" alt="search" />
<br>
<br>
<br>


<?php
$busca = $_POST['busca'];
$turno = $_POST['turno'];

include("../model/conexao.php");

$sql = "SELECT * FROM candidatos WHERE NR_TURNO =" . $turno . " AND NM_URNA_CANDIDATO LIKE '%" . $busca . "%' ORDER BY NM_URNA_CANDIDATO";
$registro = mysqli_query($conectado, $sql);

$row = mysqli_num_rows($registro);

if ($row > 0) {

    echo '<h1  style=" margin-top:18px; margin-left: 50px;
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 8px;"> ' . $busca . '</h1>';

    while ($registros = mysqli_fetch_array($registro)) {
?>

        <br>
        <p style="font-family: 'Plus Jakarta Sans';
                font-style: normal;
                font-weight: 400;
                font-size: 14px;
                line-height: 18px;
                position: absolute;
                left: 41px;
                width: 71px;
                height: 18px;">Candidato</p>
        <a style="box-sizing: border-box;
                position: absolute;
                left: 14px;
                width: 360px;
                height: 72px;
                padding-top: 32px;
                padding-left: 26px;

                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 24px;

                font-family: 'Plus Jakarta Sans';
                font-style: normal;
                font-weight: 600;
                font-size: 18px;
                line-height: 25px;
                text-decoration: none;
 
                color: #000000;" href="candidato.php?idCand=<?php echo $registros['ID_CANDIDATO'] ?>&turno=<?php echo $turno ?>"><?php echo $registros['NM_URNA_CANDIDATO'] ?></a>
        <br>
        <br>
        <br>
<?php
    }
} else {
    echo '<h1  style=" margin-top:18px; margin-left: 50px;
            font-style: normal;
            font-weight: 700;
            font-size: 20px;
            line-height: 8px;"> ' . $busca . '</h1>';
    echo '<img style="position: absolute;
        width: 219px;
        height: 219px;
        left: 82px;
        top: 164px;
        
        background: url(notFound.jpg);
        border-radius: 999px;" src="illustrations/notFound.png">';
    echo '<h1  style="position: absolute;
        width: 194px;
        height: 28px;
        left: 96px;
        top: 380px;
        font-style: normal;
        font-weight: 600;
        font-size: 22px;
        line-height: 28px;">Nada encontrado!</h1>';
    }
