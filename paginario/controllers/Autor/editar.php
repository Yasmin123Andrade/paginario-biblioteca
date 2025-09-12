<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_autor = $_GET['id_autor'];

if ($_POST) {
    $nome_completo = $_POST['nome_completo'];
    $nacionalidade = $_POST['nacionalidade'];
    $data_nascimento = $_POST['data_nascimento'];
    $biografia = $_POST['biografia'];

    $sql = "UPDATE Autor SET nome_completo = ?, nacionalidade = ?, data_nascimento = ?, biografia = ? WHERE id_autor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome_completo, $nacionalidade, $data_nascimento, $biografia, $id_autor]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Autor WHERE id_autor = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_autor]);
$autor = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    ID: <?= htmlspecialchars($autor['id_autor']) ?> (não editável)<br><br>
    Nome completo: <input type="text" name="nome_completo" value="<?= htmlspecialchars($autor['nome_completo']) ?>" required><br><br>
    Nacionalidade: <input type="text" name="nacionalidade" value="<?= htmlspecialchars($autor['nacionalidade']) ?>"><br><br>
    Data de nascimento: <input type="date" name="data_nascimento" value="<?= htmlspecialchars($autor['data_nascimento']) ?>"><br><br>
    Biografia:<br>
    <textarea name="biografia" rows="5" cols="40"><?= htmlspecialchars($autor['biografia']) ?></textarea><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>