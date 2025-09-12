<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_editora = $_GET['id_editora'];

$sql = "DELETE FROM Editora WHERE id_editora = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_editora]);

header('Location: ler.php');
exit();
?>
