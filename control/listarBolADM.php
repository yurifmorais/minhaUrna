<?php
include("../model/conexao.php");

$selectMuni = $_GET['selectMuni'];
$selectUF = $_GET['selectUF'];
$verif = $_GET['verif'];
$turno = $_GET['turno'];

$query = ("SELECT *
    FROM urna natural join boletim
    WHERE idUF = $selectUF and turno = $turno
    and idMuni = $selectMuni and valido = $verif
    GROUP BY zona
    ORDER BY zona");

$registro = mysqli_query($conectado, $query);
while ($registros = mysqli_fetch_array($registro)) {
?>
    <br>
    <p href="zonas.php?idZona=<?php echo $registros['zona'] ?>&idMuni=<?php echo $selectMuni ?>&verif=<?php echo $verif ?>">Zona</p>
    <a href="zonas.php?idZona=<?php echo $registros['zona'] ?>&idMuni=<?php echo $selectMuni ?>&verif=<?php echo $verif ?>"><?php echo $registros['zona'] ?></a>
    <br><br><br><br>
<?php
}
