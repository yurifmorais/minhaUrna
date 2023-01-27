
<?php
include('conexao.php');
session_start();
$idUrna = $_POST['idUrna'];
$email = $_SESSION['email'];
$idUF = $_POST['idUF'];
$turno = $_POST['turno'];

if (isset($_FILES['fileUpload'])) {
    date_default_timezone_set("Brazil/East");

    $ext = strtolower(substr($_FILES['fileUpload']['name'], -4));
    $new_name = "Boletim-" . $email . $ext;
    $dir = '../img/';

    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name);
}

$SQL = "INSERT INTO
				boletim
		VALUES 
				(null,
				'$idUrna',
				'$new_name',
                '0',
                '$turno',
                '$email',
                'notValidate')";
mysqli_query($conectado, $SQL);
$idBol = mysqli_insert_id($conectado);

header('location: ../view/cadastroResultado5.php?idUF=' . $idUF . '&idBol=' . $idBol);

?>