<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$cpf_usuario = $_GET['cpf_usuario'];

$sql = "DELETE FROM Endereco_usuario WHERE cpf_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$cpf_usuario]);

header('Location: ler.php');
exit();
