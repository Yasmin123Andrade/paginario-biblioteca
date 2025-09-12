<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_livro = $_GET['id_livro'];

$sql = "DELETE FROM Livro WHERE id_livro = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_livro]);

header('Location: ler.php');
exit();
?>
