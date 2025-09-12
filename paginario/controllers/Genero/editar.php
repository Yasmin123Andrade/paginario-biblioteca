<?php

require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$stmt = $pdo->prepare("UPDATE Genero SET nome_genero=? WHERE id_genero=?");
$stmt->execute([$_POST['nome_genero'], $_POST['id_genero']]);

?>