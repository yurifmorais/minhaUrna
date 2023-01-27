<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Registrar | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/verificarBol.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body style="width: 390px;">

    <p class="pageTitle">Verificar boletim informado</p>

    <form name="frmUEscolha" action="../model/incluirCadastro.php" method="POST" enctype="multipart/form-data">
        <div class="wrapper">
            <input type="radio" name="verif" id="option-1" value="0" id="notVer" checked>
            <input type="radio" name="verif" id="option-2" value="1" id="ver">
            <input type="radio" name="verif" id="option-3" value="2" id="rej">
            <label for="option-1" class="option option-1">
                <span>Não verificados</span>
            </label>
            <label for="option-2" class="option option-2">
                <span>Já verificados</span>
            </label>
            <label for="option-3" class="option option-3">
                <span>Rejeitados</span>
            </label>
        </div>

        <p style="position: relative; margin-left: 16px; display: flex; font-size: 14px; margin-top: 20px;">Zonas com boletins informados</p>

        <select name="selectUF" class="UFField" id="idUF" required>
            <?php
            include("../model/conexao.php");
            $turno = $_GET["turno"];
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
        <div id="res" value="<?php echo $turno ?>"></div>
    </form>
    <div class="zonas" id="resul">
        <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="../js/listarBolADM.js"></script>