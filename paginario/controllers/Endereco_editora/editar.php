<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_endereco = $_GET['id_endereco'];

if ($_POST) {
    $id_editora = $_POST['id_editora'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $sql = "UPDATE Endereco_editora SET id_editora=?, rua=?, numero=?, bairro=?, cidade=? WHERE id_endereco=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_editora, $rua, $numero, $bairro, $cidade, $id_endereco]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Endereco_editora WHERE id_endereco = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_endereco]);
$endereco = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    ID Endereço: <?= $endereco['id_endereco'] ?> (não editável)<br><br>
    ID Editora: <input type="number" name="id_editora" value="<?= $endereco['id_editora'] ?>" required><br><br>
    Rua: <input type="text" name="rua" value="<?= $endereco['rua'] ?>" required><br><br>
    Número: <input type="number" name="numero" value="<?= $endereco['numero'] ?>" required><br><br>
    Bairro: <input type="text" name="bairro" value="<?= $endereco['bairro'] ?>" required><br><br>
    Cidade: <input type="text" name="cidade" value="<?= $endereco['cidade'] ?>" required><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
