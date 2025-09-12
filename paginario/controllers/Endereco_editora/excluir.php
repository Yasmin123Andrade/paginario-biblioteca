<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_endereco = $_GET['id_endereco'];

$sql = "DELETE FROM Endereco_editora WHERE id_endereco = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_endereco]);

header('Location: ler.php');
exit();
