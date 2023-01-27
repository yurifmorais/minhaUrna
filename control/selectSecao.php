<?php
include("../model/conexao.php");

$idZona = $_GET['idZona'];

$query = ("SELECT *
    FROM urna
    WHERE zona = '$idZona'  
    ORDER BY secao");

$registros = mysqli_query($conectado, $query);

echo '<option value="">Selecione uma seção</option>';

foreach ($registros as $option) {

?>
    <option value="<?php echo $option['secao'] ?>"><?php echo $option['secao'] ?></option>
<?php
}
