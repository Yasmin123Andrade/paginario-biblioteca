<?php

require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$stmt = $pdo->query("SELECT * FROM Genero");
$generos = $stmt->fetchAll();
foreach ($generos as $g) {
    echo $g['nome_genero'] . "<br>";
}

?>