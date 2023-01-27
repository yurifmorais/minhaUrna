<!DOCTYPE html>

<head lang="pt-br">
    <title>Candidato | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/candidato.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

</head>
<p class="pageTitle">Dados do candidato</p>

<body style="width: 390px; text-align: left">
    <div style=width:358px;>
        <?php
        $idCand = $_GET['idCand'];
        $turno = $_GET['turno'];

        include("../model/conexao.php");

        $sql = "SELECT * FROM candidatos WHERE ID_CANDIDATO=" . $idCand;
        $registro = mysqli_query($conectado, $sql);
        $registros = mysqli_fetch_array($registro);

        echo '<h5 style="position: absolute;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 25px;
        width: 350px;
        height: 25px;
        left: 16px;
        top: 42px;
        box-sizing: border-box;
        width: 358px;
        height: 164px;
        padding-top: 18px;
        padding-left: 20px;
        background: linear-gradient(104.06deg, #E3EED3 1.9%, rgba(162, 205, 150, 0.75) 106.2%);
        border: 0.5px solid rgba(0, 0, 0, 0.25);
        border-radius: 16px;"">' . $registros['NM_URNA_CANDIDATO'] . '</h5><br>';
        echo '<h5 style="position: relative;
        width: auto;
        text-align: right;
        margin-right: 8px;
        font-style: normal;
        margin-bottom: 8px;
        margin-top: 12px;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;">' . $registros['NR_CANDIDATO'] . '</h5><br>';

        $sql2 = "SELECT * FROM partidos WHERE NR_PARTIDO=" . $registros['NR_PARTIDO'];
        $registro2 = mysqli_query($conectado, $sql2);
        $registros2 = mysqli_fetch_array($registro2);

        echo '<h5 style="position: relative;
        text-align: right;
        width: auto;
        height: 18px;
        margin-right: 8px;
        margin-top: -24px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;"">' . $registros2['SG_PARTIDO'] . '</h5><br>';

        $sql3 = "SELECT * FROM cargos WHERE CD_CARGO=" . $registros['CD_CARGO'];
        $registro3 = mysqli_query($conectado, $sql3);
        $registros3 = mysqli_fetch_array($registro3);

        echo '<h5 style="position: relative;
        height: 18px;
        margin-top: -61px;
        margin-left: 28px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;"">Candidato a</h5><br>';
        echo '<h5 style="position: relative;
        width: auto;
        margin-top: -63px;
        margin-left: 113px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;"">' . $registros3['NM_CARGO'] . '</h5><br>';


        $sql7 = "SELECT * FROM estadouf WHERE id=" . $registros['ID_UF'];
        $registro7 = mysqli_query($conectado, $sql7);
        $registros7 = mysqli_fetch_array($registro7);

        echo '<h5 style="position: relative;
    text-align: right;
    margin-top: -12px;
    margin-right: 8px;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    color: #000000;"">Abrangência</h5><br><br>';


        echo '<h5 style="position: relative;
        width: auto;
        text-align: right;
        margin-top: -55px;
        margin-right: 8px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;"">' . $registros7['uf'] . '</h5><br>';

        $sql5 = "SELECT sum(votos) as tvotos FROM votos natural join boletim WHERE idCandidato = $idCand and valido = 1";
        $registro5 = mysqli_query($conectado, $sql5);
        $registros5 = mysqli_fetch_array($registro5);

        echo '<h5 style="position: relative;
        height: 18px;
        margin-left: 28px;
        margin-top: -92px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;"">Votos totais</h5><br><br>';

        echo '<h5 style="position: relative;
        width: auto;
        height: 18px;
        left: 132px;
        margin-top: -83px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;"">' . $turno . 'º Turno</h5><br>';

        echo '<h5 style="position: relative;
        width: auto;
        height: 18px;
        left: 28px;
        top: -72px;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;
        color: #000000;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 25px;"">' . $registros5['tvotos'] . '</h5><br><br>';
        '</h5><br>';
        ?>
        <br><br>
        <img src="illustrations/warning.png">
        <p style="position: absolute;
        width: 278px;
        height: 16px;
        left: 72px;
        top: 250px;
        font-weight: 500;
        font-size: 11px;
        line-height: 16px;
        letter-spacing: 0.4px;
        color: rgba(0, 0, 0, 0.7);">Use os filtros abaixo para exibir as zonas eleitorais</p>
        <div class="card">
            <div class="card-body">
                <form name="frmResul1" action="cadastroResultado2.php" method="POST" enctype="multipart/form-data">
                    <select name="selectUF" class="UFField" id="idUF" required>
                        <?php
                        include("../model/conexao.php");
                        $UF = "<option value='0'>UF</option>";
                        $sql = "SELECT * FROM estadoUF GROUP BY uf ORDER BY uf";
                        $rs = mysqli_query($conectado, $sql);
                        while ($registro = mysqli_fetch_array($rs)) {
                            if ($registro['uf'] != "BR") {
                                $UF = $UF . "<option value='" . $registro['id'] . "'>" . $registro['uf'] . "</option>";
                            }
                        }
                        echo $UF;
                        ?>
                    </select>
                    <select name="selectMuni" id="idMuni" class="municipioField" required>
                        <option value="0">Municipio</option>
                    </select>
                </form>
            </div>
            <div id="res" value="<?php echo $idCand ?>"></div>
            <div class=zonas id="resul">
                <br>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <script src="../js/listarBol.js"></script>
            </div>
</body>

</html>