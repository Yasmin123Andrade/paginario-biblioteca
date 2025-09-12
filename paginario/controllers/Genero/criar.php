<?php

require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$stmt = $pdo->prepare("INSERT INTO Genero (nome_genero) VALUES (?)");
$stmt->execute([$_POST['nome_genero']]);

?>