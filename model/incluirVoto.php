<?php
include('conexao.php');
$cargo = $_POST['selectCargo'];
$cand = $_POST['selectCand'];
$votos = $_POST['votos'];
$idUF = $_POST['idUF'];
$idBol = $_POST['idBol'];

$SQL = "INSERT INTO
				votos
		VALUES 
				($idBol,
				'$cand',
				'$votos')";

echo ("Sucesso");
mysqli_query($conectado, $SQL);
