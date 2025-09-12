<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$cpf = $_GET['cpf'];

$sql = "DELETE FROM Usuario WHERE cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$cpf]);

header('Location: ler.php');
exit();
?>
