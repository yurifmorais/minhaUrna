<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Registrar | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/cadastroResultado5.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <img src="illustrations/candidate.png">
    <p class="title">Candidatos e votos</p>
    <div class="warning">
        <img src="illustrations/warning.png">
        <p class="title">Os dados serão verificados após a finalização do registro.</p>
    </div>
    <br>
    <p class="pageTitle">Registrar resultados</p>
    <br>
    <?php
    $idUF = $_GET['idUF'];
    $idBol = $_GET['idBol'];

    ?>
    <div class="card">
        <div class="card-body">
            <form id="frmResul4" name="frmResul4">
                <select name="selectCargo" class="cargoTextField" id="idCargo" required>
                    <?php
                    include("../model/conexao.php");
                    $cargo = "<option value='0'>Selecione o cargo</option>";
                    $sql = "SELECT * FROM cargos ORDER BY NM_CARGO";
                    $rs = mysqli_query($conectado, $sql);
                    while ($registro = mysqli_fetch_array($rs)) {
                        $cargo = $cargo . "<option value='" . $registro['CD_CARGO'] . "'>" . $registro['NM_CARGO'] . "</option>";
                    }
                    echo $cargo;
                    ?>
                </select>

                <select name="selectCand" id="idCand" class="candidatoTextField" required>
                    <option value="">Selecione um candidato</option>
                </select>

                <input name="votos" type="number" class="form-control" placeholder="Votos" required>

                <input type="hidden" name="idUF" id="idUF" value="<?php echo $idUF ?>">
                <input type="hidden" name="idBol" id="idUF" value="<?php echo $idBol ?>">
        </div>
    </div>
    <br>
    <button type="submit" class="adicionar">Registrar e adicionar outro</button><br>
    </form>

    <br>
    <a href='inicio.php'><button class="finalizar">Registrar e finalizar</button></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../js/sendForm.js"></script>
    <script src="../js/funcSelectCand.js"></script>
    <img class="progress" src="illustrations/progress4.png">
</body>

</html>