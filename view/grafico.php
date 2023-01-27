<!DOCTYPE html>
<html>

<head>
    <title>Creating Dynamic Data Graph using PHP and Chart.js</title>
    <style type="text/css">
        BODY {
            width: 550PX;
        }

        #chart-container {
            width: 100%;
            height: auto;
        }
    </style>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/Chart.min.js"></script>

</head>

<body>
    <div>
        <form action="" method="post" class="mb-3">
            <div class="select-block">
                <select name="Cargo">
                    <option value="1">Presidente</option selected>
                    <option value="3">Governador</option>
                </select>
            </div>
            <input type="submit" name="submit" vlaue="Choose options">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            if (!empty($_POST['Cargo'])) {
                $selected = $_POST['Cargo'];
                echo 'Escolhido: ' . $selected;
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

</body>

</html>