<?php
// verificar porta do banco para nao dar erro

$conectado = mysqli_connect("localhost:4306", "root", "", "dbeleicoes");

if (!$conectado) {
	echo "Erro ao conectar";
}
