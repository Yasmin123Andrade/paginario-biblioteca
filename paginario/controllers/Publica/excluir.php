<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_publicacao = $_GET['id_publicacao'];

$sql = "DELETE FROM Publica WHERE id_publicacao = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_publicacao]);

header('Location: ler.php');
exit();
?>
