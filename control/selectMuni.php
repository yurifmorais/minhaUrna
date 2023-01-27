<?php
include("../model/conexao.php");

$idUF = $_GET['idUF'];

$query = ("SELECT *
    FROM municipios
    WHERE idUF = '$idUF'  
    ORDER BY cidade");

$registros = mysqli_query($conectado, $query);

echo '<option value="">Selecione um municipio</option>';

foreach ($registros as $option) {

?>
    <option value="<?php echo $option['id'] ?>"><?php echo $option['cidade'] ?></option>
<?php
}
