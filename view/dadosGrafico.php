<?php
header('Content-Type: application/json');

$numero = $_POST['num'];
include("../model/conexao.php");

$sql = "SELECT NM_URNA_CANDIDATO, sum(votos) as TOTAL FROM boletim natural join votos join candidatos on idCandidato = ID_CANDIDATO where CD_CARGO = $numero GROUP BY idCandidato order by total DESC LIMIT 3";

$result = mysqli_query($conectado, $sql);

$dados = array();
foreach ($result as $row) {
	$dados[] = $row;
}

mysqli_close($conectado);

echo json_encode($dados);
