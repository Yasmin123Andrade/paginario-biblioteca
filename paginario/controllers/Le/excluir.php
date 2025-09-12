<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_leitura = $_GET['id_leitura'];

$sql = "DELETE FROM Le WHERE id_leitura = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_leitura]);

header('Location: ler.php');
exit();
?>
