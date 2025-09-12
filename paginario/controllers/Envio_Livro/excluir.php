<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_envio = $_GET['id_envio'];

$sql = "DELETE FROM Envio_Livro WHERE id_envio = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_envio]);

header('Location: ler.php');
exit();
?>
