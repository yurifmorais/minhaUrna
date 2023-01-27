<?php
session_start(); 
if (!isset($_SESSION['email'])) {
    session_destroy();
    header("Location: ../view/login.php");
    exit;
}

$email = $_SESSION['email'];
$sql = "SELECT * from usuario where email = '$email'";
$produtos = mysqli_query($conectado, $sql);
while ($produto = mysqli_fetch_assoc($produtos)) {
    $idUsuario = $produto['idUsuario'];
}
