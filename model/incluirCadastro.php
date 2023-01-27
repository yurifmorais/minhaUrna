<?php
include('conexao.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$user = $_POST['user'];

$SQL = "INSERT INTO
				usuario
		VALUES 
				(null,
				'$nome',
				'$email', 
				'$senha',
				'$email',
				'$user')";
mysqli_query($conectado, $SQL);

header('location: ../view/login.php');
