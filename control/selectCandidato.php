<?php
include("../model/conexao.php");

$idCargo = $_GET['idCargo'];
$idUF = $_GET['idUF'];

if ($idCargo == 3 or $idCargo == 5 or $idCargo == 7) {
    $query = ("SELECT *
    FROM candidatos
    WHERE CD_CARGO = '$idCargo' 
    and ID_UF = '$idUF' 
    GROUP BY NM_URNA_CANDIDATO
    ORDER BY NM_URNA_CANDIDATO");
} else {
    $query = ("SELECT *
    FROM candidatos
    WHERE CD_CARGO = '$idCargo'  
    GROUP BY NM_URNA_CANDIDATO
    ORDER BY NM_URNA_CANDIDATO");
}

$registros = mysqli_query($conectado, $query);

echo '<option value="">Selecione um cargo</option>';

foreach ($registros as $option) {

?>
    <option value="<?php echo $option['ID_CANDIDATO'] ?>"><?php echo $option['NM_URNA_CANDIDATO'] ?></option>
<?php
}
