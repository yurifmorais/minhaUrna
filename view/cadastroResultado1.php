<!DOCTYPE html>
<html>

<head lang="pt-br">
    <title>Registrar | Minha Urna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/cadastroResultado1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <p class="pageTitle">Registrar resultados</p>
    <img src="illustrations/local.png">
    <p class="title">Estado e Município</p>
    <div class="warning">
        <img src="illustrations/warning.png">
        <p class="title">Os dados serão verificados após a finalização do registro.</p>
    </div>
    <br>
    <div class="card-body">
        <form name="frmResul1" action="cadastroResultado2.php" method="POST" enctype="multipart/form-data">
            <select name="selectUF" class="UFTextField" id="idUF" required>
                <?php
                include("../model/conexao.php");
                $UF = "<option value='0'>Selecione o UF</option>";
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
            <p class="UFTextFieldHelp">Estado do local de votação</p>

            <select name="selectMuni" id="idMuni" class="municipioTextField" required>
                <option value="">Selecione um municipio</option>
            </select>
            <p class="municipioTextFieldHelp">Munícipio onde ocorreu a votação</p>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Próximo</button><br>

    </form>
    </fieldset>

    <script src="../js/funcSelectMuni.js"></script>
    <img class="progress" src="illustrations/progress1.png">
</body>

</html>