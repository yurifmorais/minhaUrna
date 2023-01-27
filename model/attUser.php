<?php
include('conexao.php');
include('../control/verificar.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$idUsuario = $_POST['idUsuario'];

if (isset($_FILES['fileUpload'])) {
   date_default_timezone_set("Brazil/East");

   $ext = strtolower(substr($_FILES['fileUpload']['name'], -4));
   $new_name = $email . $ext;
   $dir = '../img/';

   move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name);
}

$sql = "UPDATE usuario SET nome = '$nome', email = '$email', img = '$new_name' where idUsuario =  '$idUsuario'";

mysqli_query($conectado, $sql);
session_start();
$_SESSION['email'] = $email;

header("location: ../view/perfilUser.php");
