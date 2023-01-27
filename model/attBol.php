<?php
include("../model/conexao.php");
$idBol = $_GET['idBol'];
$valido = $_GET['valido'];
$email = $_GET['email'];

if ($valido == 1) {
    $sql = "SELECT * FROM boletim WHERE idBoletim = " . $idBol;
    $registro = mysqli_query($conectado, $sql);
    while ($registros = mysqli_fetch_array($registro)) {
        $urna = $registros['idUrna'];
    }

    $sql2 = "SELECT * FROM boletim WHERE idUrna = " . $urna;
    $registro2 = mysqli_query($conectado, $sql2);
    while ($registros2 = mysqli_fetch_array($registro2)) {
        $sql3 = "UPDATE boletim SET valido = 2, userValidate = '$email' WHERE idBoletim = " . $registros2['idBoletim'];
        mysqli_query($conectado, $sql3);
    }
}

$sql = "UPDATE boletim SET valido = '$valido', userValidate = '$email'  WHERE idBoletim = " . $idBol;
mysqli_query($conectado, $sql);

header("location: ../view/verificarBol.php");
