<?php
session_status() === "PHP_SESSION_ACTIVE" ?: session_start();
require_once('../config.php');
require_once(DBAPI);

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
$database = open_database();
$row = null;
$usuario = mysqli_real_escape_string($database, $_POST['usuario']);
$senha = mysqli_real_escape_string($database, $_POST['senha']);

	$sql =  "SELECT usuario FROM usuario WHERE usuario = '{$usuario}' and senha = '{$senha}'";
	$result = $database->query($sql);
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
	}

close_database($database);


if($row) {
	$_SESSION['usuario'] = $usuario;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
