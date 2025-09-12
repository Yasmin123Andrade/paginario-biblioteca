<?php

require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$stmt = $pdo->prepare("DELETE FROM Genero WHERE id_genero=?");
$stmt->execute([$_POST['id_genero']]);


?>