<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$cpf_administrador = $_GET['cpf_administrador'];

$sql = "DELETE FROM Administrador WHERE cpf_administrador = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$cpf_administrador]);

header('Location: ler.php');
exit();
?>
