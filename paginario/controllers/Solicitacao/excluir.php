<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_solicitacao = $_GET['id_solicitacao'];

$sql = "DELETE FROM Solicitacao WHERE id_solicitacao = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_solicitacao]);

header('Location: ler.php');
exit();
