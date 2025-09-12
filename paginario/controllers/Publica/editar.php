<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_publicacao = $_GET['id_publicacao'];

if ($_POST) {
    $id_editora = $_POST['id_editora'];
    $id_livro = $_POST['id_livro'];
    $data_publicacao = $_POST['data_publicacao'];

    $sql = "UPDATE Publica SET id_editora=?, id_livro=?, data_publicacao=? WHERE id_publicacao=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_editora, $id_livro, $data_publicacao, $id_publicacao]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Publica WHERE id_publicacao = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_publicacao]);
$publicacao = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    ID Publicação: <?= $publicacao['id_publicacao'] ?> (não editável)<br><br>
    ID Editora: <input type="number" name="id_editora" value="<?= $publicacao['id_editora'] ?>" required><br><br>
    ID Livro: <input type="number" name="id_livro" value="<?= $publicacao['id_livro'] ?>" required><br><br>
    Data Publicação: <input type="date" name="data_publicacao" value="<?= $publicacao['data_publicacao'] ?>" required><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
