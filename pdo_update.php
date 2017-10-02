<?php

	$dsn="mysql:dbname=aula_pdo;host=127.0.0.1";

	$dbuser="root";

	$dbpass="root";

	try {
		$pdo = new PDO($dsn, $dbuser, $dbpass);

		$nome= "Novo Nome";
		$email= "teste2@gmail.com";
		$senha = md5("123");

		$sql = "UPDATE usuarios SET nome='$nome' WHERE nome='Claudio'";
		$sql = $pdo->query($sql);

		echo "Usuário alterado com sucesso! ";
	
	} catch (PDOException $e) {
		echo "Falhou: ".$e->getMessage();
	}

?>