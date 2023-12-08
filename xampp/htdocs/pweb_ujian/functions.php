<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'pweb_ujian';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	exit('Gagal menghubung ke database!');
    }
}
function template_header($title) {
	echo <<<EOT
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>$title</title>
			<link href="./style.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		</head>
		<body>
			<nav class="navtop">
				<div>
					<h1>Daftar Peserta Ujian Praktikum Pemrograman Web</h1>
					<a href="./index.php"><i class="fas fa-home"></i>Home</a>
					<a href="./read.php"><i class="fas fa-address-book"></i>Peserta</a>
					<a href="./dino-game/index-dino.php"><i class="fas fa-gamepad"></i>Game</a>
				</div>
			</nav>
		</body>
	</html>
	EOT;
}
function template_footer() {
	echo <<<EOT
	EOT;
}
?>