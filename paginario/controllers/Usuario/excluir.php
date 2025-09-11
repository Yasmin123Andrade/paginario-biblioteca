<?php
require_once '../../db/conexao.php';

$cpf = $_GET['cpf'];

$sql = "DELETE FROM Usuario WHERE cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$cpf]);

header('Location: ler.php');
exit();
?>
