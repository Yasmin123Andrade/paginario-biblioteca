<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_envio = $_GET['id_envio'];

if ($_POST) {
    $data_envio = $_POST['data_envio'];
    $estado = $_POST['estado'];
    $livro_id = $_POST['livro_id'];
    $autor_id = $_POST['autor_id'];

    $sql = "UPDATE Envio_Livro SET data_envio=?, estado=?, livro_id=?, autor_id=? WHERE id_envio=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$data_envio, $estado, $livro_id, $autor_id, $id_envio]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Envio_Livro WHERE id_envio = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_envio]);
$envio = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    ID do Envio: <?= $envio['id_envio'] ?> (não editável)<br><br>
    Data do Envio: <input type="date" name="data_envio" value="<?= htmlspecialchars($envio['data_envio']) ?>" required><br><br>
    Estado: <input type="text" name="estado" value="<?= htmlspecialchars($envio['estado']) ?>" required><br><br>
    ID do Livro: <input type="number" name="livro_id" value="<?= htmlspecialchars($envio['livro_id']) ?>" required><br><br>
    ID do Autor: <input type="number" name="autor_id" value="<?= htmlspecialchars($envio['autor_id']) ?>" required><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
