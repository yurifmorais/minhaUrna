<!DOCTYPE html>
<html>

<head lang="pt-br">
  <title>Início | Minha Urna</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/inicio.css">
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
  $nivel = $produto['nivel'];
}

?>

<body>
  <p class="greeting"> Olá, <?php echo $nome; ?>

    <a class="dropdown-item" href="perfilUser.php">
      <div class="profilePic" style="margin-left:100px">
        <?php
        if ($img == $email) {
          echo '  <img src="../img/semIm.jpg" alt="" style="position: absolute;
              width: 42px;
              height: 42px;
              left: 332px;
              top: 32px;
              border-radius: 999px;">';
        } else {

          echo '  <img src="../img/' . $img . '" alt="" style="position: absolute;
              width: 42px;
              height: 42px;
              left: 332px;
              top: 32px;
              border-radius: 999px;">';
        }
        ?>
      </div>
    </a>

  <div class="Search">
    <form name="frmBusca" method="POST" action="pesquisa.php" class="form-inline my-2 my-lg-0">
      <p class="tipoEleicoes">Eleições Gerais 2022</p>
      <select name="turno" id="turno" class="turnoField" id="turno">
        <?php
        include("../model/conexao.php");
        $turno = "<option value='1'>Turno</option>";
        $sql = "SELECT * FROM turnos ORDER BY NM_TURNO";
        $rs = mysqli_query($conectado, $sql);
        while ($registro = mysqli_fetch_array($rs)) {
          $turno = $turno . "<option value='" . $registro['NR_TURNO'] . "'>" . $registro['NM_TURNO'] . "</option>";
        }
        echo $turno;
        ?>
      </select>
      <input type="search" name="busca" placeholder="Pesquise um candidato" />
      <img class="searchIcon" src="illustrations/search.svg" alt="search" />
    </form>
  </div>

  <p style="position: absolute;
    width: 82px;
    height: 16px;
    left: 19px;
    top: 318px;

    font-family: 'Plus Jakarta Sans';
    font-style: normal;
    font-weight: 400;
    font-size: 13px;
    line-height: 16px;
    display: flex;
    align-items: center;

    color: rgba(0, 0, 0, 0.75);">Mais votados</p>

  <div class="grafico">
    <title>Creating Dynamic Data Graph using PHP and Chart.js</title>
    <style type="text/css">
      BODY {
        width: 358PX;
      }

      #chart-container {
        width: 400px;
        height: 150%;
      }
    </style>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/Chart.min.js"></script>

    <div>
      <form action="" method="post" class="mb-3">
        <div class="select-block">
          <select style="box-sizing: border-box;

                  position: absolute;
                  width: 241px;
                  height: 35px;
                  top: -200px;
                  padding-left: 12px;
                
                  background: #FFFFFF;
                  border: 0.5px solid rgba(0, 0, 0, 0.5);
                  border-radius: 999px;
                  font-weight: 400;
                  font-family: 'Plus Jakarta Sans';
                  font-size: 12px;
                  line-height: 15px;
                  display: flex;
                  align-items: center;

                  color: rgba(0, 0, 0, 0.5);" name="Cargo">
            <option value="1">Presidente</option>
            <option value="3">Governador</option>
            <option value="6">Deputado Federal</option>
          </select>
        </div>
        <input style="box-sizing: border-box;
      
              position: absolute;
              width: 107px;
              height: 35px;
              left: 248px;
              top: -200px;
              padding-left: 33px;
              background: #FFFFFF;
              border: 0.5px solid rgba(0, 0, 0, 0.5);
              border-radius: 999px;
              font-family: 'Plus Jakarta Sans';
              font-style: normal;
              font-weight: 400;
              font-size: 12px;
              line-height: 15px;
              display: flex;
              align-items: center;" type="submit" name="submit" vlaue="Choose options">
      </form>
      <?php
      if (isset($_POST['submit'])) {
        if (!empty($_POST['Cargo'])) {
          $selected = $_POST['Cargo'];
        }
      }
      ?>
    </div>

    <div id="chart-container">
      <canvas id="graphCanvas"></canvas>
    </div>

    <script>
      $(document).ready(function() {
        showGraph();
      });


      function showGraph() {
        {
          // $.post("data.php",
          $.post("dadosGrafico.php", {
              num: <?php echo $selected; ?>,
            },
            function(data) {
              console.log(data);
              var nome = [];
              var votos = [];

              for (var i in data) {
                nome.push(data[i].NM_URNA_CANDIDATO);
                votos.push(data[i].TOTAL); //AQUI VOU POR O NUMERO DE VOTOS DO CANDIDATO
              }

              var chartdata = {
                labels: nome,
                datasets: [{
                  backgroundColor: '#1F64B4',
                  borderColor: '#46d5f1',
                  hoverBackgroundColor: '#CCCCCC',
                  hoverBorderColor: '#666666',
                  data: votos,
                }]
              };

              var graphTarget = $("#graphCanvas");
              const configs = {
                type: 'bar',
                data: chartdata,
                options: {
                  legend: {
                    display: false,
                    labels: {
                      display: false
                    }
                  }
                }
              };
              var barGraph = new Chart(graphTarget, configs);
            });
        }
      }
    </script>
  </div>




  <?php
  if ($nivel == 1) {
  ?>
    <a class="verify" href="verificarBol.php?turno=1"><img src="illustrations/verify.svg" alt="addIcon" /></a>
    <div id="res">
    </div>

    <a class="add" href="cadastroResultado1.php"><img src="illustrations/add.svg" alt="addIcon" /></a>
  <?php
  } else {
  ?>
    <a class="add" href="cadastroResultado1.php"><img src="illustrations/add.svg" alt="addIcon" /></a>
  <?php
  }
  ?>
  </div>
</body>
<?php

$sql = "SELECT sum(votos) as total from boletim natural join votos where valido = 1";
$produtos = mysqli_query($conectado, $sql);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../js/pegarTurno.js"></script>